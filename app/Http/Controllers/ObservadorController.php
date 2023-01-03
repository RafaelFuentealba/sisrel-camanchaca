<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comunas;
use Illuminate\Support\Facades\DB;

class ObservadorController extends Controller
{
    public function index()
    {
        return view('observador.home');
    }


    public function graficos()
    {
        return view('observador.charts.graficos');
    }

    public function map()
    {
        return view('observador.mapas.mapa', [
            'regiones' => DB::table('regiones')->orderBy('regi_cut')->get()
        ]);
    }

    public function obtenerDatosComunas(Request $request)
    {
        if (isset($request->region)) {
            $comunas = Comunas::all()->where('regi_codigo', $request->region);
            // $comunas = DB::table('comunas')->where('regi_codigo', $request->region)->get();
            return response()->json(['comunas' => $comunas, 'success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function obtenerDatosComuna(Request $request)
    {
        if (isset($request->comunas)) {
            $comuna = Comunas::all()->where('comu_codigo', $request->comunas);
            return response()->json(['comuna' => $comuna, 'success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }

}
