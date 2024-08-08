<?php

namespace App\Livewire;

use App\Models\Empleado;
use Livewire\Component;
use Livewire\WithPagination;

class MostrarEmpleados extends Component
{
    use WithPagination;

    public $search = '';
    public $sortField = 'nombre'; // Campo por defecto para ordenar
    public $sortDirection = 'asc'; // Dirección por defecto

    public function updatingSearch() 
    {
        $this->resetPage();
    }

    public function updatedSearch($value)
    {
        if ($value === '') {
            $this->resetPage();
        }
    }

    public function buscar()
    {
        $this->resetPage();
    }

    public function eliminarEmpleado(Empleado $empleado)
    {
        $empleado->delete();

        // Restablecer la búsqueda si había algún término de búsqueda presente
        if ($this->search) {
            $this->resetSearch();
        }
    }

    public function resetSearch()
    {
        $this->search = '';
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function render()
    {
        $query = Empleado::where('user_id', auth()->user()->id);

        if (!empty($this->search)) {
            $query->where(function ($query) {
                $query->where('cargo', 'like', '%' . $this->search . '%')
                      ->orWhere('nombre', 'like', '%' . $this->search . '%')
                      ->orWhere('apellido_paterno', 'like', '%' . $this->search . '%')
                      ->orWhere('apellido_materno', 'like', '%' . $this->search . '%');
            });
        }

        $query->orderBy($this->sortField, $this->sortDirection);

        $empleados = $query->paginate(10);

        return view('livewire.mostrar-empleados', [
            'empleados' => $empleados
        ]);
    }
}
