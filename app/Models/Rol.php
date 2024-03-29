<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;

    protected $fillable = [
        'rol'
    ];

    public function user()
    {
        // Uno a muchos
        return $this->hasMany(User::class);
    }
}
