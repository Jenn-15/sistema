<?php

namespace App\Livewire;

use App\Models\Mantenimiento;
use Livewire\Component;
use Livewire\WithPagination;

class MostrarMantenimientos extends Component
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

    public function eliminarMantenimiento(Mantenimiento $mantenimiento)
    {
        $mantenimiento->delete();

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
        $query = Mantenimiento::with('equipo.area')
            ->where('user_id', auth()->user()->id);

        if (!empty($this->search)) {
            $query->where(function ($query) {
                $query->WhereHas('equipo', function ($q) {
                          $q->where('numero_inventario', 'like', '%' . $this->search . '%')
                            ->orWhere('modelo', 'like', '%' . $this->search . '%')
                            ->orWhereHas('area', function($q){
                                $q->where('area', 'like', '%' . $this->search . '%');
                            });
                      });
            });
        }

        $mantenimientos = $query->paginate(5);

        return view('livewire.mostrar-mantenimientos', [
            'mantenimientos' => $mantenimientos
        ]);
    }
}
