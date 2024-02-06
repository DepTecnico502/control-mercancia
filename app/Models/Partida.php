<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partida extends Model
{
    use HasFactory;

    protected $table = 'form_partidas';

    // Uno a Uno
    
    public function mercancia()
    {
        return $this->belongsTo(Mercancia::class);
    }

    // Uno a muchos

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
}
