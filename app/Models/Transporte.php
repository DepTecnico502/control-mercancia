<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transporte extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'transporte',
        'estado'
    ];

    public function mercancia()
    {
        // uno a muchos
        return $this->hasMany(Mercancia::class);
    }
}
