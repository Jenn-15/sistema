<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model 
{
    use HasFactory;

    protected $fillable = [
        'area_id',
        'empleado_id',
        'descripcionProblema', 
        'diagnostico',
        'autoriza',
        'tecnico',
        'fecha_solicitud',
        'fecha_servicio',
        'user_id'
    ];

    // Relaciones
    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

} 

 