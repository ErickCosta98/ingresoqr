<?php

use App\Http\Controllers\Alumnos;
use App\Http\Controllers\gruposController;
use App\Http\Controllers\ingresoController;
use App\Http\Controllers\Usuarios;
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

Route::view('/','qrscan')->name('qrscan');
Route::view('/login','welcome')->name('welcome');

Route::view('/inicio','home')->name('homes')->middleware('can:home');

Route::post('/login',[Usuarios::class,'authLog'])->name('loging');

Route::post('/logout',[Usuarios::class,'logout'])->name('logout')->middleware('auth');

Route::get('/usuarios',[Usuarios::class,'userList'])->name('userList')->middleware('can:userAdmin');

Route::get('/usuarios/registro',[Usuarios::class,'userRegistro'])->name('userRegistro')->middleware('can:userAdmin');

Route::post('/usuarios/guardar',[Usuarios::class,'gUser'])->name('userSave')->middleware('can:userAdmin');

Route::get('/usuarios/edit/{id}',[Usuarios::class,'userEdit'])->name('userEdit')->middleware('can:userAdmin');

Route::put('/usuarios/update/{user}',[Usuarios::class,'userUpdate'])->name('userUpdate')->middleware('can:userAdmin');

Route::post('/usuarios/updatepassword',[Usuarios::class,'userUpdatePassword'])->name('userUpdatepass')->middleware('can:userAdmin');

Route::get('/usuarios/userdelete/{id}', [Usuarios::class,'userDelete'])->name('userDelete')->middleware('can:userAdmin');

Route::get('/usuarios/useractive/{id}', [Usuarios::class,'userActive'])->name('userActive')->middleware('can:userAdmin');
Route::get('/usuarios/rolespermisos', [Usuarios::class,'rolespermisos'])->name('rolespermisos')->middleware('can:userAdmin');

Route::post('/usuarios/rolespermisos/nuevoRol',[Usuarios::class,'crearRol'])->name('nuevoRol')->middleware('can:userAdmin');
// Route::post('/usuarios/rolespermisos/nuevoPermiso',[Usuarios::class,'crearPermiso'])->name('nuevoPermiso')->middleware('auth');
Route::get('/usuarios/rolespermisos/editRol/{id}',[Usuarios::class,'editRol'])->name('editRol')->middleware('can:userAdmin');

Route::post('/usuarios/rolespermisos/updateRol',[Usuarios::class,'updateRol'])->name('updateRol')->middleware('can:userAdmin');

Route::get('/alumnos',[Alumnos::class,'listAlumnos'])->name('alumnoList')->middleware('can:alumnoRegistro');

Route::view('/alumnos/nuevo', 'alumnos.registro')->name('regisAlumno')->middleware('can:alumnoRegistro');

Route::post('/alumnos/save', [Alumnos::class,'save'])->name('alumnoSave')->middleware('can:alumnoRegistro');

Route::get('/alumno/edit/{id}', [Alumnos::class,'dtUpdate'])->name('alumnoEdit')->middleware('can:alumnoRegistro');
Route::get('/alumno/delete/{id}', [Alumnos::class,'delete'])->name('alumnoDelete')->middleware('can:alumnoRegistro');
Route::put('/alumnoss/update/{alumno}',[Alumnos::class,'update'])->name('alumnoUpdate')->middleware('can:alumnoRegistro');

Route::get('/grupo',[gruposController::class,'listGrupos'])->name('grupoList')->middleware('can:horariosAdmin');

Route::view('/grupo/registro', 'grupos.registro')->name('frmRegistro')->middleware('can:horariosAdmin');

Route::post('/grupo/guardar', [gruposController::class,'guardar'])->name('grupoG')->middleware('can:horariosAdmin');
Route::get('/grupo/delete/{id}', [gruposController::class,'delete'])->name('grupoDelete')->middleware('can:horariosAdmin');
Route::get('/grupo/edit/{id}', [gruposController::class,'dtUpdate'])->name('grupoEdit')->middleware('can:horariosAdmin');
Route::put('/grupo/update/{grupo}',[gruposController::class,'update'])->name('grupoUpdate')->middleware('can:horariosAdmin');

Route::get('/verifica',[ingresoController::class,'verificarDia'])->name('verifica');
Route::view('/reporte', 'reportes')->name('reporte')->middleware('can:alumnoReporte');

?>