<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Empleado extends Model
{
    use HasFactory;

    protected $fillable = [
        'numeroT',
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'area_id',
        'cargo',
        'user_id'
    ];

    public function area()
    {
        return $this->BelongsTo(Area::class, 'area_id');
    }

    public function equipos()
    {
        return $this->hasMany(Equipo::class, 'empleado_id');
    }

}
