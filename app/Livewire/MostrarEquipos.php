<?php

namespace App\Livewire;

use App\Models\Equipo;
use Livewire\Component;
use Livewire\WithPagination;

class MostrarEquipos extends Component
{
    use WithPagination;

    public $search = '';

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

    public function eliminarEquipo(Equipo $equipo)
    {
        $equipo->delete();

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

    public function render()
    {
        $query = Equipo::where('user_id', auth()->user()->id);

        if (!empty($this->search)) {
            $query->where(function ($query) {
                $query->where('numero_inventario', 'like', '%' . $this->search . '%')
                      ->orWhere('modelo', 'like', '%' . $this->search . '%')
                      ->orWhereHas('area', function ($query) {
                          $query->where('area', 'like', '%' . $this->search . '%');
                       })->orWhereHas('marca', function($query) {
                            $query->where('marca', 'like', '%' . $this->search . '%');
                          })->orWhereHas('categoria', function($query) {
                                $query->where('categoria', 'like', '%' . $this->search . '%');
                          });
            });
        }
    
        $equipos = $query->paginate(20);

        return view('livewire.mostrar-equipos', [
            'equipos' => $equipos
        ]);
    }
}
