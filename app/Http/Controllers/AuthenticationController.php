<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class AuthenticationController extends Controller
{


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
        if (!$clave) {
            return redirect()->back()->with('errorClave', 'La contraseña es incorrecta')->withInput();
        }

        if ($usuario["rous_codigo"] == 1) {
            $request->session()->put('admin', $usuario);
            return redirect()->route('admin.index');

        } elseif ($usuario["rous_codigo"] == 2) {
            $request->session()->put('digitador', $usuario);
            return redirect()->route('editor.index');

        } elseif ($usuario["rous_codigo"] == 3) {
            $request->session()->put('observador', $usuario);
        }

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

    public function cerrarSesion()
    {
        if (Session::has('admin')) {
            Session::forget('admin');
            return redirect()->to('ingresar')->with('sessionFinalizada', 'Sesion Finalizada');
        } elseif (Session::has('digitador')) {
            Session::forget('digitador');
            return redirect()->to('ingresar')->with('sessionFinalizada', 'Sesion Finalizada');
        } elseif (Session::has('observador')) {
            Session::forget('observador');
            return redirect()->to('ingresar')->with('sessionFinalizada', 'Sesion Finalizada');
        }

        return redirect()->back();
    }

}
