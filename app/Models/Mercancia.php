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
        'recibido',
        'no_pedido',
        'imagen_doc'
    ];
    
    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }

    public function transporte()
    {
        return $this->belongsTo(Transporte::class);
    }
}
