<?php

namespace App\Http\Controllers;

use App\Models\Carte;
use App\Models\captcha;
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
use App\Http\Requests\captchaRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class beginController extends Controller
{
    public function index(Request $request): View
    {
        if($request->has('slug')) {
            $data = Regular::where('slug', $request->input('slug'))->first();
            $datas = $data->toArray();
            $keysToKeep = ['created_at', 'updated_at', 'pays'];
            foreach ($datas as $key => $value) {
                if (!in_array($key, $keysToKeep)) {
                    if($key === 'pays'){
                        session(['paysId' => $value]);
                    }
                    else{
                        session([$key => $value]);
                    }
                }
            }
            session(['update' => true]);
        }

        if($request->all() === []){
            if (session('email') !== null){
                VerifEmail::where('email', session('email'))->delete();
            }
            $keysToKeep = ['_token', '_previous', '_flash','update', '_old_input'];

            foreach (Session::all() as $key => $value) {
                if (!in_array($key, $keysToKeep)) {
                    Session::forget($key);
                }
            }
        }

        $pays = DB::table('pays')->pluck('nom', 'id');
        $indicatifs = DB::table('pays')->pluck('indicatif', 'id');
        return View('form.carteCons', compact('pays', 'indicatifs'));
    }

    public function submit( carteRequest $request)
    {
        $slug = $request->input('slug');
        $data = $request->validated();
        $secret = 'CléSecret';
        $hmac = hash_hmac('sha256', $slug, $secret);
        $data['slug'] = rtrim(strtr(base64_encode($hmac), '+/', '-_'), '=');
        session($data);
        return redirect()->route('form.image');
    }

    /* Verification de l'image */
    public function verifImg()
    {
            if (session()->has('update')){
                return redirect()->route('form.valid');
            }
            return redirect()->route('form.mail');
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
            session(['valid'=> $tests]);
        }
        return redirect()->route('form.valid');

    }

    public function valid(): View
    {
        return View('form.validate');
    }

    public function validSend( captchaRequest $request)
    {
        $clientIp = $_SERVER['REMOTE_ADDR'];
        $captchaData['test'] = $request->validated('captcha');
        $captchaData['ip_address'] = $clientIp;
        captcha::create($captchaData);
        $captchaId = captcha::where('ip_address', $clientIp)->first()->id;
        $data = [];
        $keysToExclude = ['_token', '_previous', '_flash', 'valid','update', 'id'];

        foreach (session()->all() as $key => $value) {
            if (!in_array($key, $keysToExclude)) {
                $data[$key] = $value;
            }
        }

        if(session()->has('update')){
            Regular::where('id', session('id'))->update($data);
            Carte::where('regularId', session('id'))->update(['captchaId' => $captchaId, 'vu'=> false]);
        }else{
            Regular::create($data);
            $regularId =Regular::where('slug', $data['slug'])->first()->id;

            $carteData["captchaId"] = $captchaId;
            $carteData["regularId"] = $regularId;
            $carteData["numero"] = rand(1000000000,9999999999);
            Carte::create($carteData);
        }

        /* $notifData['carteId'] = Carte::where('regularId', $regularId)->first()->id;
        $notifData['message'] = 'Creation de carte';
        $notifData['vu'] = 0;

        Notification::create($notifData); */

        return redirect()->route('index')->with('success', 'Votre demande a été enregistrée avec succès.');
    }

}
