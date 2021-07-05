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

Route::view('/','welcome');
Route::view('/registro', 'registro')->name('registro');
Route::view('/home','home')->name('home');

Route::get('/usuarios',[Usuarios::class,'userList'])->name('userList');

Route::post('/registro/gUser',[Usuarios::class,'gUser'])->name('registro.user');

Route::post('/',[Usuarios::class,'authLog'])->name('loging');

Route::post('/logout',[Usuarios::class,'logout'])->name('logout');

Route::get('/usuarios/edit/{id}',[Usuarios::class,'userEdit'])->name('userEdit');

Route::put('/usuarios/update/{user}',[Usuarios::class,'userUpdate'])->name('userUpdate');

Route::post('/usuarios/updatepassword',[Usuarios::class,'userUpdatePassword'])->name('userUpdatepass');

Route::get('/usuarios/userdelete/{id}', [Usuarios::class,'userDelete'])->name('userDelete');

Route::get('/usuarios/useractive/{id}', [Usuarios::class,'userActive'])->name('userActive');

?>