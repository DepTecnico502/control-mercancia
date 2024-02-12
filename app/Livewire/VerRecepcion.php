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

        $mercancias = Mercancia::where(function($query) {
            $query->whereHas('proveedor', function($query) {
                $query->where('proveedor', 'LIKE', "%" . $this->termino . "%");
            })
            ->orWhereHas('transporte', function($query) {
                $query->where('transporte', 'LIKE', "%" . $this->termino . "%");
            })
            ->orWhereHas('recibido', function($query) {
                $query->where('recibido', 'LIKE', "%" . $this->termino . "%");
            })
            ->orWhere('no_guia', 'LIKE', "%" . $this->termino . "%")
            ->orWhere('no_pedido', 'LIKE', "%" . $this->termino . "%");
        })
        ->paginate(20);

        return view('livewire.ver-recepcion', [
            'mercancias' => $mercancias,
        ]);
    }
}
