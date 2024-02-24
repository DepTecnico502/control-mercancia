<?php

namespace App\Livewire;

use App\Models\ListadoPrecio;
use Livewire\Component;
use Livewire\WithPagination;

class VerListadoPrecios extends Component
{
    use WithPagination;

    public function render()
    {
        $listadoPrecios = ListadoPrecio::paginate(10);

        return view('livewire.ver-listado-precios', [
            'listadoPrecios' => $listadoPrecios
        ]);
    }
}
