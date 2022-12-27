<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AutenticationController extends Controller
{


    public function ingresar()
    {
        return view('auth.ingresar');
    }

    public function validarIngreso(Request $request)
    {
        $request->validate(
            [
                'run' => 'required|regex:/(^[0-9]{7,8}-[0-9kK]{1}$)/i',
                'clave' => 'required',
            ],
            [
                'run.required' => 'El RUN es requerido',
                'run.regex' => 'El formato del RUN debe ser 12345678-9',
                'clave.required' => 'La contraseña es requerida'
            ]
        );

        $usuario = Usuarios::where('usua_rut', $request->run)->first();
        if (!$usuario) {
            return redirect()->back()->with('errorRut', 'El usuario no está registrado');
        }

        $validarClave = Hash::check($request->clave, $usuario["usua_clave"]);
        if (!$validarClave) {
            return redirect()->back()->with('errorClave', 'La contraseña es incorrecta')->withInput();
        }

        if ($usuario->usua_vigente == 'N') {
            return redirect()->back()->with('errorVigencia', 'El usuario no se encuentra habilitado.')->withInput();
        }

        if ($usuario->rous_codigo == 1) {
            $request->session()->put('admin', $usuario);
            return redirect()->route('admin.index');
        } elseif ($usuario->rous_codigo == 2) {
            $request->session()->put('digitador', $usuario);
            return redirect()->route('editor.index');
        } elseif ($usuario->rous_codigo == 3) {
            $request->session()->put('observador', $usuario);
            return redirect()->route('observador.index');
        } else {
            $request->session()->put('superadmin', $usuario);
            return redirect()->route('superadmin.index');
        }

    }

    public function registrar()
    {
        $roles = DB::table('roles_usuarios')->select('rous_codigo', 'rous_nombre')->limit(3)->orderBy('rous_codigo')->get();
        return view('auth.registrar', compact('roles'));
    }

    public function guardarRegistro(Request $request)
    {
        $validacion = $request->validate(
            [
                'run' => 'required',
                'nombre' => 'required|max:100',
                'apellido' => 'required|max:100',
                'email' => 'required|max:100',
                'email_alt' => 'max:100',
                'clave' => 'required',
                'cargo' => 'required|max:100',
                'profesion' => 'max:100',
                'rol' => 'required'
            ],
            [
                'run.required' => 'Es necesario ingresar un rut',
                'nombre.required' => 'El nombre es un parametro requerido',
                'nombre.max' => 'El nombre ingresado supera el máximo de carácteres permitidos',
                'apellido.required' => 'El apellido es un parametro requerido',
                'apellido.max' => 'El apellido ingresado supera el máximo de carácteres permitidos',
                'email.requerid' => 'El email es un parametro requerido',
                'email.max' => 'El email ingresado supera el máximo de carácteres permitidos',
                'email_alt.max' => 'El email alternativo ingresado supera el máximo de carácteres permitidos',
                'clave.required' => 'La contraseña es requerida',
                'cargo.required' => 'Es requido asignar un cargo al usuario',
                'cargo.max' => 'El cargo supera la cantidad máxima de carácteres permitidos',
                'profesion.max' => 'La profesión supera la cantidad máxima de carácteres permitidos',
                'rol.required' => 'Es requido asignar un rol al usuario',

            ]
        );
        $usuario = Usuarios::create([
            'usua_rut' => Str::upper($request->run),
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
            'usua_usuario_mod' => Session::get('admin')->usua_rut,
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
            return redirect()->to('ingresar')->with('sessionFinalizada', 'Sesión finalizada.');
        } elseif (Session::has('digitador')) {
            Session::forget('digitador');
            return redirect()->to('ingresar')->with('sessionFinalizada', 'Sesión finalizada.');
        } elseif (Session::has('observador')) {
            Session::forget('observador');
            return redirect()->to('ingresar')->with('sessionFinalizada', 'Sesión finalizada.');
        } else {
            Session::forget('superadmin');
            return redirect()->to('ingresar')->with('sessionFinalizada', 'Sesión finalizada.');
        }

        return redirect()->back();
    }

    public function registrarSuperadmin()
    {
        return view('auth.registrar_superadmin');
    }

    public function guardarSuperadmin(Request $request)
    {
        $request->validate(
            [
                'nombre' => 'required|max:50',
                'apellido' => 'required|max:50',
                'run' => 'required|regex:/(^[0-9]{7,8}-[0-9kK]{1}$)/i|unique:usuarios,usua_rut',
                'email' => 'required|max:100|unique:usuarios,usua_email',
                'clave' => 'required|min:8|max:25',
                'confirmarclave' => 'required|same:clave'
            ],
            [
                'nombre.required' => 'El nombre es requerido',
                'nombre.max' => 'El nombre excede los 50 carácteres',
                'apellido.required' => 'El apellido es requerido',
                'apellido.max' => 'El apellido excede los 50 carácteres',
                'run.required' => 'El RUN es requerido',
                'run.regex' => 'El formato del RUN debe ser 12345678-9',
                'run.unique' => 'El RUN ya se encuentra registrado',
                'email.required' => 'El correo electrónico es requerido',
                'email.max' => 'El correo electrónico excede los 100 carácteres',
                'email.unique' => 'El correo electrónico ya se encuentra registrado',
                'clave.required' => 'La contraseña es requerida',
                'clave.min' => 'La contraseña debe tener 8 carácteres como mínimo',
                'clave.max' => 'La contraseña debe tener 25 carácteres como máximo',
                'confirmarclave.required' => 'La confirmación de contraseña es requerida',
                'confirmarclave.same' => 'Las contraseñas no coinciden'
            ]
        );

        $usuario = Usuarios::create([
            'usua_rut' => Str::upper($request->run),
            'rous_codigo' => 4,
            'unid_codigo' => 1,
            'usua_email' => $request->email,
            'usua_email_alternativo' => '',
            'usua_clave' => Hash::make($request->clave),
            'usua_nombre' => $request->nombre,
            'usua_apellido' => $request->apellido,
            'usua_cargo' => '',
            'usua_profesion' => '',
            'usua_creado' => Carbon::now()->toDateString(),
            'usua_actualizado' => Carbon::now()->toDateString(),
            'usua_vigente' => 'N',
            'usua_usuario_mod' => Str::upper($request->run),
        ]);
        if (!$usuario) {
            return redirect()->back()->with('errorRegistro', 'Ocurrió un error durante el registro del usuario, inténtelo más tarde.')->withInput();
        }
        return redirect()->route('auth.ingresar')->with('usuarioRegistrado', 'El usuario fue registrado correctamente.');
    }

}
