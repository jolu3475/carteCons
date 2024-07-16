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
use Illuminate\View\View;
use App\Models\Juridiction;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Requests\createUsr;
use App\Http\Requests\refusRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class BackController extends Controller
{
    public function index(): View
    {
        $users = Regular::all();
        return view('back.index', ['data' => $users]);
    }

    public function show(Carte $carte ,Regular $user): View
    {
        return view('back.show', ['carte' => $carte ,'data' => $user]);
    }

    public function pdfGenerator(Regular $data){
        $dataArray = $data->toArray();
        $repex = Juridiction::where('codePays', '=', $dataArray['codePays'])->first();
       /*  dd($data->carte()->get()->first()->toArray()); */
        $pdf = Pdf::loadView('pdf.sortie', ['repex' => $repex->repex()->get()->first()->toArray(), 'data' => $dataArray, 'carte' => $data->carte()->get()->first()->toArray()]);

        $pdf->setPaper('A5', 'landscape');

        // Obtenez le contenu du PDF sous forme de chaîne de caractères
        $pdfContent = $pdf->output();

        // Définissez le nom du fichier et le chemin où il sera sauvegardé
        $numero = $data->carte()->get('numero')->first()->numero;
        $filename = "{$numero}.pdf";
        $path = public_path('pdf/');

        // Enregistrez le PDF sur le serveur
        $pdf->save($path.$filename);

        return $pdf->stream($filename);
    }

    public function valid( Request $request)
    {
        if ($request->has('refuser')){
            return redirect()->route('back.refuser', ['id' => $request['refuser']]);
        }
        if ($request->has('valider')){
            $slug = $request->valider;
            return redirect()->route('back.pdfGenerator', ['slug' => $slug], 303);
        }
    }

    public function refuserSend(refusRequest $request)
    {
        $toEmail = Carte::where('id', '=', $request->valider)->first()->regular()->get('email')->first()->email;
        $id = Carte::where('id', '=', $request->valider)->first()->regular()->get('id')->first()->id;
        $subject = 'Refus de votre carte';
        $contenu = $request->validated();
        $slug = Carte::where('id', '=', $request->valider)->first()->regular()->get('slug')->first()->slug;
        $link = route('form.index', ['slug' => $slug]);
        Mail::to($toEmail)->send(new refusMail($contenu['Raison'], $subject, $link));
        Erreur::create(['carteId' => $request->valider, 'regularId' => $id ,'contenu' => $contenu['Raison']]);
        Carte::where('id', '=', $request->valider)->update(['vu' => true]);
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
        $data['slug'] = $request->input('slug');

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
        return view('back.user', ['data' => $user, 'user' => $us]);
    }

    public function setting(): View
    {
        return view('back.setting.view');
    }

    public function edit(): View
    {
        return view('back.setting.edit');
    }

    public function notif(): View
    {
        return view('back.setting.notif');
    }
}
