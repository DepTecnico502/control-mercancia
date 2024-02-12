<?php

use App\Http\Controllers\CheckController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormMercanciaController;
use App\Http\Controllers\FormPartidaController;
use App\Http\Controllers\PartidaController;
use App\Http\Controllers\ProductosNuevoController;
use App\Http\Controllers\RecepcionController;
use App\Http\Controllers\SessionsController;
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

// Auth
Route::get('/login', [SessionsController::class, 'create'])->middleware('guest')->name('login.index');
Route::post('/login', [SessionsController::class, 'store'])->name('login.store');
Route::get('/logout', [SessionsController::class, 'destroy'])->middleware('auth')->name('login.destroy');

// Enlace simbolico
// Route::get('storage-link', function(){
//     Artisan::call('storage:link');
// });