<?php

namespace App\Http\Controllers;

use App\Models\Mantenimiento;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Cache;

class MantenimientoController extends Controller
{
    public function generatePDF($id)
{
    $mantenimiento = Mantenimiento::with(['equipo.empleado', 'equipo.area', 'equipo.categoria', 'tipo'])->findOrFail($id);

    $pdf = PDF::loadView('mantenimientos.pdf', compact('mantenimiento'));

    return $pdf->stream('mantenimiento_reporte.pdf');
}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Mantenimiento::class);

        return view('mantenimientos.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Mantenimiento::class);

        return view('mantenimientos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /** 
     * Display the specified resource.
     */
    public function show(Mantenimiento $mantenimiento)
    {
        return view('mantenimientos.show', [
            'mantenimiento' => $mantenimiento
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mantenimiento $mantenimiento)
    {
        $this->authorize('update', $mantenimiento);

        return view('mantenimientos.edit', [
            'mantenimiento' => $mantenimiento
        ]);
    }
}
