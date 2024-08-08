<?php

namespace App\Livewire;

use App\Models\Area;
use App\Models\Empleado;
use Livewire\Component;
 
class CrearEmpleado extends Component
{
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
        'cargo' => 'required|string' // Campo requerido
    ];

  public function crearEmpleado()
  {
    $datos = $this->validate();
  //Almacenar Imagen

  //Crear registro de empleado
  Empleado::create([
            'numeroT' => $datos['numeroT'],
            'nombre' => $datos['nombre'],
            'apellido_paterno' => $datos['apellido_paterno'],
            'apellido_materno' => $datos['apellido_materno'],
            'area_id' => $datos['area'],
            'cargo' => $datos['cargo'],
            'user_id' => auth()->user()->id,
        ]);
  //Crear mensaje
  session()->flash('mensaje', 'Registro de empleado correcto');

  //Redireccionar al usuario
  return redirect()->route('empleados.index');

}

    public function render()
    {
        //Consultar BD
        $areas = Area::all() ;
 
        return view('livewire.crear-empleado', [
          'areas' => $areas  
        ]);
        
    }
}
