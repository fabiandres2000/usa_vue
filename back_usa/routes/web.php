<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\PracticaController;

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

Route::get('/listar', [UsuarioController::class, 'listar']);
Route::post('/login', [UsuarioController::class, 'login']);
Route::post('/registro-usuario', [UsuarioController::class, 'registro_usuario']);
Route::post('/recuperar-password', [UsuarioController::class, 'recuperar_password']);
Route::post('/asignar-permiso', [UsuarioController::class, 'asignar_permiso']);
Route::get('/convenios', [PracticaController::class, 'listar_convenios']);
Route::post('/registrar-convenio', [PracticaController::class, 'registrar_convenio']);
Route::post('/editar-convenio', [PracticaController::class, 'editar_convenio']);
Route::get('/eliminar-convenio', [PracticaController::class, 'eliminar_convenio']);