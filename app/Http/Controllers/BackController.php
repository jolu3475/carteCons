<?php

namespace App\Http\Controllers;

use App\Models\Pays;
use App\Models\User;
use App\Models\Carte;
use App\Models\Repex;
use App\Mail\userMail;
use App\Models\Erreur;
use App\Mail\refusMail;
use App\Models\Regular;
use App\Mail\ValidCarte;
use Illuminate\View\View;
use App\Models\Juridiction;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Requests\createUsr;
use App\Http\Requests\refusRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class BackController extends Controller
{
    public function index(): View
    {
        $users = Regular::all();
        return view('back.index', ['data' => $users]);
    }

    public function show(Regular $user): View
    {
        return view('back.show', ['data' => $user]);
    }

    public function pdfGenerator(Regular $data){
        $dataArray = $data->toArray();
        $repex = Juridiction::where('paysId', '=', $dataArray['paysId'])->first();
        // dd($dataArray['paysId']);
        $data->carte()->get()->first()->update(['dateRemise' => date('Y-m-d'), 'dateExpiration' => date('Y-m-d', strtotime('+3 year')), 'valide' => true, 'vu'=>true]);
        /* dd($data->carte()->get()->first()->toArray()); */
        $pdf = Pdf::loadView('pdf.sortie', ['repex' => $repex->repex()->get()->first()->toArray(), 'data' => $dataArray, 'carte' => $data->carte()->get()->first()->toArray()]);

        $pdf->setPaper('A5', 'landscape');

        // Obtenez le contenu du PDF sous forme de chaîne de caractères
        $pdfContent = $pdf->output();

        // Définissez le nom du fichier et le chemin où il sera sauvegardé
        $numero = $data->carte?->numero;
        $filename = "{$numero}.pdf";
        $path = public_path('pdf/');

        // Enregistrez le PDF sur le serveur
        $pdf->save($path.$filename);

        Mail::to($data->email)->send(new ValidCarte('Bonjour', 'validation de la carte', $data->carte('numero')->get()->first()->numero));

        return to_route('back.index')->with('success', 'La carte a été valider avec success');
    }

    public function refuserSend(refusRequest $request)
    {
        $test = Carte::where('regularId', $request->valider)->first()->id;
        $toEmail = Carte::where('regularId', '=', $request->valider)->first()->regular?->email;
        $id = Carte::where('regularId', $request->valider)->first()->regular?->id;
        $subject = 'Refus de votre carte';
        $contenu = $request->validated();
        $slug = Carte::where('regularId', '=', $request->valider)->first()->regular?->slug;
        $link = route('form.index', ['slug' => $slug]);
        Mail::to($toEmail)->send(new refusMail($contenu['Raison'], $subject, $link));
        Erreur::create(['carteId' => $test, 'regularId' => $id ,'contenu' => $contenu['Raison']]);
        Carte::where('id', $test)->update(['vu' => true]);
        return to_route('back.index')->with('success', 'Valeur verifier avec succès');
    }

    public function create(): View
    {
        return view('Back.user.create');
    }

    public function createUrs(createUsr $request)
    {
        $data = $request->validated();
        $data['name'] = $request->input('name');
        $data['role'] = $request->input('role');

        $secret = 'CléSecret';
        $slug = $request->input('slug');
        $hmac = hash_hmac('sha256', $slug, $secret);
        $data['slug'] = rtrim(strtr(base64_encode($hmac), '+/', '-_'), '=');

        User::create($data);
        Mail::to($data['email'])->send(new userMail('Bonjour', 'Création de compte', route('login.create', ['slug' => $data['slug']])));

        return to_route('back.user')->with('success', 'Utilisateur créé avec succès');
    }

    public function userProfile(): View
    {
        return view('back.profile');
    }

    public function userDelete(Request $request)
    {
        $id = $request->id;
        User::where('id', '=', $id)->delete();
        return to_route('back.user')->with('success', 'Utilisateur supprimé avec succès');
    }

    public function userManag(): View
    {
        $user = User::where('id', '<>', Auth::id())->where('id', '<>', 1)->get();
        $us = User::where('id', '=', Auth::id())->get()->first();
        $pays = Repex::orderby('label','asc')->get();
        return view('back.user', ['data' => $user, 'user' => $us, 'pays' => $pays]);
    }

    public function setting(): View
    {
        return view('back.setting.view');
    }

    public function edit(): View
    {
        return view('back.setting.edit');
    }

    public function edi(Request $request)
    {
        $data = Validator::make($request->all(), [
            'name' => 'required',
            'password' => 'required',
            'password1' => 'required'
        ]);
        $dat = $data->validated();

        if(password_verify($dat['password1'], Auth::user()->password) )
        {
            User::where('slug', Auth::user()->slug)->update(['name'=>$dat['name'], 'password'=>bcrypt($dat['password'])]);
            return to_route('back.setting.edit')->with('success', 'Votre compte a bien été modifier');
        }
        return to_route('back.setting.edit')->with('error', 'Il y a une erreur sur le mot de passe');

    }

    public function notif(): View
    {
        return view('back.setting.notif');
    }

    public function param() :View
    {
        $repex = Repex::with('pays')->get();
        $us = User::where('id', '=', Auth::id())->get()->first();
        return view('Back.params.params', compact('repex', 'us'));
    }

    public function pays():View
    {
        $pays = Pays::all();
        $us = User::where('id', '=', Auth::id())->get()->first();
        return view('back.params.pays', compact('pays','us'));
    }
}
