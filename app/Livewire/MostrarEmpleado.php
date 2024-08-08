<?php

namespace App\Livewire;

use Livewire\Component;

class MostrarEmpleado extends Component
{
    public $empleado;
    
    public function render()
    {
        return view('livewire.mostrar-empleado');
    }
}
  