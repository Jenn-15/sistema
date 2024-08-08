<?php

namespace App\Livewire;

use App\Models\Equipo;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Mantenimiento;

class HomeMantenimientos extends Component
{
    use WithPagination;

    public $termino = '';

    protected $listeners = ['terminosBusqueda' => 'buscar'];
    protected $queryString = ['termino'];

    public function buscar($termino)
    {
        $this->termino = $termino;
    }

    public function render()
    {
        $mantenimientos = Mantenimiento::with('equipo.area')
            ->when($this->termino, function ($query) {
                $query->where(function ($subquery) {
                    $subquery->whereHas('equipo', function ($subquery) {
                        $subquery->where('numero_inventario', 'like', '%' . $this->termino . '%')
                                 ->orWhere('modelo', 'like', '%' . $this->termino . '%');
                    })
                    ->orWhere('fecha', 'like', '%' . $this->termino . '%');
                });
            })
            ->paginate(5);

        return view('livewire.home-mantenimientos', [
            'mantenimientos' => $mantenimientos,
            'equipos' => Equipo::all(),
        ]);
    }
}
