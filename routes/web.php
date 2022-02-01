<?php

use App\Http\Controllers\AvisosUsuarioController;
use App\Http\Controllers\CerrarSesionController;
use App\Http\Controllers\IngresoController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\MascotasEncontradasController;
use App\Http\Controllers\MascotasPendientesController;
use App\Http\Controllers\MascotasPerdidasController;
use App\Http\Controllers\PublicarAvisoController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\UsuarioController;
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


Route::resource("inicio", InicioController::class)->only("index");

Route::resource("inicio/mascotas_perdidas", MascotasPerdidasController::class);

Route::resource("inicio/mascotas_encontradas", MascotasEncontradasController::class);

Route::resource("inicio/publicar_aviso", PublicarAvisoController::class);

Route::resource("inicio/registro", RegistroController::class)->only("create", "store");

Route::resource("inicio/ingreso", IngresoController::class)->only("index", "store");

Route::get("/inicio/cerrar_sesion", [CerrarSesionController::class, 'cerrar_sesion'])->name("cerrar_sesion");

Route::resource("inicio/mis_datos", UsuarioController::class)->only("edit", "update");

Route::resource("inicio/mis_avisos", AvisosUsuarioController::class)->only("index", "destroy", "show");

Route::resource("inicio/mascotas_pendientes", MascotasPendientesController::class)->only("index", "show", "update");


