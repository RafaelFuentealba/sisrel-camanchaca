<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuarios;
use App\Models\RolesUsuarios;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redis;
use PhpParser\Builder\Use_;

class SuperadminController extends Controller {
    protected $nombreRol;

    public function __construct() {
        $this->nombreRol = RolesUsuarios::select('rous_nombre')->where('rous_codigo', 1)->first()->rous_nombre;
    }

    public function index() {
        return view('superadmin.inicio');
    }

    public function crearUsuario() {
        return view('superadmin.usuarios.crear');
    }

    public function listarUsuarios() {
        return view('superadmin.usuarios.listar', [
            'usuarios' => Usuarios::where('rous_codigo', 1)->orderBy('usua_creado', 'desc')->get()
        ]);
    }

    public function guardarAdmin(Request $request) {
        $request->validate(
            [
                'nombre' => 'required|max:50',
                'apellido' => 'required|max:50',
                'run' => 'required|regex:/(^[0-9]{7,8}-[0-9kK]{1}$)/i',
                'email' => 'required|max:100',
                'clave' => 'required|min:8|max:25',
                'confirmarclave' => 'required|same:clave'
            ],
            [
                'nombre.required' => 'El nombre es requerido',
                'nombre.max' => 'El nombre excede los 50 caracteres',
                'apellido.required' => 'El apellido es requerido',
                'apellido.max' => 'El apellido excede los 50 caracteres',
                'run.required' => 'El RUN es requerido',
                'run.regex' => 'El formato del RUN debe ser 12345678-9',
                'email.required' => 'El correo electrónico es requerido',
                'email.max' => 'El correo electrónico excede los 100 caracteres',
                'clave.required' => 'La contraseña es requerida',
                'clave.min' => 'La contraseña debe tener 8 caracteres como mínimo',
                'clave.max' => 'La contraseña debe tener 25 caracteres como máximo',
                'confirmarclave.required' => 'La confirmación de contraseña es requerida',
                'confirmarclave.same' => 'Las contraseñas no coinciden'
            ]
        );

        $usuaVerificar = Usuarios::where(['usua_rut' => Str::upper($request->run), 'rous_codigo' => 1])->first();
        if ($usuaVerificar) return redirect()->back()->with('errorRegistro', 'El usuario ya se encuentra registrado como '.$this->nombreRol.'.')->withInput();

        $usuaCrear = Usuarios::create([
            'usua_rut' => Str::upper($request->run),
            'rous_codigo' => 1,
            'unid_codigo' => NULL,
            'usua_email' => $request->email,
            'usua_email_alternativo' => '',
            'usua_clave' => Hash::make($request->clave),
            'usua_nombre' => $request->nombre,
            'usua_apellido' => $request->apellido,
            'usua_cargo' => '',
            'usua_profesion' => '',
            'usua_creado' => Carbon::now()->toDateString(),
            'usua_actualizado' => Carbon::now()->toDateString(),
            'usua_vigente' => 'S',
            'usua_usuario_mod' => Session::get('superadmin')->usua_rut
        ]);
        if (!$usuaCrear) return redirect()->back()->with('errorRegistro', 'Ocurrió un error durante el registro del usuario '.$this->nombreRol.', inténtelo más tarde.')->withInput();
        return redirect()->route('superadmin.crear.usuario')->with('exitoRegistro', 'El usuario '.$this->nombreRol.' fue registrado correctamente.');
    }

    public function eliminarAdmin($usua_rut) {
        $usuaVerificar = Usuarios::where(['usua_rut' => $usua_rut, 'rous_codigo' => 1])->first();
        if (!$usuaVerificar) return redirect()->back()->with('errorUsuario', 'El usuario '.$this->nombreRol.' no se encuentra registrado.');
        
        $usuaEliminar = Usuarios::where(['usua_rut' => $usua_rut, 'rous_codigo' => 1])->delete();
        if (!$usuaEliminar) return redirect()->back()->with('errorUsuario', 'Ocurrió un error al eliminar el usuario '.$this->nombreRol.', inténtelo más tarde.');
        return redirect()->route('superadmin.listar.usuarios')->with('exitoUsuario', 'El usuario '.$this->nombreRol.' fue eliminado correctamente.');
    }

    public function habilitarAdmin($usua_rut) {
        $usuaVerificar = Usuarios::where(['usua_rut' => $usua_rut, 'rous_codigo' => 1])->first();
        if (!$usuaVerificar) return redirect()->back()->with('errorUsuario', 'El usuario '.$this->nombreRol.' no se encuentra registrado.');

        $usuaActualizar = Usuarios::where(['usua_rut' => $usua_rut, 'rous_codigo' => 1])->update([
            'usua_actualizado' => Carbon::now()->toDateTimeString(),
            'usua_vigente' => 'S',
            'usua_usuario_mod' => Session::get('superadmin')->usua_rut
        ]);
        if (!$usuaActualizar) return redirect()->back()->with('errorUsuario', 'Ocurrió un error al habilitar el usuario '.$this->nombreRol.', inténtelo más tarde.');
        return redirect()->route('superadmin.listar.usuarios')->with('exitoUsuario', 'El usuario '.$this->nombreRol.' fue habilitado correctamente.');
    }

    public function deshabilitarAdmin($usua_rut) {
        $usuaVerificar = Usuarios::where(['usua_rut' => $usua_rut, 'rous_codigo' => 1])->first();
        if (!$usuaVerificar) return redirect()->back()->with('errorUsuario', 'El usuario '.$this->nombreRol.' no se encuentra registrado.');

        $usuaActualizar = Usuarios::where(['usua_rut' => $usua_rut, 'rous_codigo' => 1])->update([
            'usua_actualizado' => Carbon::now()->toDateTimeString(),
            'usua_vigente' => 'N',
            'usua_usuario_mod' => Session::get('superadmin')->usua_rut
        ]);
        if (!$usuaActualizar) return redirect()->back()->with('errorUsuario', 'Ocurrió un error al deshabilitar el usuario '.$this->nombreRol.', inténtelo más tarde.');
        return redirect()->route('superadmin.listar.usuarios')->with('exitoUsuario', 'El usuario '.$this->nombreRol.' fue deshabilitado correctamente.');
    }

    public function listarRoles() {
        return view('superadmin.parametros.roles_usuarios', [
            'roles' => RolesUsuarios::orderBy('rous_codigo', 'asc')->get()
        ]);
    }

    public function actualizarRol(Request $request, $rous_codigo) {
        $validacion = $request->validate([
            'nombre' => 'required|max:100'
        ],
        [
            'nombre.required' => 'Nombre de rol es requerido',
            'nombre.max' => 'Nombre de rol excede los 100 caracteres'
        ]);
        if (!$validacion) return redirect()->back()->withErrors($validacion)->withInput();
        
        $rousVerificar = RolesUsuarios::where('rous_codigo', $rous_codigo)->first();
        if (!$rousVerificar) return redirect()->back()->with('errorRol', 'Rol de usuario no se encuentra registrado.');
        
        $rousActualizar = RolesUsuarios::where('rous_codigo', $rous_codigo)->update([
            'rous_nombre' => $request->nombre,
            'rous_actualizado' => Carbon::now()->toDateTimeString(),
            'rous_usuario_mod' => Session::get('superadmin')->usua_rut
        ]);
        if (!$rousActualizar) return redirect()->back()->with('errorRol', 'Ocurrió un error al actualizar el rol de usuario, inténtelo más tarde.');
        return redirect()->route('superadmin.listar.roles')->with('exitoRol', 'El rol de usuario fue actualizado correctamente.');
    }
}
