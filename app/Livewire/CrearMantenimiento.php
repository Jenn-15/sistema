<?php

namespace App\Livewire;

use App\Models\Tipo;
use App\Models\Equipo;
use Livewire\Component;
use App\Models\Mantenimiento;

class CrearMantenimiento extends Component
{
    public $equipo;
    public $tipo;
    public $descripcion;
    public $fecha;
    public $costo;

    protected $rules = [
        'equipo' => 'required',
        'tipo' => 'required',
        'descripcion' => 'required',
        'fecha' => 'required',
        'costo' => 'required|string'
    ];

    public function crearMantenimiento()
    {
        $datos = $this->validate();
        //Alamacenar una imagen

        //Crear registro de mantenimientos
        Mantenimiento::create([
            'equipo_id' => $datos['equipo'],
            'tipo_id' => $datos['tipo'],
            'descripcion' => $datos['descripcion'],
            'fecha' => $datos['fecha'],
            'costo' => $datos['costo'],
            'user_id' => auth()->user()->id,
        ]);

        //Crear Mensaje
        session()->flash('mensaje', 'Registro creado correctamente');

        //Redireccionar al usuario
        return redirect()->route('mantenimientos.index');
    }


    public function render()
    {
        //Consultar BD
        $equipos = Equipo::all();
        $tipos = Tipo::all();
        
        return view('livewire.crear-mantenimiento',[
            'equipos' => $equipos,
            'tipos' => $tipos
        ]);
    }
}
