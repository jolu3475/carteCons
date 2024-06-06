<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('login.form');
    }

    public function doLogin()
    {
        return redirect()->route('index');
    }

    public function logout()
    {
        // Logout the user
    }

}
