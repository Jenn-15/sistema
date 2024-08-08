<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Servicio;
use Livewire\WithPagination;

class ShowServicios extends Component
{
    use WithPagination;
    public function eliminarServicio(Servicio $servicio)
    {
        $servicio->delete();
    }

    public function render()
    {
        $query = Servicio::where('user_id', auth()->user()->id);
        $servicios = $query->paginate(20);
        
        return view('livewire.show-servicios', [
            'servicios' => $servicios
        ]);
    }
}
