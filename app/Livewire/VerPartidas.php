<?php

namespace App\Livewire;

use App\Models\Partida;
use App\Models\ProductosNuevo;
use Livewire\Component;

class VerPartidas extends Component
{
    public function render()
    {
        $partidas = Partida::paginate(20);
        $productosNuevos = ProductosNuevo::all();

        return view('livewire.ver-partidas', [
            'partidas' => $partidas,
            'productosNuevos' => $productosNuevos
        ]);
    }
}
