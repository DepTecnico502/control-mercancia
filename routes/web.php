<?php

use App\Http\Controllers\FormMercanciaController;
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

// Route::get('/', function () {
//     return view('formularios.mercancia.index');
// });


Route::get('/mercancia', [FormMercanciaController::class, 'index'])->name('mercancia.index');