<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    // Definir la relación con Equipos
    public function equipos()
    {
        return $this->hasMany(Equipo::class);
    }
}