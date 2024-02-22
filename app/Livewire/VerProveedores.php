<?php

namespace App\Livewire;

use App\Models\Proveedor;
use Livewire\Component;
use Livewire\WithPagination;

class VerProveedores extends Component
{
    use WithPagination;

    public function render()
    {
        $proveedores = Proveedor::paginate(20);

        return view('livewire.ver-proveedores', [
            'proveedores' => $proveedores
        ]);
    }
}
