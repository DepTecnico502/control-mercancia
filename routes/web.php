<?php

use App\Http\Controllers\ArticuloBodegaController;
use App\Http\Controllers\CheckController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormMercanciaController;
use App\Http\Controllers\FormPartidaController;
use App\Http\Controllers\ListadoPrecioController;
use App\Http\Controllers\PartidaController;
use App\Http\Controllers\ProductosNuevoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\RecepcionController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\TransporteController;
use App\Http\Controllers\UsuarioController;
use App\Models\ListadoPrecio;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Dashboard

Route::get('/', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard.index');

// Mercancias
Route::get('/formulario/mercancia', [FormMercanciaController::class, 'index'])->name('recepcion.create');
Route::get('/recepciones', [RecepcionController::class, 'index'])->middleware('auth.admin')->name('recepcion.index');

// Partidas
Route::get('/formulario/partida/{mercancia}', [FormPartidaController::class, 'index'])->middleware('auth.admin')->name('partida.create');
Route::get('/partidas', [PartidaController::class, 'index'])->middleware('auth.admin')->name('partida.index');

// Checks
Route::get('/partida/producto-nuevo/{partida}', [CheckController::class, 'checkProductoNuevo'])->middleware('auth.admin')->name('check.producto.nuevo');

Route::get('/partida/valorizado/{partida}', [CheckController::class, 'checkValorizado'])->middleware('auth.admin')->name('check.valorizado');

Route::get('/partida/liberado/{partida}', [CheckController::class, 'checkLiberado'])->middleware('auth.admin')->name('check.liberado');

Route::get('/partida/colocado/{partida}', [CheckController::class, 'checkColocado'])->middleware('auth.admin')->name('check.colocado');

// Proveedores
Route::get('/proveedores', [ProveedorController::class, 'index'])->middleware('auth.admin')->name('proveedores.index');

Route::get('/proveedores/crear', [ProveedorController::class, 'crear'])->middleware('auth.admin')->name('proveedores.crear');

Route::post('/proveedores/importar', [ProveedorController::class,'import'])->middleware('auth.admin')->name('proveedores.importar');

// Trasnportes
Route::get('/transportes', [TransporteController::class, 'index'])->middleware('auth.admin')->name('transportes.index');

Route::get('/transportes/crear', [TransporteController::class, 'crear'])->middleware('auth.admin')->name('transportes.crear');

Route::post('/transportes/importar', [TransporteController::class,'import'])->middleware('auth.admin')->name('transportes.importar');

// Articulos en bodega
Route::get('/articulos-bodega', [ArticuloBodegaController::class, 'index'])->middleware('auth.admin')->name('articulos.bodega.index');

// Listado de precios
Route::get('/listado-de-precios', [ListadoPrecioController::class, 'index'])->middleware('auth.admin')->name('listado.index');

Route::get('/listado-de-precios/crear', [ListadoPrecioController::class, 'crear'])->middleware('auth.admin')->name('listado.crear');

Route::post('/listado-de-precios/importar', [ListadoPrecioController::class,'import'])->middleware('auth.admin')->name('listado.importar');

// Usuarios
Route::get('/usuarios', [UsuarioController::class, 'index'])->middleware('auth.admin')->name('usuarios.index');
Route::get('/usuarios/crear', [UsuarioController::class, 'create'])->middleware('auth.admin')->name('usuario.create');
Route::get('/usuario/editar/{user}', [UsuarioController::class, 'edit'])->middleware('auth.admin')->name('usuario.edit');

// Auth
Route::get('/login', [SessionsController::class, 'create'])->middleware('guest')->name('login.index');
Route::post('/login', [SessionsController::class, 'store'])->name('login.store');
Route::get('/logout', [SessionsController::class, 'destroy'])->middleware('auth')->name('login.destroy');

// Enlace simbolico
// Route::get('storage-link', function(){
//     Artisan::call('storage:link');
// });