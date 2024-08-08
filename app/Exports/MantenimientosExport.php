<?php

namespace App\Exports;

use App\Models\Mantenimiento;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;

class MantenimientosExport implements FromCollection, WithHeadings, WithMapping
{
    use Exportable;

    protected $mantenimientos;

    public function __construct($mantenimientos)
    {
        $this->mantenimientos = $mantenimientos;
    }

    public function collection()
    {
        return $this->mantenimientos;
    }

    public function headings(): array
    {
        return [
            'No.INVENTARIO',
            'MARCA',
            'MODELO',
            'RESPONSABLE',
            'UBICACION',
            'CATEGORIA',
            'FECHA DE MANTENIMIENTO',
            'TIPO DE MANTENIMIENTO',
            'DETALLES DEL MANTENIMIENTO',
            'COSTO'
        ];
    }

    public function map($mantenimiento): array
    {
        return [
            $mantenimiento->equipo->numero_inventario,
            optional($mantenimiento->equipo->marca)->marca,
            $mantenimiento->equipo->modelo,
            $mantenimiento->equipo->empleado->nombre . ' ' . $mantenimiento->equipo->empleado->apellido_paterno . ' ' . $mantenimiento->equipo->empleado->apellido_materno,
            $mantenimiento->equipo->area->area,
            $mantenimiento->equipo->categoria->categoria,
            $mantenimiento->fecha,
            $mantenimiento->tipo->tipo,
            $mantenimiento->descripcion,
            $mantenimiento->costo,
        ];
    }
}
