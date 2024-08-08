<?php
 
namespace App\Livewire;

use App\Models\Area;
use App\Models\Marca;
use App\Models\Equipo;
use App\Models\Estado;
use Livewire\Component;
use App\Models\Categoria;
use App\Models\Empleado;

class EditarEquipo extends Component
{
    public $equipo_id; 
    public $serie;
    public $marca;
    public $modelo;
    public $numero_inventario;
    public $categoria;
    public $descripcion;
    public $area;
    public $empleado;
    public $fecha_alta;
    public $fecha_resguardo;
    public $observacion;

    protected $rules = [
        'serie' => 'nullable|string',
        'marca' => 'required',
        'modelo' => 'required|string',
        'numero_inventario' => 'required|string',
        'categoria' => 'required',
        'descripcion' => 'required|string',
        'area' => 'required',
        'empleado' => 'required',
        'fecha_alta' => 'required|date',
        'fecha_resguardo' => 'nullable|date',
        'observacion' => 'nullable|string'
    ];

    public function mount(Equipo $equipo)
    {
        $this->equipo_id = $equipo->id; 
        $this->serie = $equipo->serie;
        $this->marca = $equipo->marca_id;
        $this->modelo = $equipo->modelo;
        $this->numero_inventario = $equipo->numero_inventario;
        $this->categoria = $equipo->categoria_id;
        $this->descripcion = $equipo->descripcion;
        $this->area = $equipo->area_id;
        $this->empleado = $equipo->empleado_id;
        $this->fecha_alta = $equipo->fecha_alta;
        $this->fecha_resguardo = $equipo->fecha_resguardo;
        $this->observacion = $equipo->observacion; 
    }
 
    public function editarEquipo()
    {
        $datos = $this->validate();

        //Si hay una imagen

        //Encontrar el equipo a editar
        $equipo = Equipo::find($this->equipo_id);

        //Asignar los valores 
        $equipo->serie = $datos['serie'];
        $equipo->marca_id = $datos['marca'];
        $equipo->modelo = $datos['modelo'];
        $equipo->numero_inventario = $datos['numero_inventario'];
        $equipo->categoria_id = $datos['categoria'];
        $equipo->descripcion = $datos['descripcion'];
        $equipo->area_id = $datos['area'];
        $equipo->empleado_id = $datos['empleado'];
        $equipo->fecha_alta = $datos['fecha_alta'];
        $equipo->fecha_resguardo = $datos['fecha_resguardo'];
        $equipo->observacion = $datos['observacion'];

        //Guardar el equipo
        $equipo->save();

        //Redireccionar
        session()->flash('mensaje', 'Actualizacion correcta');

        return  redirect()->route('equipos.index');
    }

    public function render()
    {
        //Consultar BD
        $marcas = Marca::all();
        $categorias = Categoria::all();
        $areas = Area::all();
        $estados = Estado::all();
        $empleados = Empleado::all();

        return view('livewire.editar-equipo', [
            'marcas' => $marcas,
            'categorias' => $categorias,
            'areas' => $areas,
            'estados' => $estados,
            'empleados' => $empleados
        ]);
    } 
}
