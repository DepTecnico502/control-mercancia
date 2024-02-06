<?php

namespace App\Livewire;

use App\Models\Mercancia;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Livewire\Component;

class VerRecepcion extends Component
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
        $mercancias = Mercancia::when($this->termino, function($query) {
            $query->where('no_guia', 'LIKE', "%" . $this->termino . "%");
        })
        ->when($this->termino, function($query) {
            $query->orWhere('no_pedido', 'LIKE', "%" . $this->termino . "%");
        })
        ->paginate(20);

        return view('livewire.ver-recepcion', [
            'mercancias' => $mercancias,
        ]);
    }
}
