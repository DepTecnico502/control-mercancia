<?php

namespace App\Livewire;

use App\Models\Partida;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Livewire\Component;

class VerPartidas extends Component
{
    use WithPagination;

    public $termino;

    #[On('terminosBusqueda')]
    public function buscar($termino)
    {
        $this->termino = $termino;
        $this->resetPage();
    }

    public function render()
    {
        $partidas = Partida::where(function($query) {
            $query->whereHas('mercancia', function($query) {
                $query->where('no_pedido', 'LIKE', "%" . $this->termino . "%")
                ->orWhere('no_guia', 'LIKE', "%" . $this->termino . "%")
                ->orWhereHas('proveedor', function($query) {
                    $query->where('proveedor', 'LIKE', "%" . $this->termino . "%");
                });
            })
            ->orWhere('no_partida', 'LIKE', "%" . $this->termino . "%");
        })
        ->paginate(20);

        return view('livewire.ver-partidas', [
            'partidas' => $partidas,
        ]);
    }
}
