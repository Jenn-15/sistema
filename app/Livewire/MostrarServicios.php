<?php

namespace App\Livewire;

use App\Models\Servicio;
use Livewire\Component;
use Livewire\WithPagination;

class MostrarServicios extends Component
{
    public $servicio;
     
    use WithPagination;

    public function eliminarServicio(Servicio $servicio)
    {
        $servicio->delete();
    }

    public function render()
    {
        $query = Servicio::where('user_id', auth()->user()->id);
        $servicios = $query->paginate(20);

        return view('livewire.mostrar-servicios', [
            'servicios' => $servicios // Asegúrate de que el nombre de la variable sea $servicios
        ]);
    }
}
