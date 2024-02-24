<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListadoPrecio extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'descripcion',
        'existencias',
        'codigo_barras',
        'grupo_articulos',
        'fabricante',
        'unidad_de_medida',
        'ultimo_precio_compra',
        'ultimo_precio_entrada_mercancia',
        'inusual',
        'frecuente',
        'mayorista',
        'socio'
    ];
}
