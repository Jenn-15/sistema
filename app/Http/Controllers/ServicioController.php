<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ServicioController extends Controller
{

    public function generatePDF($id)
    {
        $servicio = Servicio::findOrFail($id);

        $pdf = PDF::loadView('pdf.solicitudServicio', ['servicio' => $servicio]);

        return $pdf->download('solicitud_servicio_' . $id . '.pdf');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$this->authorize('viewAny', Servicio::class);
        return view('servicios.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('servicios.create');
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
    public function show(Servicio $servicio)
    { 
        return view('servicios.show', [
            'servicio' => $servicio
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Servicio $servicio)
    {
        return view('servicios.edit', [
            'servicio' => $servicio
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function __invoke(Request $request)
    {
        return view('servicios.index');
    }
}
