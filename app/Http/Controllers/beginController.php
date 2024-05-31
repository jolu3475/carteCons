<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class beginController extends Controller
{
    public function index(): View
    {
        return View('form.carte');
    }

    public function form(): View
    {
        return View('form.form');
    }

}
