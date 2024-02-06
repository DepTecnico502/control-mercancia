<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mercancia extends Model
{
    use HasFactory;

    protected $table = 'form_mercancia';
    
    protected $fillable = [
        'transporte_id',
        'no_guia',
        'bultos',
        'monto',
        'proveedor_id',
        'recibido_id',
        'no_pedido',
        'imagen_doc'
    ];
    
    public function proveedor()
    {
        // Uno a Uno -- Una mercancia pertenece a un proveedor
        return $this->belongsTo(Proveedor::class);
    }

    public function transporte()
    {
        return $this->belongsTo(Transporte::class);
    }

    public function recibido()
    {
        return $this->belongsTo(Recibido::class);
    }

    // =============== Uno a muchos ============
    
    // Una mercancia puede tener muchos productos

    public function productoNuevo()
    {
        return $this->hasMany(ProductosNuevo::class);
    }

    public function valorizado()
    {
        return $this->hasMany(Valorizado::class);
    }

    public function liberado()
    {
        return $this->hasMany(Liberado::class);
    }

    public function colocado()
    {
        return $this->hasMany(colocado::class);
    }

    public function partida()
    {
        return $this->hasMany(Partida::class);
    }
}
