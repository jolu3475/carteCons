<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BackController extends Controller
{
    public function index(): View
    {
        return view('back.index');
    }

    public function userProfile(): View
    {
        return view('back.profile');
    }

    public function userManag(): View
    {
        return view('back.user');
    }
}
