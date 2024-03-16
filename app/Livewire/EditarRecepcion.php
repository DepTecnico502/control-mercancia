<?php

namespace App\Livewire;

use App\Models\Mercancia;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class EditarRecepcion extends Component
{
    public $mercancia_id;
    public $imagen;
    public $imagen_nueva;

    use WithFileUploads;

    protected $rules = [
        'imagen_nueva' => 'nullable|image',
    ];

    public function mount(Mercancia $mercancia)
    {
        // DATOS ACTUALES
        $this->mercancia_id = $mercancia->id;
        $this->imagen = $mercancia->imagen_doc;
    }

    public function editarMercancia()
    {
        $datos = $this->validate();

        // Si hay una nueva imagen
        if($this->imagen_nueva)
        {
            $imagen = $this->imagen_nueva->store('public/fotos/mercancia');
            $datos['imagen'] = str_replace('public/fotos/mercancia/', '', $imagen);
        }

        //Encontrar la vacante a editar
        $mercancia = Mercancia::find($this->mercancia_id);

        // Asignar los valores
        $mercancia->imagen_doc = $datos['imagen'] ?? $mercancia->imagen_doc;

        // Guardar la vacante
        $mercancia->save();

        // Redireccionar
        session()->flash('mensaje', 'La mercancia se actualizo correctamete.');

        return redirect()->route('recepcion.index');
    }

    public function render()
    {
        return view('livewire.editar-recepcion');
    }
}
