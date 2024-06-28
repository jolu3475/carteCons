<?php

namespace App\Http\Controllers;

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
            /* $sessionData['userid'] = User::where();
            Session::create(); */
            return redirect()->route('back.index');
        }

        return to_route('login.form')->withErrors(['loginFailed' => 'information error'])->onlyInput('email');
    }

    public function logout()
    {
        Auth::logout();
        return to_route('index');
    }

}
