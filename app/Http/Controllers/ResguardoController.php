<?php

namespace App\Http\Controllers;

use App\Models\Equipo; 
use App\Models\Resguardo;
use Illuminate\Http\Request;

class ResguardoController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('resguardos.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show($resguardo)
    {// Aquí puedes implementar la lógica para obtener y mostrar el resguardo específico
    // Puedes usar el parámetro $resguardo para obtener los datos del resguardo desde la base de datos
    $resguardo = Resguardo::findOrFail($resguardo); // Ejemplo: usando Eloquent para encontrar el resguardo
    
    // Por ejemplo, puedes pasar $resguardo a la vista
    return view('resguardos.show', [
        'resguardo' => $resguardo
    ]);
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
        return view('resguardos.index');
    }
}
