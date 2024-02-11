<?php

namespace App\Livewire;

use App\Models\Mercancia;
use App\Models\Partida;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class CrearPartida extends Component
{
    public $mercancia;
    public $no_partida;
    public $url_imagen;
    public $comentario;
    
    use WithFileUploads;

    protected $rules = [
        'no_partida' => 'required',
        'url_imagen' => 'nullable|image|max:2024',
        'comentario' => 'nullable|string|max:255'
    ];

    public function mount()
    {
        $this->mercancia = request()->route('mercancia');
    }

    public function crearPartida()
    {
        $datos = $this->validate();

        // Almacenar la imagen 
        if($this->url_imagen !=null){
            $url_imagen = $this->url_imagen->store('public/fotos/partida');
            $datos['url_imagen'] = str_replace('public/fotos/partida/', '', $url_imagen);
        }

        // Crear partida
        Partida::create([
            'mercancia_id' => $this->mercancia->id,
            'no_partida' => $datos['no_partida'],
            'url_imagen' => $datos['url_imagen'] ?? null,
            'comentario' => $datos['comentario']
        ]);

        // Crear un mensaje
        session()->flash('mensaje', 'La partida se guardo correctamente.');

        // Redireccionar al usuario
        return redirect()->route('partida.create', $this->mercancia->id);
    }
    
    public function render()
    {
        return view('livewire.crear-partida');
    }
}
