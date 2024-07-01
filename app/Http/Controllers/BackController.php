<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Carte;
use App\Models\Regular;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BackController extends Controller
{
    public function index(): View
    {
        $users = Carte::all();
        foreach ($users as $user) {
            $nom[] = Regular::where('id', $user->regularId)->get('nom');
            $prenom[] = Regular::where('id', $user->regularId)->get('prenom');
        }
        return view('back.index', ['data' => $users, 'nom' => $nom, 'prenom' => $prenom]);
    }

    public function show(Carte $carte ,Regular $user): View
    {
        return view('back.show', ['carte' => $carte ,'data' => $user]);
    }

    public function userProfile(): View
    {
        return view('back.profile');
    }

    public function userManag(): View
    {
        return view('back.user');
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
