<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\PracticaController;
use App\Http\Controllers\EstudianteController;

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
Route::get('/cambiar-estado-tutor-sp', [PracticaController::class, 'cambiar_estado_tutor_sp']);

Route::get('/estudiantes-no-asignados', [PracticaController::class, 'listar_estudiantes_no_asignados']);
Route::get('/convenios-vigentes', [PracticaController::class, 'listar_convenios_vigentes']);
Route::get('/tutores-por-convenio', [PracticaController::class, 'tutores_sp_por_convenio']);
Route::post('/asignar-practica', [PracticaController::class, 'asignar_practica']);
Route::get('/listar-asignaciones', [PracticaController::class, 'listar_asignaciones']);
Route::get('/eliminar-asignacion', [PracticaController::class, 'eliminar_asignacion']);

Route::get('/verificar-asignacion', [PracticaController::class, 'verificar_asignacion']);
Route::post('/registrar-practica', [PracticaController::class, 'registrar_practica']);
Route::get('/verificar-registro', [PracticaController::class, 'verificar_registro']);
Route::post('/editar-practica', [PracticaController::class, 'editar_practica']);

Route::get('/consultar-estudiante', [EstudianteController::class, 'consultar_estudiante']);
Route::post('/guardar-sociodemografico', [EstudianteController::class, 'guardar_sociodemografico']);
Route::get('/consultar-socio', [EstudianteController::class, 'consultar_socio']);


Route::get('/verificar-paso-personalidad', [EstudianteController::class, 'verificar_paso_personalidad']);
Route::post('/guardar-respuesta-personalidad', [EstudianteController::class, 'guardar_respuesta_personalidad']);
Route::get('/calificar-personalidad', [EstudianteController::class, 'calificar_personalidad']);
Route::get('/detalle-personalidad', [EstudianteController::class, 'detalle_personalidad']);
Route::get('/listar-estudiantes-personalidad', [EstudianteController::class, 'listar_estudiantes_personalidad']);

Route::get('/tutor/mis-asignaciones', [PracticaController::class, 'mis_asignaciones']);
Route::post('/registrar-observacion', [PracticaController::class, 'registrar_observacion']);
Route::get('/tutor/mis-observaciones', [PracticaController::class, 'mis_observaciones_tutor']);
Route::get('/estudiante/mis-observaciones', [PracticaController::class, 'mis_observaciones_estudiante']);