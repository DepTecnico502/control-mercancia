<?php

namespace App\Livewire;

use App\Models\Rol;
use App\Models\User;
use Livewire\Component;

class CrearUsuario extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $rol_id;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6|confirmed',
        'rol_id' => 'required',
    ];

    public function crearUsuario()
    {
        $datos = $this->validate();

        // Crea los registros
        User::create([
            'name' => $datos['name'],
            'email' => $datos['email'],
            'password' => $datos['password'],
            'rol_id' => $datos['rol_id']
        ]);

        // Crear un mensaje
        session()->flash('mensaje', 'Usuario creado correctamente.');

        // Redireccionar al usuario
        return redirect()->route('usuario.create');
    }

    public function render()
    {
        $roles = Rol::all();

        return view('livewire.crear-usuario', [
            'roles' => $roles
        ]);
    }
}
