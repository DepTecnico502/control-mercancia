<?php

use App\Http\Controllers\FormMercanciaController;
use App\Http\Controllers\FormPartidaController;
use App\Http\Controllers\RecepcionController;
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

// Route::get('/', function () {
//     return view('formularios.mercancia.index');
// });

// Mercancias
Route::get('/formulario/mercancia', [FormMercanciaController::class, 'index'])->name('mercancia.index');
Route::get('/recepcion', [RecepcionController::class, 'index'])->name('partida.index');

// Partidas