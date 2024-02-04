<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $table = 'proveedores';

    protected $fillable = [
        'codigo',
        'proveedor',
        'estado'
    ];

    public function mercancia()
    {
        return $this->hasMany(Mercancia::class);
    }
}
