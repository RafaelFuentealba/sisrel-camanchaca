<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use App\Models\Regiones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\Comunas;
use App\Models\TipoOrganizacion;
use App\Models\Organizaciones;

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
            'usua_actualizado' => Carbon::now()->format('Y-m-d H:i:s'),
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

    public function destroy($rut, $rol)
    {
        Usuarios::where(['usua_rut' => $rut, 'rous_codigo' => $rol])->delete();
        return redirect()->route('admin.users');
    }

    public function obetenerOrganizaciones()
    {
        return view('admin.organizaciones.listar', [
            'tiposOrganizacion' => TipoOrganizacion::all(),
            'organizaciones' => Organizaciones::all()
        ]);
    }

    public function crearTipoOrganizacion()
    {
        return view('admin.organizaciones.crear_tipo', [
            'tipos' => TipoOrganizacion::all()
        ]);
    }

    public function guardaTipoOrganizacion(Request $request)
    {
        $request->validate(
            [
                'nombre' => 'required|max:50',
                'icono' => 'required',
            ],
            [
                'nombre.require' => 'El nombre es requerido',
                'nombre.max' => 'El nombre excede el máximo de carácteres prermitidos',
                'icono.require' => 'El tipo de organizacion es requerido',
            ]
        );

        $tipoOrganizacion = TipoOrganizacion::create([
            'tior_nombre' => $request->nombre,
            'tior_ruta_icono' => $request->icono,
            'tior_creado' => Carbon::now()->format('Y-m-d H:i:s'),
            'tior_actualizado' => Carbon::now()->format('Y-m-d H:i:s'),
            'tior_vigente' => 'S',
            'tior_rut_mod' => Session::get('admin')->usua_rut,
            'tior_rol_mod' => Session::get('admin')->rous_codigo
        ]);

        if ($tipoOrganizacion) {
            return redirect()->route('admin.listar.org');
        }

        return redirect()->back()->with('errorRegistro', 'Ocurrio un error durante el registro');
    }

    public function editarTipoOrganizacion($tipo)
    {
        return view('admin.organizaciones.editar_tipo', [
            'tiporg' => TipoOrganizacion::where(['tior_codigo' => $tipo])->first()
        ]);
    }

    public function actualizarTipoOrganizacion(Request $request, $tiporg)
    {
        $validacion = $request->validate(
            [
                'nombre' => 'required|max:50',
                'icono' => 'required',
                'vigente' => 'required'
            ],
            [
                'nombre.require' => 'El nombre es requerido',
                'nombre.max' => 'El nombre excede el máximo de carácteres prermitidos',
                'icono.require' => 'El tipo de organizacion es requerido',
                'vigente.require' => 'El estado del icono Es requerido',
            ]
        );

        if (!$validacion) {

            return redirect()->back()->withErrors($validacion)->withInput();
        }

        $tiporganizacion = TipoOrganizacion::where(['tior_codigo' => $tiporg])->update([
            'tior_nombre' => $request->nombre,
            'tior_ruta_icono' => $request->icono,
            'tior_actualizado' => Carbon::now()->format('Y-m-d H:i:s'),
            'tior_rut_mod' => Session::get('admin')->usua_rut,
            'tior_rol_mod' => Session::get('admin')->rous_codigo,
            'tior_vigente' => $request->vigente

        ]);

        if ($tiporganizacion) {
            return redirect()->route('admin.listar.org');
        }

        return redirect()->back()->with('errorActualizacion', 'Ocurrio un error durante la actualizacion');
    }

    public function eliminarOrganizacionTipo($tipo)
    {
        TipoOrganizacion::where(['tior_codigo' => $tipo])->delete();
        return redirect()->route('admin.listar.org');
    }
    public function graficos()
    {
        return view('admin.charts.graficos');
    }

    public function map()
    {
        return view('admin.mapas.mapa', [
            'regiones' => DB::table('regiones')->orderBy('regi_cut')->get()
        ]);
    }

    public function obtenerDatosComunas(Request $request)
    {
        if (isset($request->region)) {
            $comunas = Comunas::all()->where('regi_codigo', $request->region);
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
    public function crearIniciativa()
    {
        return view('admin.iniciativas.crear');
    }
}
