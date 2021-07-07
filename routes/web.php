<?php

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

Route::view('/home','home')->name('home')->middleware('auth');

Route::post('/',[Usuarios::class,'authLog'])->name('loging');

Route::post('/logout',[Usuarios::class,'logout'])->name('logout')->middleware('auth');

Route::get('/usuarios',[Usuarios::class,'userList'])->name('userList')->middleware('auth');

Route::get('/usuarios/registro',[Usuarios::class,'userRegistro'])->name('userRegistro')->middleware('auth');

Route::post('/usuarios/guardar',[Usuarios::class,'gUser'])->name('userSave')->middleware('auth');

Route::get('/usuarios/edit/{id}',[Usuarios::class,'userEdit'])->name('userEdit')->middleware('auth');

Route::put('/usuarios/update/{user}',[Usuarios::class,'userUpdate'])->name('userUpdate')->middleware('auth');

Route::post('/usuarios/updatepassword',[Usuarios::class,'userUpdatePassword'])->name('userUpdatepass')->middleware('auth');

Route::get('/usuarios/userdelete/{id}', [Usuarios::class,'userDelete'])->name('userDelete')->middleware('auth');

Route::get('/usuarios/useractive/{id}', [Usuarios::class,'userActive'])->name('userActive')->middleware('auth');

Route::post('/usuarios',[Usuarios::class,'busqueda'])->name('userSearch')->middleware('auth');
Route::get('/usuarios/rolespermisos', [Usuarios::class,'rolespermisos'])->name('rolespermisos')->middleware('auth');

Route::post('/usuarios/rolespermisos/nuevoRol',[Usuarios::class,'crearRol'])->name('nuevoRol')->middleware('auth');
// Route::post('/usuarios/rolespermisos/nuevoPermiso',[Usuarios::class,'crearPermiso'])->name('nuevoPermiso')->middleware('auth');
Route::get('/usuarios/rolespermisos/editRol/{id}',[Usuarios::class,'editRol'])->name('editRol')->middleware('auth');
Route::post('/usuarios/rolespermisos/updateRol',[Usuarios::class,'updateRol'])->name('updateRol')->middleware('auth');


?>