<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mantenimiento extends Model
{
    use HasFactory;

    protected $dates = ['fecha'];
    protected $casts = [ 'fecha'=>'date'];

    protected $fillable = [
        'equipo_id',
        'tipo_id',
        'descripcion',
        'fecha',
        'costo',
        'user_id'
    ];
    
    public function equipo()
    {
        return $this->belongsTo(Equipo::class);
    }

    public function tipo()
    {
        return $this->belongsTo(Tipo::class);
    }
}
