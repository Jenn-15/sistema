<?php

namespace App\Livewire;

use App\Models\Equipo;
use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use App\Exports\EquiposExport;
use Maatwebsite\Excel\Facades\Excel;

class ResguardosTotal extends Component
{
    public $equipos;
    public $termino;

    public function mount()
    {
        $this->equipos = Equipo::all();
        $this->termino = '';
    }

    public function submit()
{
    $query = Equipo::query();

    if ($this->termino) {
        // Primero, tratar de buscar por términos generales
        $query->where(function ($q) {
            $q->where('numero_inventario', 'like', '%' . $this->termino . '%')
                ->orWhere('modelo', 'like', '%' . $this->termino . '%')
                ->orWhere('serie', 'like', '%' . $this->termino . '%')
                ->orWhereHas('marca', function ($q) {
                    $q->where('marca', 'like', '%' . $this->termino . '%');
                })
                ->orWhereHas('area', function ($q) {
                    $q->where('area', 'like', '%' . $this->termino . '%');
                })
                ->orWhereHas('empleado', function ($q) {
                    $q->where('nombre', 'like', '%' . $this->termino . '%')
                        ->orWhere('apellido_paterno', 'like', '%' . $this->termino . '%')
                        ->orWhere('apellido_materno', 'like', '%' . $this->termino . '%');
                });
        });
    }

    // Luego, tratar de buscar por fechas
    if ($this->termino) {
        $query->orWhere(function ($q) {
            $q->where('fecha_resguardo', 'like', '%' . $this->termino . '%')
                ->orWhereYear('fecha_resguardo', $this->termino); // Buscar por año
        });
    }

    $this->equipos = $query->get();
}


    public function generatePDF()
{
    $equipos = $this->equipos;
    $maxRecordsPerPDF = 200; // Definir un límite de registros por PDF
    $totalRecords = $equipos->count();

    if ($totalRecords > $maxRecordsPerPDF) {
        // Si el número de registros excede el límite, dividir en varios PDFs
        $chunks = $equipos->chunk($maxRecordsPerPDF);

        $zip = new \ZipArchive();
        $zipFileName = 'equipos_seleccionados.zip';
        $zip->open(public_path($zipFileName), \ZipArchive::CREATE);

        foreach ($chunks as $index => $chunk) {
            $pdf = PDF::loadView('pdf.total', [
                'equipos' => $chunk,
            ])->setPaper('a4', 'landscape');

            $pdfFileName = "equipos_seleccionados_page_{$index}.pdf";
            $zip->addFromString($pdfFileName, $pdf->output());
        }

        $zip->close();

        return response()->download(public_path($zipFileName))->deleteFileAfterSend(true);
    } else {
        // Generar un solo PDF si el número de registros es manejable
        $pdf = PDF::loadView('pdf.total', [
            'equipos' => $equipos,
        ])->setPaper('a4', 'landscape');

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'equipos_seleccionados.pdf');
    }
}


public function generateExcel()
{
    if ($this->termino) {
        $query = Equipo::query();

        $query->where(function ($q) {
            $q->where('numero_inventario', 'like', '%' . $this->termino . '%')
                ->orWhere('modelo', 'like', '%' . $this->termino . '%')
                ->orWhere('serie', 'like', '%' . $this->termino . '%')
                ->orWhere('fecha_resguardo', 'like', '%' . $this->termino . '%')
                ->orWhereYear('fecha_resguardo', $this->termino)
                ->orWhereHas('marca', function ($q) {
                    $q->where('marca', 'like', '%' . $this->termino . '%');
                })
                ->orWhereHas('area', function ($q) {
                    $q->where('area', 'like', '%' . $this->termino . '%');
                })
                ->orWhereHas('empleado', function ($q) {
                    $q->where('nombre', 'like', '%' . $this->termino . '%')
                        ->orWhere('apellido_paterno', 'like', '%' . $this->termino . '%')
                        ->orWhere('apellido_materno', 'like', '%' . $this->termino . '%');
                });
        });

        $equiposExport = new EquiposExport($query);

        return Excel::download($equiposExport, 'equipos.xlsx');
    } else {
        $query = Equipo::query(); // Usar consulta para todos los registros

        $equiposExport = new EquiposExport($query);

        return Excel::download($equiposExport, 'equipos.xlsx');
    }
}


    public function render()
    {
        return view('livewire.resguardos-total');
    }
}
