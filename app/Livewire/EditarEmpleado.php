<?php

namespace App\Livewire;

use App\Models\Area;
use Livewire\Component;
use App\Models\Empleado;

class EditarEmpleado extends Component
{
    public $empleado_id; 
    public $numeroT;
    public $nombre;
    public $apellido_paterno;
    public $apellido_materno;
    public $area;
    public $cargo;

    protected $rules = [
        'numeroT' => 'nullable|string',
        'nombre' => 'required|string',
        'apellido_paterno' => 'required|string',
        'apellido_materno' => 'required|string',
        'area' => 'required',
        'cargo' => 'required|string'
      ];

    public function mount(Empleado $empleado)
    {
        $this->empleado_id = $empleado->id;
        $this->numeroT = $empleado->numeroT;
        $this->nombre = $empleado->nombre;
        $this->apellido_paterno = $empleado->apellido_paterno;
        $this->apellido_materno = $empleado->apellido_materno;
        $this->area = $empleado->area_id;
        $this->cargo = $empleado->cargo;
    }

    public function editarEmpleado()
    {
        $datos = $this->validate();

        //En caso de esxistir imagen

        //Encontrar el empleado a editar
        $empleado = Empleado::find($this->empleado_id);

        //Asignar los valores
        $empleado->numeroT = $datos['numeroT'];
        $empleado->nombre = $datos['nombre'];
        $empleado->apellido_paterno = $datos['apellido_paterno'];
        $empleado->apellido_materno = $datos['apellido_materno'];
        $empleado->area_id = $datos['area'];
        $empleado->cargo = $datos['cargo'];

        //Guardar al empleado
        $empleado->save();

        //Redireccionar
        session()->flash('mensaje', 'Actualizacion de información correcta');

        return redirect()->route('empleados.index');
    }

    public function render()
    {
         //Consultar BD
         $areas = Area:: all();

        return view('livewire.editar-empleado', [
            'areas' => $areas 
        ]);
    }
} 
