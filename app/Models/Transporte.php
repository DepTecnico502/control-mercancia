<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transporte extends Model
{
    use HasFactory;

    protected $fillable = [
        'transporte',
        'estado'
    ];

    public function mercancia()
    {
        return $this->hasMany(Mercancia::class);
    }
}
