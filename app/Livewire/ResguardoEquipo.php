<?php

namespace App\Livewire;

use App\Models\Equipo;
use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class ResguardoEquipo extends Component
{
    public $searchTerm = '';
    public $equipos = []; // Inicializa como un arreglo vacío

    public function submit()
    {
        $this->search();
    }

    public function search()
    {
        $this->equipos = Equipo::where('numero_inventario', 'like', '%' . $this->searchTerm . '%')
            ->get();
    }

    public function generatePDF()
    {
        $equipos = $this->equipos;

        $pdf = PDF::loadView('pdf.equipos', [
            'equipos' => $equipos,
        ])->setPaper('a4', 'landscape');

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
        }, 'equipos_seleccionados.pdf');
    }

    public function render()
    {
        return view('livewire.resguardo-equipo', [
            'equipos' => $this->equipos,
            'allEquipos' => Equipo::all(),
        ]);
    }
}
