<?php

namespace App\Livewire;

use App\Models\Area;
use Livewire\Component;
use App\Models\Empleado;
use App\Models\Servicio;

class EditarServicio extends Component
{
    public $servicio_id;
    public $area_id;
    public $descripcionProblema ;
    public $diagnostico;
    public $fecha_solicitud;
    public $fecha_servicio;
    public $empleado_id;
    public $autoriza;
    public $tecnico;

    protected$rules = [
        'area_id' => 'required',
        'descripcionProblema' => 'required',
        'diagnostico' => 'nullable|string',
        'fecha_solicitud' => 'required|date',
        'fecha_servicio' => 'nullable|date',
        'empleado_id' => 'required',
        'autoriza' => 'required',
        'tecnico' => 'required',
    ]; 

    public function mount(Servicio $servicio)
    {
        $this->servicio_id = $servicio->id;
        $this->area_id = $servicio->area_id;
        $this->descripcionProblema = $servicio->descripcionProblema;
        $this->diagnostico = $servicio->diagnostico;
        $this->fecha_solicitud = $servicio->fecha_solicitud;
        $this->fecha_servicio = $servicio->fecha_servicio;
        $this->empleado_id = $servicio->empleado_id;
        $this->autoriza = $servicio->autoriza;
        $this->tecnico = $servicio->tecnico;
    }

    public function editarServicio()
    {
        $datos = $this->validate();

        //Si hay una imagen

        //Encontrar el servicio a editar
        $servicio = Servicio::find($this->servicio_id);
        //Asignar valores
        $servicio->area_id = $datos['area_id'];
        $servicio->descripcionProblema = $datos['descripcionProblema'];
        $servicio->diagnostico = $datos['diagnostico'];
        $servicio->fecha_solicitud = $datos['fecha_solicitud'];
        $servicio->fecha_servicio = $datos['fecha_servicio'];
        $servicio->empleado_id = $datos['empleado_id'];
        $servicio->autoriza = $datos['autoriza'];
        $servicio->tecnico = $datos['tecnico']; 

        //GUARDAR CAMBIOS
        $servicio->save();

        //REDIRECCIONAR
        session()->flash('mensaje', 'Actualizacion correcta');

        return  redirect()->route('servicios.index');
    }

    public function render()
    {
        //CONSULTAR BD
        $areas = Area::all();
        $empleados = Empleado::all();

        return view('livewire.editar-servicio', [
            'areas' => $areas,
            'empleados' => $empleados
        ]);
    }
}
  