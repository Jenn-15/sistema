<?php

namespace App\Livewire;

use App\Models\Area;
use App\Models\Categoria;
use App\Models\Empleado;
use App\Models\Equipo;
use App\Models\Estado;
use App\Models\Marca;
use Livewire\Component;

class CrearEquipo extends Component
{
    public $serie;
    public $marca_id;
    public $modelo;
    public $numero_inventario;
    public $categoria;
    public $descripcion;
    public $area;
    public $empleado;
    public $fecha_alta;
    public $fecha_resguardo;
    public $observacion;
    public $nuevaMarca;
    

    protected $rules = [
        'serie' => 'nullable|string',
        'marca_id' => 'required',
        'modelo' => 'required|string',
        'numero_inventario' => 'required|string',
        'categoria' => 'required',
        'descripcion' => 'required|string',
        'area' => 'required',
        'empleado' => 'required',
        'fecha_alta' => 'required|date',
        'fecha_resguardo' => 'nullable|date',
        'observacion' => 'nullable|string',
        'nuevaMarca' => 'nullable|string|required_if:marca_id,nueva', // Validar si marca_id es "nueva"
        
    ];

    public function crearEquipo()
    {
        $datos = $this->validate();

        // Crear una nueva marca si se selecciona "Nueva marca"
        if ($datos['marca_id'] === 'nueva') {
            $nuevaMarca = Marca::create([
                'marca' => $datos['nuevaMarca'],
            ]);

            $datos['marca_id'] = $nuevaMarca->id;
        }

        

        

        // Crear el registro del equipo
        Equipo::create([
            'serie' => $datos['serie'],
            'marca_id' => $datos['marca_id'],
            'modelo' => $datos['modelo'],
            'numero_inventario' => $datos['numero_inventario'],
            'categoria_id' => $datos['categoria'],
            'descripcion' => $datos['descripcion'],
            'area_id' => $datos['area'],
            'empleado_id' => $datos['empleado'],
            'fecha_alta' => $datos['fecha_alta'],
            'fecha_resguardo' => $datos['fecha_resguardo'],
            'observacion' => $datos['observacion'],
            'user_id' => auth()->user()->id,
        ]);

        session()->flash('mensaje', 'Registro creado correctamente');
        return redirect()->route('equipos.index');
    }

    public function render()
    {
        $marcas = Marca::all();
        $categorias = Categoria::all();
        $areas = Area::all();
        $estados = Estado::all();
        $empleados = Empleado::all();

        return view('livewire.crear-equipo', [
            'marcas' => $marcas,
            'categorias' => $categorias,
            'areas' => $areas,
            'estados' => $estados,
            'empleados' => $empleados,
        ]);
    }
}
