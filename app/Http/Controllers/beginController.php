<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Http\Requests\carteRequest;

class beginController extends Controller
{
    public function index(): View
    {
        return View('form.carte');
    }

    public function submit( carteRequest $request)
    {
        dd($request->validated());
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
