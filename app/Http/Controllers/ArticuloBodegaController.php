<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticuloBodegaController extends Controller
{
    public function index()
    {
        return view('articulosBodega.index');
    }
}
