<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AdminController extends Controller
{

    public function index()
    {
        return view('admin.home');
    }


    public function verUsuarios()
    {
        $usuarios = Usuarios::all();
        return view('admin.usuarios.listar', compact('usuarios'));
    }


    public function editar($rut)
    {
        $usuario = Usuarios::where(['usua_rut' => $rut])->first();
        $roles = DB::table('roles_usuarios')->select('rous_codigo', 'rous_nombre')->limit(3)->orderBy('rous_codigo')->get();
        return view('admin.usuarios.editar', compact('roles', 'usuario'));
    }

    public function actulizarUsuario(Request $request, $rut)
    {
        $validacion = $request->validate(
            [
                'nombre' => 'required|max:100',
                'apellido' => 'required|max:100',
                'email' => 'required|max:100',
                'email_alt' => 'max:100',
                'run' => 'required',
                'cargo' => 'required',
                'rol' => 'required',
                'vigente' => 'required',
                'profesion' => 'max:100',
            ],
            [
                'nombre.required' => 'El nombre para el usuario es requerido',
                'nombre.max' => 'El nombre asignado supera el máximo de carácteres permitidos',
                'apellido.required' => 'El apellido para el usuario es requerido',
                'apellido.max' => 'El apellido asignado supera el máximo de carácteres permitidos',
                'email.required' => 'El email para el usuario es requerido',
                'email.max' => 'El email asignado supera el máximo de carácteres permitidos',
                'email_alt.max' => 'El email alternativo asignado supera el máximo de carácteres permitidos',
                'run.required' => 'El run para el usuario es requerido',
                'cargo.required' => 'El usuario necesita tener un cargo asignado',
                'vigente.required' => 'El usuario debe de tener una vigencia',
                'profesion.max' => 'La profesion super el máximo de caracteres permitidos',
            ]
        );

        if (!$validacion) {

            return redirect()->back()->withErrors($validacion)->withInput();
        }

        $usuario = Usuarios::where(['usua_rut' => $rut])->update([
            'usua_rut' => Str::upper($request->run),
            'usua_email' => $request->email,
            'usua_email_alternativo' => $request->email_alt,
            // hash para ocultar la clave
            'usua_clave' => Hash::make($request->clave),
            'usua_nombre' => $request->nombre,
            'usua_apellido' => $request->apellido,
            'usua_cargo' => $request->cargo,
            'usua_profesion' => $request->profesion,
            'usua_actualizado' => Carbon::now()->toDateString(),
            'usua_vigente' => $request->vigente,
            'usua_usuario_mod' => Session::get('admin')->usua_rut,
            'rous_codigo' => $request->rol,
            'unid_codigo' => 1,
        ]);

        if ($usuario) {
            return redirect()->route('admin.users');
        }

        return redirect()->back()->with('errorActualizacion', 'Ocurrio un error durante la actualizacion');
    }

    public function destroy($rut)
    {
        Usuarios::where(['usua_rut' => $rut])->delete();
        return redirect()->route('admin.users');
    }

    public function graficos()
    {
        return view('admin.charts.graficos');
    }
}
