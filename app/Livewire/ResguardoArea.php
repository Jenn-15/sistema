<?php

namespace App\Livewire;

use App\Models\Area;
use App\Models\Equipo;
use Livewire\Component;
use App\Models\Empleado;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class ResguardoArea extends Component
{
    public $selectedArea;
    public $selectedEmpleado;
    public $areas;
    public $empleados;
    public $equipos;

    public function mount()
    {
        $this->areas = Area::all();
        $this->empleados = Empleado::all();
        $this->equipos = collect();
    }

    public function submit()
    {
        $query = Equipo::query();
 
        if ($this->selectedArea) {
            $query->where('area_id', $this->selectedArea);
        }

        if ($this->selectedEmpleado) {
            $query->where('empleado_id', $this->selectedEmpleado);
        }

        $this->equipos = $query->get();
    }

    public function generatePDF()
    {
        $equipos = $this->equipos;
        $responsable = $this->selectedEmpleado ? Empleado::find($this->selectedEmpleado) : null;
        $maxRecordsPerPDF = 200; // Definir un límite de registros por PDF
    
        if ($equipos->count() > $maxRecordsPerPDF) {
            // Dividir en varios PDFs si el número de registros excede el límite
            $chunks = $equipos->chunk($maxRecordsPerPDF);
    
            $zip = new \ZipArchive();
            $zipFileName = 'equipos_seleccionados.zip';
            $zip->open(public_path($zipFileName), \ZipArchive::CREATE);
    
            foreach ($chunks as $index => $chunk) {
                $pdf = PDF::loadView('pdf.areas', [
                    'equipos' => $chunk,
                    'responsable' => $responsable,
                ])->setPaper('a4', 'landscape');
    
                $pdfFileName = "equipos_seleccionados_page_{$index}.pdf";
                $zip->addFromString($pdfFileName, $pdf->output());
            }
    
            $zip->close();
    
            return response()->download(public_path($zipFileName))->deleteFileAfterSend(true);
        } else {
            // Generar un solo PDF si el número de registros es manejable
            $pdf = PDF::loadView('pdf.areas', [
                'equipos' => $equipos,
                'responsable' => $responsable,
            ])->setPaper('a4', 'landscape');
    
            return response()->streamDownload(function () use ($pdf) {
                echo $pdf->output();
            }, 'equipos_seleccionados.pdf');
        }
    }
    
    public function generateAreaPDF()
{
    if ($this->selectedArea) {
        $area = Area::find($this->selectedArea);
        $equipos = Equipo::where('area_id', $this->selectedArea)->get();
        $maxRecordsPerPDF = 100; // Definir un límite de registros por PDF

        if ($equipos->count() > $maxRecordsPerPDF) {
            // Dividir en varios PDFs si el número de registros excede el límite
            $chunks = $equipos->chunk($maxRecordsPerPDF);

            $zip = new \ZipArchive();
            $zipFileName = 'equipos_por_area.zip';
            $zip->open(public_path($zipFileName), \ZipArchive::CREATE);

            foreach ($chunks as $index => $chunk) {
                $pdf = PDF::loadView('pdf.equipos_area', [
                    'area' => $area,
                    'equipos' => $chunk,
                ])->setPaper('a4', 'landscape');

                $pdfFileName = "equipos_por_area_page_{$index}.pdf";
                $zip->addFromString($pdfFileName, $pdf->output());
            }

            $zip->close();

            return response()->download(public_path($zipFileName))->deleteFileAfterSend(true);
        } else {
            // Generar un solo PDF si el número de registros es manejable
            $pdf = PDF::loadView('pdf.equipos_area', [
                'area' => $area,
                'equipos' => $equipos,
            ])->setPaper('a4', 'landscape');

            return response()->streamDownload(function () use ($pdf) {
                echo $pdf->output();
            }, 'equipos_por_area.pdf');
        }
    }
}

    public function render()
    {
        return view('livewire.resguardo-area');
    }
}
