<?php

namespace App\Livewire;

use App\Models\Area;
use Livewire\Component;
use App\Models\Empleado;
use App\Models\Servicio;

class NuevoServicio extends Component
{
    public $area;
    public $descripcionProblema ;
    public $diagnostico;
    public $fecha_solicitud;
    public $fecha_servicio;
    public $empleado;
    public $autoriza;
    public $tecnico;

    protected $rules = [
        'area' => 'required',
        'descripcionProblema' => 'required',
        'diagnostico' => 'nullable|string',
        'fecha_solicitud' => 'required|date',
        'fecha_servicio' => 'nullable|date',
        'empleado' => 'required',
        'autoriza' => 'required',
        'tecnico' => 'required',
    ];

    public function nuevoServicio()
    {
        $datos = $this->validate();

        //Nueva solicitud de servicio
        Servicio::create([
            'area' => $datos['area_id'],
            'descripcionProblema' => $datos['descripcionProblema'],
            'diagnostico' => $datos['diagnostico'],
            'fecha_solicitud' => $datos['fecha_solicitud'], 
            'fecha_servicio' => $datos['fecha_servicio'],
            'empleado_id' => $datos['empleado_id'],
            'autoriza' => $datos['autoriza'],
            'tecnico' => $datos['tecnico'],
            'user_id' => auth()->user()->id,
        ]);

        //Crear Mensaje
        session()->flash('mensaje', 'Registro de solicitud correcto');

        //Redireccionar al usuario
        return redirect()->route('servicios.index');
    }

    public function render()
    {
        //CONSULTAR BD
        $areas = Area::all();
        $empleados = Empleado::all();
        
        return view('livewire.nuevo-servicio', [
            'areas' => $areas,
            'empleados' => $empleados,
        ]);
    }
}
