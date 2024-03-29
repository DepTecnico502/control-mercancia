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
        // Uno a muchos -- Un proveedor puede tener muchas mercancias
        return $this->hasMany(Mercancia::class);
    }
}
