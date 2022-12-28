<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Iniciativas;

class DigitadorController extends Controller
{
    public function index()
    {
        return view('digitador.home');
    }

    public function listarIniciativas()
    {
        return view('digitador.iniciativas.listar',[
            'iniciativas' => Iniciativas::all()
        ]);
    }


}
