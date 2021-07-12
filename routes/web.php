<?php

use App\Http\Controllers\Alumnos;
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

Route::view('/','welcome')->name('welcome');

Route::post('/',[Usuarios::class,'authLog'])->name('loging');

Route::view('/home','home')->name('home')->middleware('auth')->middleware('can:home');

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

Route::get('/alumnos',[Alumnos::class,'listAlumnos'])->name('alumnoList')->middleware('auth');

Route::view('/alumnos/nuevo', 'alumnos.registro')->name('regisAlumno');

Route::post('/alumnos/save', [Alumnos::class,'save'])->name('alumnoSave');

Route::get('/alumno/edit/{id}', [Alumnos::class,'dtUpdate'])->name('alumnoEdit');
Route::get('/alumno/delete/{id}', [Alumnos::class,'delete'])->name('alumnoDelete');
Route::put('/alumnoss/update/{alumno}',[Alumnos::class,'update'])->name('alumnoUpdate');



?>