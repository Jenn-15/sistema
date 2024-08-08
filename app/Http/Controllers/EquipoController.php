<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Area;
use App\Models\Equipo;
use Illuminate\Http\Request; 
use Barryvdh\DomPDF\Facade\Pdf;

class EquipoController extends Controller
{
    
    //Resguardo por area-general-empleado
    public function showResguardoArea()
    {
        $areas = Area::all(); // Obtener todas las áreas

        return view('livewire.resguardo-area', [
            'areas' => $areas,
        ]);
    }
    
    
    //RESGUARDO DEL TOTAL DE EQUIPOS POR EMPLEADO
   

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Equipo::class);

        return view('equipos.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() 
    {
        $this->authorize('create', Equipo::class);
        
        return view('equipos.create');
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
    public function show(Equipo $equipo)
    {
        return view('equipos.show', [
            'equipo' => $equipo
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Equipo $equipo)
    {
        $this->authorize('update', $equipo);

        return view('equipos.edit', [
            'equipo' => $equipo
        ]);
    }

    public function __invoke(Request $request)
    {
        return view('equipos.index');
    }
}