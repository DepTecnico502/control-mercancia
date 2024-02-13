<?php

namespace App\Livewire;

use App\Models\Rol;
use App\Models\User;
use Livewire\Component;

class EditarUsuario extends Component
{
    public $user_id;
    public $name;
    public $email;
    public $rol_id;

    protected function rules()
    {
        return [
            'name' => 'required',
            'email' => ['required', 'email', 'unique:users,email,' . $this->user_id],
            'rol_id' => 'required',
        ];
    }

    public function mount(User $user)
    {
        $this->user_id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->rol_id = $user->rol_id;
    }

    public function editarUsuario()
    {
        $datos = $this->validate();

        // Encontrar el usuario a editar
        $usuario = User::find($this->user_id);

        // Asignar los valores
        $usuario->name = $datos['name'];
        $usuario->rol_id = $datos['rol_id'];
        $usuario->email = $datos['email'];

        // Guardar
        $usuario->save();

        // Redireccionar
        session()->flash('mensaje', 'El usuario se actualizo correctamete.');

        return redirect()->route('usuarios.index');
    }

    public function render()
    {
        $roles = Rol::all();

        return view('livewire.editar-usuario', [
            'roles' => $roles
        ]);
    }
}
