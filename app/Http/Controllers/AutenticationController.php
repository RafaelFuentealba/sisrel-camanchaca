<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use DB;

class AutenticationController extends Controller
{


    public function ingresar()
    {
        return view('auth.ingresar');
    }

    public function validarIngreso(Request $request)
    {
        $request->validate([
            'run' => 'required',
            'clave' => 'required'
        ], [
                'run.required' => 'El rut de usuario es incorrecto o no se encuentra registrado',
                'clave.required' => 'La contraseña es incorrecta'
            ]);

        $usuario = Usuarios::where('usua_rut', $request->run)->first();
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
            return redirect()->route('observador.index');
        }

    }

    public function registrar()
    {
        $roles = DB::table('roles_usuarios')->select('rous_codigo','rous_nombre')->limit(3)->orderBy('rous_codigo')->get();
        return view('auth.registrar',compact('roles'));
    }

    public function guardarRegistro(Request $request)
    {
        $usuario = Usuarios::create([
            'usua_rut' => $request->run,
            'usua_email' => $request->email,
            'usua_email_alternativo' => $request->email_alt,
            // hash para ocultar la clave
            'usua_clave' => Hash::make($request->clave),
            'usua_nombre' => $request->nombre,
            'usua_apellido' => $request->apellido,
            'usua_cargo' => $request->cargo,
            'usua_profesion' => $request->profesion,
            'usua_creado' => Carbon::now()->toDateString(),
            'usua_actualizado' => Carbon::now()->toDateString(),
            'usua_vigente' => 'S',
            'usua_usuario_mod' => $request->rut,
            'rous_codigo' => $request->rol,
            'unid_codigo' => 1,
        ]);
        if ($usuario) {
            return redirect()->route('admin.index');
        }

        return redirect()->back()->with('errorRegistro', 'Ocurrio un error durante el registro');
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
