<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\RateLimiter\RequestRateLimiterInterface;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        //
        $this->authorize('viewAny', Empleado::class);

        return view('empleados.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Empleado::class);

        return view('empleados.create');
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
    public function show(Empleado $empleado)
    {
        return view('empleados.show', [
            'empleado' => $empleado
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empleado $empleado)
    {
        //
        $this->authorize('update', $empleado);

        return view('empleados.edit', [
            'empleado' => $empleado 
        ]);
    }
    public function __invoke(Request $request)
    {
        return view('empleados.index');
    }
}
