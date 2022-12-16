<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class AuthenticationController extends Controller
{
    // TODO: Integrar vista de login

    public function ingresar()
    {
        return view('auth.ingresar');
    }

    public function validarIngreso(Request $request)
    {
        $request->validate([
            'rut' => 'required',
            'clave' => 'required'
        ], [
                'rut.required' => 'El rut de usuario es incorrecto o no se encuentra registrado',
                'clave.required' => 'La contraseña es incorrecta'
            ]);

        $usuario = Usuarios::where('usua_rut', $request->rut)->first();
        if (!$usuario) {
            return redirect()->back()->with('errorRut', 'El rut de usuario no es correcto o no esta registrado');
        }

        $clave = Hash::check($request->clave, $usuario["usua_clave"]);

    }

    public function registrar()
    {
        return view('ahut.registrar');
    }

    public function guardarRegistro(Request $request)
    {
        $usuario = Usuarios::create([
            'usa_rut' => $request->rut,
            'usa_email' => $request->email,
            'usa_email_alternativo' => $request->email_alt,
            // hash para ocultar la clave
            'usa_clave' => Hash::make($request->clave),
            'usa_nombre' => $request->nombre,
            'usa_apellido' => $request->apellido,
            'usa_cargo' => $request->cargo,
            'usa_profesion' => $request->profesion,
            'usa_creado' => Carbon::now()->toDateString(),
            'usa_actualizado' => Carbon::now()->toDateString(),
            // estado por defecto A = Activo, S = Suspendido
            'usa_vigente' => 'A',
            'usa_usuario_mod' => $request->nombre,
            'rous_codigo' => $request->rol,
            'unid_codigo' => $request->unidad,
        ]);
    }

}
