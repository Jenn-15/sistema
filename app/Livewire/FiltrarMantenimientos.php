<?php

namespace App\Livewire;

use App\Models\Equipo;
use Livewire\Component;
use App\Models\Empleado;
use App\Models\Mantenimiento;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MantenimientosExport;

class FiltrarMantenimientos extends Component
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
            ->orWhereHas('empleado', function ($query) {
                $query->where('nombre', 'like', '%' . $this->searchTerm . '%');
            })
            ->orWhereHas('categoria', function ($query) {
                $query->where('categoria', 'like', '%' . $this->searchTerm . '%');
            })
            ->orWhereHas('area', function ($query) {
                $query->where('area', 'like', '%' . $this->searchTerm . '%');
            })
            ->get();
    }

    public function generatePDF($equipoId)
    {
        $equipo = Equipo::with('mantenimientos')->find($equipoId);

        if ($equipo && $equipo->mantenimientos->isNotEmpty()) {
            $pdf = Pdf::loadView('mantenimientos.historialPDF', ['equipo' => $equipo]);
            return response()->streamDownload(function () use ($pdf) {
                echo $pdf->stream();
            }, 'Historial_Mantenimientos_' . $equipo->numero_inventario . '.pdf');
        } else {
            return session()->flash('message', 'No existen mantenimientos para el equipo seleccionado.');
        }
    }

    public function generateExcel($equipoId)
    {
        $mantenimientos = Mantenimiento::where('equipo_id', $equipoId)->get();

        if ($mantenimientos->isNotEmpty()) {
            return Excel::download(new MantenimientosExport($mantenimientos), 'mantenimientos_' . $equipoId . '.xlsx');
        } else {
            return session()->flash('message', 'No existen mantenimientos para el equipo seleccionado.');
        }
    }

    public function render()
    {
        return view('livewire.filtrar-mantenimientos', [
            'equipos' => $this->equipos,
        ]);
    }
}
