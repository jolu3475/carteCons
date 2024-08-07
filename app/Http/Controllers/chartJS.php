<?php

namespace App\Http\Controllers;

use App\Models\Pays;
use App\Models\Carte;
use App\Models\Regular;
use Illuminate\Http\Request;

class chartJS extends Controller
{
    //
    public function index(Request $request)
    {
        // $carteData = Carte::where('paysId', $request->paysId)
        // /* utilisation de when pour filtrer par date */
        // ->when($request->from,function($query) use ($request){
        //     return $query->whereDate('updated_at','>=',$request->from);
        // })
        // ->when($request->to,function($query) use ($request){
        //     return $query->whereDate('updated_at','<=',$request->to);
        // })
        // ->selectRaw('SUM(vu) as Vu, SUM(valide) as Valide, COUNT(*) as Total')
        // ->get();

        $regularData = Regular::where('paysId', $request->paysId)->get();

        if($regularData->isEmpty()){
            return response()->json([
                'data' => []
            ]);
        }
        foreach ($regularData as $key => $value) {
            $carteData[$key] = Carte::where('regularId', $value->id)
                ->selectRaw('SUM(vu) as Vu, SUM(valide) as Valide, COUNT(*) as Total')
                ->get();
        }

        $pays = Pays::where('id', $request->paysId)->first()->nom;

        return response()->json([
            'data' => $carteData
        ]);
    }
}
