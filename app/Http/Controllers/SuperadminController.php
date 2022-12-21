<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuarios;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Carbon\Carbon;

class SuperadminController extends Controller {
    public function index() {
        //return view('superadmin.inicio');
        return view('superadmin.inicio');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function listarUsuarios() {
        return view('superadmin.usuarios.listar');
    }

    public function guardarAdmin(Request $request) {
        /*$request->validate(
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
                'nombre.max' => 'El nombre excede los 50 caracteres',
                'apellido.required' => 'El apellido es requerido',
                'apellido.max' => 'El apellido excede los 50 caracteres',
                'run.required' => 'El RUN es requerido',
                'run.regex' => 'El formato del RUN debe ser 12345678-9',
                'run.unique' => 'El RUN ya se encuentra registrado',
                'email.required' => 'El correo electrónico es requerido',
                'email.max' => 'El correo electrónico excede los 100 caracteres',
                'email.unique' => 'El correo electrónico ya se encuentra registrado',
                'clave.required' => 'La contraseña es requerida',
                'clave.min' => 'La contraseña debe tener 8 caracteres como mínimo',
                'clave.max' => 'La contraseña debe tener 25 caracteres como máximo',
                'confirmarclave.required' => 'La confirmación de contraseña es requerida',
                'confirmarclave.same' => 'Las contraseñas no coinciden'
            ]
        );*/

        $usuario = Usuarios::create([
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
        if (!$usuario) {
            //return redirect()->back()->with('errorRegistro', 'Ocurrió un error durante el registro del usuario, inténtelo más tarde.')->withInput();
            return redirect()->route('superadmin.gestionar.usuarios')->with('errorRegistro', 'Ocurrió un error durante el registro del usuario, inténtelo más tarde.');
        }
        return redirect()->route('superadmin.gestionar.usuarios')->with('usuarioRegistrado', 'El usuario fue registrado correctamente.');
    }
}
