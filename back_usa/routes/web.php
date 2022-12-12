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

Route::get('/tutores-usa', [PracticaController::class, 'listar_tutores_usa']);
Route::post('/registrar-tutor-usa', [PracticaController::class, 'registrar_tutor_usa']);
Route::post('/editar-tutor-usa', [PracticaController::class, 'editar_tutor_usa']);
Route::get('/cambiar-estado-tutor-usa', [PracticaController::class, 'cambiar_estado_tutor_usa']);

Route::get('/tutores-sp', [PracticaController::class, 'listar_tutores_sp']);
Route::post('/registrar-tutor-sp', [PracticaController::class, 'registrar_tutor_sp']);
Route::post('/editar-tutor-sp', [PracticaController::class, 'editar_tutor_sp']);