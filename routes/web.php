<?php

use App\Http\Controllers\CheckController;
use App\Http\Controllers\FormMercanciaController;
use App\Http\Controllers\FormPartidaController;
use App\Http\Controllers\PartidaController;
use App\Http\Controllers\ProductosNuevoController;
use App\Http\Controllers\RecepcionController;
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

Route::get('/', function () {
    return 'DASHBOARD...';
});

// Mercancias
Route::get('/formulario/mercancia', [FormMercanciaController::class, 'index'])->name('recepcion.create');
Route::get('/recepciones', [RecepcionController::class, 'index'])->name('recepcion.index');

// Partidas
Route::get('/formulario/partida/{mercancia}', [FormPartidaController::class, 'index'])->name('partida.create');
Route::get('/partidas', [PartidaController::class, 'index'])->name('partida.index');

// Checks
Route::get('/partida/producto-nuevo/{partida}', [CheckController::class, 'checkProductoNuevo'])->name('check.producto.nuevo');

Route::get('/partida/valorizado/{partida}', [CheckController::class, 'checkValorizado'])->name('check.valorizado');

Route::get('/partida/liberado/{partida}', [CheckController::class, 'checkLiberado'])->name('check.liberado');

Route::get('/partida/colocado/{partida}', [CheckController::class, 'checkColocado'])->name('check.colocado');

// Enlace simbolico
// Route::get('storage-link', function(){
//     Artisan::call('storage:link');
// });