<?php

use Illuminate\Support\Facades\Route;

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

Route::get('registrar', [AutenticationController::class, 'registrar'])->name('registrar.formulario')->middleware('verificar.sesion');
Route::post('registrar', [AutenticationController::class, 'guardarRegistro'])->name('auth.registrar');

Route::get('salir', [AutenticationController::class, 'cerrarSesion'])->name('auth.cerrar');

Route::get('registrar', function () {
    return view('auth/registrar');
});
