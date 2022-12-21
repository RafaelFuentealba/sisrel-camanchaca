<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutenticationController;
use App\Http\Controllers\SuperadminController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ObservadorController;

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
    Route::get('registrar', [AutenticationController::class, 'registrar'])->name('registrar.formulario');
    Route::post('registrar', [AutenticationController::class, 'guardarRegistro'])->name('auth.registrar');


    Route::get('/usuarios', [AdminController::class, 'verUsuarios'])->name('admin.users');
});
Route::middleware('verificar.observador')-> group(function(){
    Route::get('/',[ObservadorController::class, 'index'])->name('observador.index');
});


Route::middleware('verificar.superadmin')->group(function() {
    Route::get('superadmin', [SuperadminController::class, 'index'])->name('superadmin.index');
    Route::get('superadmin/gestionar-usuarios', [SuperadminController::class, 'listarUsuarios'])->name('superadmin.gestionar.usuarios');
    Route::post('superadmin/gestionar-usuarios', [SuperadminController::class, 'guardarAdmin'])->name('superadmin.registrar.admin');
});
