<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class colocado extends Model
{
    use HasFactory;

    public function mercancia()
    {
        // Uno a Uno
        return $this->belongsTo(Mercancia::class);
    }

    public function partida()
    {
        // Uno a Uno
        return $this->belongsTo(Partida::class);
    }
}
