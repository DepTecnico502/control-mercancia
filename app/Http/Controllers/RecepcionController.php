<?php

namespace App\Http\Controllers;

use App\Models\Mercancia;
use Illuminate\Http\Request;

class RecepcionController extends Controller
{
    public function index()
    {
        return view('recepciones.index');
    }

    public function edit(Mercancia $mercancia)
    {
        return view('recepciones.edit', [
            'mercancia' => $mercancia
        ]);
    }
}
