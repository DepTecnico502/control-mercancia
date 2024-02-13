<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Models\User;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = User::paginate(10);

        return view('usuarios.index', [
            'usuarios' => $usuarios
        ]);
    }

    public function create()
    {
        return view('usuarios.crear');
    }

    public function edit(User $user)
    {
        return view('usuarios.editar', [
            'user' => $user
        ]);
    }
}
