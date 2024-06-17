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

class beginController extends Controller
{

    public function index(): View
    {
        $pays = DB::table('pays')->pluck('nom', 'code');
        $indicatifs = DB::table('pays')->pluck('indicatif', 'code');
        return View('form.carteCons', compact('pays', 'indicatifs'));
    }

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

    public function submit( carteRequest $request)
    {
        $slug = $request->input('slug');
        $data = $request->validated();
        $data['slug'] = $slug;
        session($data);
        return redirect()->route('form.image');
    }

    public function verifImg( photoRequest $request)
    {
        if ($request->has('verifier')){
            /** @var UploadedFile $image */
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

    public function edit($slug): View
    {
        return View('form.edit', ['slug' => $slug]);
    }

    public function update($slug)
    {
        return redirect()->route('form.index');
    }

}
