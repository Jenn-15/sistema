<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{ 
    use HasFactory;

    protected $fillable = [
        'serie',
        'marca_id',
        'modelo', 
        'numero_inventario',
        'categoria_id',
        'descripcion',
        'area_id',
        'empleado_id',
        'fecha_alta',
        'fecha_resguardo',
        'user_id'
    ];

    // Relaciones
    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }

    // Relación con mantenimientos
    public function mantenimientos()
    {
        return $this->hasMany(Mantenimiento::class);
    }

    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }


} 
