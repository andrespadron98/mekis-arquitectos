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

Route::get('/', [App\Http\Controllers\SitioController::class, 'index'])->name('index');
Route::get('/proyectos', [App\Http\Controllers\SitioController::class, 'proyectos'])->name('proyecto');
Route::get('/proyectos/{idProyecto}', [App\Http\Controllers\SitioController::class, 'verProyecto'])->name('proyectos');
Route::get('/construcciones', [App\Http\Controllers\SitioController::class, 'construcciones'])->name('construcciones');
Route::get('/nosotros', [App\Http\Controllers\SitioController::class, 'nosotros'])->name('nosotros');
Route::get('/inspiracion', [App\Http\Controllers\SitioController::class, 'inspiracion'])->name('inspiracion');
Route::get('/prensa', [App\Http\Controllers\SitioController::class, 'prensa'])->name('prensa');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('users', App\Http\Controllers\UserController::class)->middleware('auth');




Route::resource('configuraciones', App\Http\Controllers\ConfiguracionesController::class);

Route::resource('categorias', App\Http\Controllers\CategoriasController::class);

Route::resource('proyectosPortal', App\Http\Controllers\ProyectosController::class);