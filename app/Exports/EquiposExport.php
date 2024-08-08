<?php

namespace App\Exports;

use App\Models\Equipo;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\Exportable;

class EquiposExport implements FromQuery, WithHeadings, WithMapping
{
    use Exportable;

    protected $query;

    public function __construct($query)
    {
        $this->query = $query;
    }

    public function query()
    {
        return $this->query;
    }

    public function headings(): array
    {
        return [
            'No.INVENTARIO',
            'DESCRIPCIÓN',
            'MARCA',
            'MODELO',
            'SERIE',
            'UBICACIÓN',
            'RESPONSABLE',
            'FECHA DE RESGUARDO',
            'OBSERVACIONES'
        ];
    }

    public function map($equipo): array
    {
        return [
            $equipo->numero_inventario,
            $equipo->descripcion,
            optional($equipo->marca)->marca,
            $equipo->modelo,
            $equipo->serie,
            $equipo->area->area,
            $equipo->empleado->nombre . ' ' . $equipo->empleado->apellido_paterno . ' ' . $equipo->empleado->apellido_materno,
            $equipo->fecha_resguardo,
            $equipo->observacion,
        ];
    }
}
