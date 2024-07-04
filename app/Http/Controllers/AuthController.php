<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Session;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('login.form');
    }

    public function doLogin(LoginRequest $request)
    {
        $user = $request->validated();

        if (Auth::attempt($user)){
            $request->session()->regenerate();
            $id = User::where('email' , '=', $user['email'])->first()->id;
            $sessionData['userid'] = $id;
            $sessionData['ip_address'] = $request->ip();
            $sessionData['user_agent'] = $request->header('User-Agent');
            Session::create($sessionData);
            return redirect()->route('back.index');
        }

        return to_route('login.index')->withErrors(['loginFailed' => 'information error'])->onlyInput('email');
    }

    public function logout()
    {
        Auth::logout();
        return to_route('index');
    }

}
