<?php

namespace App\Http\Controllers;

use App\Models\Mercancia;
use Illuminate\Http\Request;

class FormPartidaController extends Controller
{
    public function index(Mercancia $mercancia)
    {
        return view('formularios.partida.index', [
            'mercancia' => $mercancia
        ]);
    }
}
