<?php

namespace App\Http\Controllers;

use App\Models\Regular;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\carteRequest;

class beginController extends Controller
{

    public function index(): View
    {
        $pays = DB::table('pays')->pluck('nom', 'code');
        $indicatifs = DB::table('pays')->pluck('indicatif', 'code');
        return View('form.carte', compact('pays', 'indicatifs'));
    }

    public function submit( carteRequest $request)
    {
        $slug = $request->input('slug');
        $data = $request->validated();
        $data['slug'] = $slug; // Explicitly set the slug
        Regular::create($data);
        return redirect()->route('form.index');
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
