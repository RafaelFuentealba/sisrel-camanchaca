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
        return view('admin.usuarios.editar', compact('roles','usuario'));
    }

    public function update(Request $request, $rut)
    {
        $usuario = Usuarios::where(['usua_rut'=>$rut])->update([
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
            'usua_vigente' => $request->vigente,
            'usua_usuario_mod' => Session::get('admin')->usua_rut,
            'rous_codigo' => $request->rol,
            'unid_codigo' => 1,
        ]);

        if ($usuario) {
            return redirect()->route('admin.users');
        }

        return redirect()->back()->with('errorRegistro', 'Ocurrio un error durante el registro');
    }

    public function destroy($rut)
    {
        Usuarios::where(['usua_rut' => $rut])->delete();
        return redirect()->route('admin.users');
    }

}
