<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Usuarios;
use Illuminate\Http\Request;

class ObservadorController extends Controller
{
    public function index()
    {
        return view('observador.home');
    }
}
