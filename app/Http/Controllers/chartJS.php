<?php

namespace App\Http\Controllers;

use App\Models\Pays;
use App\Models\Carte;
use App\Models\Regular;
use App\Models\VerifEmail;
use Illuminate\Http\Request;
use App\Mail\verificationMail;
use Illuminate\Validation\Rule;
use App\Http\Requests\photoRequest;
use Illuminate\Support\Facades\Mail;

class chartJS extends Controller
{
    //
    public function index(Request $request)
    {
        // $carteData = Carte::where('paysId', $request->paysId)
        // /* utilisation de when pour filtrer par date */
        // ->when($request->from,function($query) use ($request){
        //     return $query->whereDate('updated_at','>=',$request->from);
        // })
        // ->when($request->to,function($query) use ($request){
        //     return $query->whereDate('updated_at','<=',$request->to);
        // })
        // ->selectRaw('SUM(vu) as Vu, SUM(valide) as Valide, COUNT(*) as Total')
        // ->get();

        $regularData = Regular::where('paysId', $request->paysId)->get();

        if($regularData->isEmpty()){
            return response()->json([
                'data' => []
            ]);
        }
        foreach ($regularData as $key => $value) {
            $carteData[$key] = Carte::where('regularId', $value->id)
                ->selectRaw('SUM(vu) as Vu, SUM(valide) as Valide, COUNT(*) as Total')
                ->get();
        }

        $pays = Pays::where('id', $request->paysId)->first()->nom;

        return response()->json([
            'data' => $carteData
        ]);
    }

    public function registerImg(Request $request)
    {
        $phto = $request->validate([
            'image' => ['image', 'mimes:jpeg,jpg', 'max:60000', Rule::dimensions()->minwidth(431)->minHeight(555)->maxWidth(431)->maxHeight(555)],
        ]);

        if($request->hasFile('image')){
            /** @var UploadedFile $image */
            if (session('img')!== null){
                Storage::disk('public')->delete(session('img'));
            }
            $image=$phto['image'];
            $imagePath = $image->store('photo', 'public');
            session(['img' => $imagePath]);
            return response()->json([
                'message' => 'Image enregistrée',
                'path' => $imagePath,
                'status' => 200

            ]);
        }else{
            return response()->json([
                'message' => 'Aucune image envoyée',
                'status' => 400
            ]);
        }

    }

    public function email(Request $request)
    {
        $email = $request->validate([
            'email' => ['email']
        ]);
        if (session('email')=== $email['email']){
            return response()->json([
                'message' => 'Email déjà envoyé',
                'status' => 400
            ]);
        }


        if(session('email')!==null && session('email')!== $email['email'] ){
            VerifEmail::where('email', session('email'))->delete();
        }

        $toEmail = $email['email'];
        $contenu = 'Bonjour, ';
        $numVer = rand(1000, 9999);
        $subject = 'Verification des votre addresse email';

        session()->put('email', $toEmail);
        Mail::to($toEmail)->send(new verificationMail($contenu, $subject, $numVer));
        VerifEmail::create(['email' => $toEmail, 'token' => $numVer]);
        return response()->json([
            'message' => 'Email envoyé',
            'status' => 200
        ]);
    }

    public function verify(Request $request)
    {
        $verif = $request->validate([
            'token' => ['required', 'numeric']
        ]);

        $verifEmail = VerifEmail::where('email', session('email'))->get();
        $verifEmail1 = $verifEmail->last();
        if($verifEmail1->token == $verif['token']){
            $verifEmail1->delete();
            return response()->json([
                'message' => 'Email vérifié',
                'status' => 200,
                'token' => $verifEmail1['token']
            ]);
        }else{
            return response()->json([
                'message' => 'Code incorrect',
                'status' => 400,
                'token' => $verifEmail1['token']
            ]);
        }
    }
}
