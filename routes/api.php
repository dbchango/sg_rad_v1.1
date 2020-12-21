<?php

use App\Http\Controllers\MateriaController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\MockObject\Builder\Match;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//Rutas de peticiones

//Registro de actividades

Route::post('list/registroactividades', 'RegistroactividadController@list');
Route::resource('registrosactividades', 'RegistroActividadController');
Route::post('registroporrango', 'RegistroActividadController@rango');
Route::post('registroporrangoprof', 'RegistroActividadController@rangoprof');

//Actividades
Route::resource('actividades', 'ActividadController');
Route::post('list/actividades', 'ActividadController@list');
Route::get('editaractividad/{id}', 'ActividadController@edit');
Route::get('actividadestact/{tipo}', 'ActividadController@index');
Route::get('actividades', 'ActividadController@listall');
//Areas
Route::resource('areas', 'AreaController');
Route::post('list/areas', 'AreaController@list');

//Autoevaluaciones
Route::resource('autoevaluaciones', 'AutoevaluacionController');
Route::post('list/autoevaluaciones', 'AutoevaluacionController@list');

//Calificaciones autoevaluaciones
Route::resource('calificacionesautoevaluaciones', 'CalificacionAutoevaluacionController');
Route::post('list/calificacionesautoevaluaciones', 'CalificacionAutoevaluacionController@list');

//Calificaciones coevaluaciones
Route::resource('calificacionescoevaluaciones', 'CalificacionCoevaluacionController');
Route::post('list/calificacionescoevaluaciones', 'CalificacionCoevaluacionController@list');

//Calificaciones eadministrativas
Route::resource('calificacioneseadministrativas', 'CalificacionEadministrativaController');
Route::post('list/calificacioneseadministrativas', 'CalificacionEadministrativaController@list');

//Coevaluaciones
Route::resource('coevaluaciones', 'CoevaluacionController');
Route::post('list/coevaluaciones', 'CoevaluacionController@list');

//Dedicaciones
Route::resource('dedicaciones', 'DedicacionController');
Route::post('list/dedicaciones', 'DedicacionController@list');

//Departamentos
Route::resource('departamentos', 'DepartamentoController');
Route::post('list/departamentos', 'DepartamentoController@list');

//Dias
Route::resource('dias', 'DiaController');
Route::post('list/dias', 'DiaController@list');

//Eadministrativas
Route::resource('eadministrativas', 'EadministrativaController');
Route::post('list/eadministrativas', 'EadministrativaController@list');

//Empresa
Route::resource('empresas', 'EmpresaController');
Route::post('list/empresas', 'EmpresaController@list');

//Horarios
Route::resource('horarios', 'HorarioController');
Route::post('list/horarios', 'HorarioController@list');

//Materias
Route::resource('materias', 'MateriaController');
Route::get('materias', 'MateriaController@index');
Route::post('list/materias', 'MateriaController@list');

//Periodos
Route::resource('periodos', 'PeriodoController');
Route::post('list/periodos', 'PeriodoController@list');

//Preguntas Autoevaluaciones
Route::resource('preguntasautoevaluaciones', 'PreguntaAutoevaluacionController');
Route::post('list/preguntasautoevaluaciones', 'PreguntaAutoevaluacionController@list');

//Preguntas Coevaluaciones
Route::resource('preguntascoevalauciones', 'PreguntaCoevaluacionController');
Route::post('list/preguntascoevalauciones', 'PreguntaCoevaluacionController@list');

//Preguntas Eadministrativas
Route::resource('preguntaseadministrativas', 'PreguntaEadministrativaController');
Route::post('list/preguntaseadministrativas', 'PreguntaEadministrativaController@list');

//Profesores
Route::resource('profesores', 'ProfesorController');
Route::post('list/profesores', 'ProfesorController@list');

//Recuperaciones
Route::resource('recuperaciones', 'RecuperacionController');
Route::post('list/recuperaciones', 'RecuperacionController@list');

//Resumen Evaluacion
Route::resource('resumenevaluaciones', 'ResumenEvaluacionController');

//Tareas
Route::resource('tareas', 'TareaController');
Route::get('tareastact/{actividad}', 'TareaController@index');
Route::post('list/tareas', 'TareaController@list');
Route::get('actividadestact/{tipo}', 'ActividadController@index');

//Tipos Actividades
Route::resource('tiposactividades', 'TipoActividadController');
Route::post('list/tiposactividades', 'TipoActividadController@list');

//CrugeUser
Route::resource('crugeusers', 'CrugeUserController');
Route::post('list/crugeusers', 'CrugeUserController@list');

//Roles
Route::resource('roles', 'RoleController');
Route::post('list/roles', 'RoleController@list');
//Route::put('roles/update/{id}', 'RoleController@edit');
    Route::delete('roles/delete/{id}', 'RoleController@destroy');
    //Delete rol permissions
    Route::delete('roles/{role_id}/{permission_id}', 'RoleController@deletePermiision');
    //Assign permissions to roles
    Route::post('roles/givepermission/{role_id}/{permission_id}', 'RoleController@givePermission');
    Route::post('list/roles', 'RoleController@list');

//Permissions
Route::resource('permissions', 'PermissionController');
Route::post('list/permissions', 'PermissionController@list');



//Users
Route::post('list/users', 'UserController@list');
Route::resource('users', 'UserController');
Route::post('users/givepermission/{user_id}/{permission_id}', 'UserController@givePermission');
Route::post('users/giverole/{user_id}/{role_id}', 'UserController@giveRole');
Route::delete('users/revokepermission/{user_id}/{permission_id}', 'UserController@deletePermiision');
Route::delete('users/removerole/{user_id}/{role_id}', 'UserController@removeRole');
Route::get('users/searchprofesor/{user_id}', 'UserController@getProfesorInfo');
Route::post('login', 'UserController@login');
