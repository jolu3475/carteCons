<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class beginController extends Controller
{
    public function index(): View
    {
        return View('form.carte');
    }

    public function submit()
    {
        return redirect()->route('index');
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
