<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutenticationController;
use App\Http\Controllers\SuperadminController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ObservadorController;
use App\Http\Controllers\DigitadorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('ingresar', [AutenticationController::class, 'ingresar'])->name('ingresar.formulario')->middleware('verificar.sesion');
Route::post('ingresar', [AutenticationController::class, 'validarIngreso'])->name('auth.ingresar');

Route::get('registrarSuperadmin', [AutenticationController::class, 'registrarSuperadmin'])->name('registrarsuperadmin.formulario');
Route::post('registrarSuperadmin', [AutenticationController::class, 'guardarSuperadmin'])->name('auth.registrar.superadmin');

Route::get('salir', [AutenticationController::class, 'cerrarSesion'])->name('auth.cerrar');


Route::middleware('verificar.admin')->group(function () {
    Route::get('admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('admin/registrar', [AutenticationController::class, 'registrar'])->name('registrar.formulario');
    Route::post('admin/registrar', [AutenticationController::class, 'guardarRegistro'])->name('auth.registrar');
    Route::get('admin/{usua_rut}/{rous_codigo}/editar', [AdminController::class, 'editar'])->name('admin.editar');
    Route::put('admin/{usua_rut}/{rous_codigo}/editar', [AdminController::class, 'actulizarUsuario'])->name('admin.update');
    Route::post('admin/{usua_rut}/{rous_codigo}/borrar', [AdminController::class, 'destroy'])->name('admin.borrar');


    Route::get('admin/organizaciones',[AdminController::class,'obetenerOrganizaciones'])->name('admin.listar.org');
    Route::get('admin/organizaciones/crear-tipo', [AdminController::class, 'crearTipoOrganizacion'])->name('admin.crear.tiporg');
    Route::post('admin/organizaciones/crear-tipo', [AdminController::class, 'guardaTipoOrganizacion'])->name('admin.guardar.tiporg');
    Route::get('admin/organizaciones/{tior_codigo}/editar-tipo', [AdminController::class, 'editarTipoOrganizacion'])->name('admin.editar.tiporg');
    Route::put('admin/organizacione/{tior_codigo}/editar-tipo', [AdminController::class, 'actualizarTipoOrganizacion'])->name('admin.actualizar.tiporg');
    Route::post('admid/organizaciones/{tior_codigo}/eliminar-tipo',[AdminController::class,'eliminarOrganizacionTipo'])->name('admin.borrar.tiporg');

    Route::get('admin/mapa', [AdminController::class, 'map'])->name("admin.map");
    Route::post('admin/mapa-regiones', [AdminController::class, 'obtenerDatosComunas'])->name('admin.map.regiones');
    Route::post('admin/mapa-comuna', [AdminController::class, 'obtenerDatosComuna'])->name('admin.map.comuna');

    Route::get('admin/analizar-datos', [AdminController::class, 'graficos'])->name('admin.graficos');

    Route::get('/usuarios', [AdminController::class, 'verUsuarios'])->name('admin.users');
    Route::get('crear-iniciativa', [AdminController::class, 'crearIniciativa'])->name('admin.crear.iniciativa');
});

Route::middleware('verificar.digitador')->group(function () {
    Route::get('digitador', [DigitadorController::class, 'index'])->name('digitador.index');
    Route::get('digitado/listar-iniciativas', [DigitadorController::class, 'listarIniciativas'])->name('digitador.listar.iniciativas');
});

Route::middleware('verificar.observador')-> group(function(){
    Route::get('observador',[ObservadorController::class, 'index'])->name('observador.index');
    Route::get('observador/data-analicis', [ObservadorController::class, 'graficos'])->name('observador.graficos');

    Route::get('observador/mapa', [ObservadorController::class, 'map'])->name("observador.map");
    Route::post('observador/mapa-regiones', [ObservadorController::class, 'obtenerDatosComunas'])->name('observador.map.regiones');
    Route::post('observador/mapa-comuna', [ObservadorController::class, 'obtenerDatosComuna'])->name('observador.map.comuna');
});


Route::middleware('verificar.superadmin')->group(function () {
    Route::get('superadmin', [SuperadminController::class, 'index'])->name('superadmin.index');
    Route::get('superadmin/crear-usuario', [SuperadminController::class, 'crearUsuario'])->name('superadmin.crear.usuario');
    Route::get('superadmin/listar-usuarios', [SuperadminController::class, 'listarUsuarios'])->name('superadmin.listar.usuarios');
    Route::post('superadmin/listar-usuarios', [SuperadminController::class, 'guardarAdmin'])->name('superadmin.registrar.admin');
    Route::put('superadmin/habilitar-usuario/{usua_rut}', [SuperadminController::class, 'habilitarAdmin'])->name('superadmin.habilitar.admin');
    Route::put('superadmin/deshabilitar-usuario/{usua_rut}', [SuperadminController::class, 'deshabilitarAdmin'])->name('superadmin.deshabilitar.admin');
    Route::delete('superadmin/eliminar-usuario/{usua_rut}', [SuperadminController::class, 'eliminarAdmin'])->name('superadmin.eliminar.admin');

    Route::get('superadmin/listar-roles', [SuperadminController::class, 'listarRoles'])->name('superadmin.listar.roles');
    Route::put('superadmin/actualizar-rol/{rous_codigo}', [SuperadminController::class, 'actualizarRol'])->name('superadmin.actualizar.rol');
});
