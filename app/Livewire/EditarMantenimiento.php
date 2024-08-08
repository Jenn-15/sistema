<?php

namespace App\Livewire;

use App\Models\Tipo;
use App\Models\Equipo;
use App\Models\Mantenimiento;
use Illuminate\Support\Carbon;
use Livewire\Component;

class EditarMantenimiento extends Component
{
    public $mantenimiento_id;
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

    public function mount(Mantenimiento $mantenimiento)
    {
        $this->mantenimiento_id = $mantenimiento->id;
        $this->equipo = $mantenimiento->equipo_id;
        $this->tipo = $mantenimiento->tipo_id;
        $this->descripcion = $mantenimiento->descripcion;
        $this->fecha = Carbon::parse($mantenimiento->fecha)->format('Y-m-d');
        $this->costo = $mantenimiento->costo;
    }

    public function editarMantenimiento()
    {
        $datos = $this->validate();

        //Si hay nueva imagen

        //Encontrar el mantenimiento a editar
        $mantenimiento = Mantenimiento::find($this->mantenimiento_id);

        //Asignar los valores
        $mantenimiento->equipo_id = $datos['equipo'];
        $mantenimiento->tipo_id = $datos['tipo'];
        $mantenimiento->descripcion = $datos['descripcion'];
        $mantenimiento->fecha = $datos['fecha'];
        $mantenimiento->costo = $datos['costo'];

        //Guardar el mantenimiento
        $mantenimiento->save();

        //Redireccionar
        session()->flash('mensaje', 'Actualizacion correcta');

        return  redirect()->route('mantenimientos.index');
    }

    public function render()
    {
        //consultar BD
        $equipos = Equipo:: all();
        $tipos = Tipo:: all();

        return view('livewire.editar-mantenimiento', [
            'equipos' => $equipos,
            'tipos' => $tipos
        ]);
    }
} 
