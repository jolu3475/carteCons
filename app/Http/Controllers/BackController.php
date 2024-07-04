<?php

namespace App\Http\Controllers;

use App\Models\Pays;
use App\Models\User;
use App\Models\Carte;
use App\Models\Erreur;
use App\Mail\refusMail;
use App\Models\Regular;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Requests\refusRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class BackController extends Controller
{
    public function index(): View
    {
        $users = Carte::all();
        $pays = Pays::all();
        return view('back.index', ['data' => $users, 'dataPays' => $pays]);
    }

    public function show(Carte $carte ,Regular $user): View
    {
        return view('back.show', ['carte' => $carte ,'data' => $user]);
    }

    public function valid( Request $request)
    {
        if ($request->has('refuser')){
            return redirect()->route('back.refuser', ['id' => $request['refuser']]);
        }
        if ($request->has('valider')){
            $carte = Carte::find(request('valid'));
            $carte->update(['valide' => 1]);

        }

    }

    public function refuser(Carte $id): View
    {
        return view('back.refuser', ['data' => $id]);
    }

    public function refuserSend(refusRequest $request)
    {
        $toEmail = Carte::where('id', '=', $request->valider)->first()->regular()->get('email')->first()->email;
        $id = Carte::where('id', '=', $request->valider)->first()->regular()->get('id')->first()->id;
        $subject = 'Refus de votre carte';
        $contenu = $request->validated();
        Mail::to($toEmail)->send(new refusMail($contenu['Raison'], $subject));
        Erreur::create(['carteId' => $request->valider, 'regularId' => $id ,'contenu' => $contenu['Raison']]);
        Carte::where('id', '=', $request->valider)->update(['vu' => 1]);
        return redirect()->route('back.index');
    }

    public function create(): View
    {
        return view('back.create');
    }

    public function userProfile(): View
    {
        return view('back.profile');
    }

    public function userManag(): View
    {
        $user = User::where('id', '<>', Auth::id())->where('id', '<>', 1)->get();
        return view('back.user', ['data' => $user]);
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
