<?php

namespace App\Livewire;

use Livewire\Component;

class FiltrarPartidas extends Component
{
    public $termino;

    public function leerDatosFormulario()
    {
        $this->dispatch('terminosBusqueda', $this->termino);
    }
    
    public function render()
    {
        return view('livewire.filtrar-partidas');
    }
}
