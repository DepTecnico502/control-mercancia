<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormMercanciaController extends Controller
{
    public function index()
    {
        return view('formularios.mercancia.index');
    }
}
