<?php

namespace App\Http\Controllers;

use App\Models\Regular;
use Illuminate\View\View;
use App\Models\VerifEmail;
use Illuminate\Http\Request;
use App\Mail\verificationMail;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\carteRequest;
use App\Http\Requests\emailRequest;
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
            if (session('email') !== null){
                VerifEmail::where('email', session('email'))->delete();
            }
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
            return redirect()->route('form.mail');
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

    public function mail(): View
    {
        return View('form.mail');
    }

    public function submitMail(emailRequest $request)
    {
        if (session('email')=== $request->validated('email')){
            return redirect()->route('form.mail')->with('warning', 'Vous avez déjà entré cette adresse email.');
        }

        if(session('email')!==null && session('email')!== $request->validated('email') ){
            VerifEmail::where('email', session('email'))->delete();
            session()->forget('email');
        }
        $toEmail = $request->validated('email');
        $contenu = 'Bonjour, ';
        $numVer = rand(1000, 9999);
        $subject = 'Verification des votre addresse email';

        session(['email'=> $toEmail]);
        Mail::to($toEmail)->send(new verificationMail($contenu, $subject, $numVer));
        VerifEmail::create(['email' => $toEmail, 'token' => $numVer]);
        return redirect()->route('form.mail');
    }

    public function verifyMail( emailRequest $request)
    {
        $test = VerifEmail::where('email', session('email'))->first();
        $tests = intval($request->validated('token'));
        if (!session('valid')){
            if ($test->token !== $tests){
                return redirect()->route('form.mail')->with('warning', 'Numéro de vérification est incorrect.');
            }
            session(['valid'=> $token]);
        }
        return redirect()->route('form.valid');

    }

    public function valid(): View
    {
        return View('form.validate');
    }

}
