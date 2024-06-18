<?php

namespace App\Http\Controllers;

use App\Models\Regular;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Mail\verificationMail;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\carteRequest;
use App\Http\Requests\photoRequest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class beginController extends Controller
{
    /* verification des informations */
    /*  $keysToKeep = ['_token', '_previous', '_flash', 'old'];

     foreach (Session::all() as $key => $value) {
         if (!in_array($key, $keysToKeep)) {
             Session::forget($key);
         }
     } */
    public function index(Request $request): View
    {
        if(!($request->query('retour'))){
            $keysToKeep = ['_token', '_previous', '_flash'];
        
            foreach (Session::all() as $key => $value) {
                if (!in_array($key, $keysToKeep)) {
                    Session::forget($key);
                }
            }
        }
        $pays = DB::table('pays')->pluck('nom', 'code');
        $indicatifs = DB::table('pays')->pluck('indicatif', 'code');
        return View('form.carteCons', compact('pays', 'indicatifs'));
    }

    public function submit( carteRequest $request)
    {
        $slug = $request->input('slug');
        $data = $request->validated();
        $data['slug'] = $slug;
        session($data);
        return redirect()->route('form.image');
    }

    /* Verification de l'image */
    public function verifImg( photoRequest $request)
    {
        if ($request->has('verifier')){
            /** @var UploadedFile $image */
            if (session('image')!== null){
                Storage::disk('public')->delete(session('image'));
            }
            $image=$request->validated('image');
            $imagePath = $image->store('photo', 'public');
            session(['image' => $imagePath]);
            return redirect()->route('form.image');
        }
        if ($request->has('suivant')){
            dd('suivant');
        }
    }

    public function insImg(): View
    {
        return View('form.insImg');
    }

    public function format(): View
    {
        return View('form.format');
    }

    /* verification de mail */
    public function verifyMail( Request $request)
    {
        $toEmail = $request->input('email');
        $contenu = 'Bonjour, ';
        $numVer = rand(1000, 9999);
        $subject = 'Verification des votre addresse email';

        dd($request->input('email'));

        Mail::to($toEmail)->send(new verificationMail($contenu, $subject));

        return response()->json(['success' => true]);

    }

    public function verifyNumber(Request $request) {
        $enteredNumber = $request->input('verificationNumber');
        $storedNumber = session('verification_number', null);

        if (!$storedNumber || $enteredNumber!== $storedNumber)
            return response()->json(['success' => false, 'message' => 'Numéro de vérification incorrect.']);
        return response()->json(['success' => true]);

    }

}
