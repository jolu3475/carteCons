<?php

namespace App\Http\Controllers;

use App\Models\Pays;
use App\Models\User;
use App\Models\Juridiction;
use Illuminate\Http\Request;
use App\Http\Requests\PaysRequest;
use Illuminate\Support\Facades\Auth;

class PaysController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pays = Pays::with('juridictions')->get();
        $juridictions = Juridiction::get();
        $us = User::where('id', '=', Auth::id())->get()->first();
        return view('back.params.pays', compact('pays','us','juridictions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PaysRequest $request)
    {
        Pays::create($request->validated());
        return redirect()->route('settingBack.pays.index')->with('success', 'Pays ajouté avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($code)
    {
        $pays = Pays::where('code', '=', $code)->with('juridictions')->get()->first();
        return view('Back.params.editPays', compact('pays'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PaysRequest $request, $code)
    {
        Pays::where('code', $code)->update($request->validated());
        return redirect()->route('settingBack.pays.index')->with('success', 'Pays modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Pays::where('code', '=', $id)->delete();
        return redirect()->route('settingBack.pays.index')->with('success', 'Pays supprimé avec succès');
    }
}
