<?php

namespace App\Livewire;

use App\Models\Mercancia;
use App\Models\Proveedor;
use App\Models\Recibido;
use App\Models\Transporte;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class CrearMercancia extends Component
{
    public $transporte_id;
    public $no_guia;
    public $bultos;
    public $monto;
    public $proveedor_id;
    public $recibido_id;
    public $no_pedido;
    public $imagen_doc;

    use WithFileUploads;

    protected $rules = [
        'transporte_id' => 'required',
        'no_guia' => 'required',
        'bultos' => 'required',
        'monto' => 'nullable',
        'proveedor_id' => 'required',
        'recibido_id' => 'required',
        'no_pedido' => 'required',
        'imagen_doc' => 'nullable|image|max:2024',
    ];

    public function crearMercancia()
    {
        $datos = $this->validate();

        //Almacenar la imagen 
        if($this->imagen_doc){
            $imagen_doc = $this->imagen_doc->store('public/fotos/mercancia');
            $datos['imagen_doc'] = str_replace('public/fotos/mercancia/', '', $imagen_doc);
        }

        //Crear la entrada de mercancia
        Mercancia::create([
            'transporte_id' => $datos['transporte_id'],
            'no_guia' => $datos['no_guia'],
            'bultos' => $datos['bultos'],
            'monto' => $datos['monto'],
            'proveedor_id' => $datos['proveedor_id'],
            'recibido_id' => $datos['recibido_id'],
            'no_pedido' => $datos['no_pedido'],
            'imagen_doc' => $datos['imagen_doc'] ?? null,
        ]);

        //Crear un mensaje
        session()->flash('mensaje', 'La entrada de mercancia se guardo correctamente.');

        //Redireccionar al usuario
        return redirect()->route('recepcion.create');
    }

    public function render()
    {
        //Consultar BD
        $proveedores = Proveedor::all();
        $transportes = Transporte::all();
        $recibidos = Recibido::all();
        
        return view('livewire.crear-mercancia', [
            'proveedores' => $proveedores,
            'transportes' => $transportes,
            'recibidos' => $recibidos,
        ]);
    }
}
