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
Route::get('/contacto', [App\Http\Controllers\SitioController::class, 'contacto'])->name('contacto');
Route::get('/contacto-exito', [App\Http\Controllers\SitioController::class, 'contactoExito'])->name('contactoExito');

// El registro publico queda cerrado a proposito: los usuarios del panel se crean
// desde /users. Tenerlo abierto fue parte de la via de entrada del hackeo.
Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Unica ruta del CRUD que sigue siendo publica: la usa el formulario de contacto
// del sitio (resources/views/sitio/contacto.blade.php).
Route::post('contactos', [App\Http\Controllers\ContactosController::class, 'store'])->name('contactos.store');

// Todo el panel de administracion exige sesion iniciada.
Route::middleware('auth')->group(function () {

    Route::resource('users', App\Http\Controllers\UserController::class);

    Route::resource('configuraciones', App\Http\Controllers\ConfiguracionesController::class);

    Route::resource('categorias', App\Http\Controllers\CategoriasController::class);

    Route::resource('proyectosPortal', App\Http\Controllers\ProyectosController::class);

    Route::resource('tiposProyectos', App\Http\Controllers\TiposProyectosController::class);

    Route::resource('contactos', App\Http\Controllers\ContactosController::class)->except(['store']);

});
