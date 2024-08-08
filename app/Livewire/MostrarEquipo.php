<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class MostrarEquipo extends Component
{   
    public $equipo;
    
    public function render()
    {
        return view('livewire.mostrar-equipo');
    }
}
 