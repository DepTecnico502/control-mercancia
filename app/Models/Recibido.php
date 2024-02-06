<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recibido extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'recibido',
        'estado'
    ];

    public function mercancia()
    {
        return $this->hasMany(Mercancia::class);
    }
}
