<?php

namespace App\Livewire;

use App\Models\Transporte;
use Livewire\Component;

class VerTransportes extends Component
{
    public function render()
    {
        $transportes = Transporte::paginate(20);

        return view('livewire.ver-transportes', [
            'transportes' => $transportes
        ]);
    }
}
