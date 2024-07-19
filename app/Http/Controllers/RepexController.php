<?php

namespace App\Http\Controllers;

use App\Models\Pays;
use App\Models\User;
use App\Models\Repex;
use App\Models\Juridiction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\RepexRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\juridictionRequest;

class RepexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $repex = Repex::with('pays')->get();
        $paysNonUtilises = $repex->pluck('codePays');
        $pays = Pays::whereNotIn('code', $paysNonUtilises)->orderBy('nom', 'asc')->get();
        $us = User::where('id', '=', Auth::id())->get()->first();
        return view('Back.params.params', compact('repex', 'us', 'pays'));
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
    public function store(RepexRequest $request)
    {
        $repex = Repex::create($request->all());
        return redirect()->route('settingBack.repex.index')->with('success', 'Ajout effectué avec succès');
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
    public function edit(Repex $repex)
    {
        $pays = Pays::orderBy('nom','asc')->get();
        $paysNonUtilises = Juridiction::pluck('codePays');
        $paysLib = Pays::whereNotIn('code', $paysNonUtilises)->orderBy('nom', 'asc')->get();
        return view('Back.params.editRepex', compact('repex', 'pays', 'paysLib'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RepexRequest $request, $id)
    {
        $repex = Repex::where('id' , $id)->first()->update($request->all());
        return redirect()->route('settingBack.repex.index')->with('success', 'Modification effectuée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $repex = Repex::where('id', $id)->first()->delete();
        return redirect()->route('settingBack.repex.index')->with('success', 'Suppression effectuée avec succès');
    }

    public function removeJurid(juridictionRequest $request, $id)
    {
        $pays = $request->validated();
        foreach($pays['pays'] as $p){
            Juridiction::where('codePays', $p)->where('repexId', $id)->delete();
        }
        return redirect()->route('settingBack.repex.index')->with('success', 'Suppression effectuée avec succès');
    }

    public function addJurid(juridictionRequest $request, $id)
    {
        $pays = $request->validated();
        foreach($pays['pays'] as $p){
            Juridiction::create([
                'codePays' => $p,
                'repexId' => $id
            ]);
        }
        return redirect()->route('settingBack.repex.index')->with('success', 'Ajout effectué avec succès');
    }
}
