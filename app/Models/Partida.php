<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partida extends Model
{
    use HasFactory;

    protected $table = 'form_partidas';

    protected $fillable = [
        'mercancia_id',
        'no_partida',
        'url_imagen',
        'comentario',
        'fecha_producto_nuevo',
        'fecha_valorizado',
        'fecha_liberado',
        'fecha_colocado',
    ];

    // Uno a Uno
    public function mercancia()
    {
        return $this->belongsTo(Mercancia::class);
    }

    // Uno a muchos
}
