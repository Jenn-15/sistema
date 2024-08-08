<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\ResguardoController;
use App\Http\Livewire\BusquedaEquiposPorArea;
use App\Http\Controllers\MantenimientoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', HomeController::class)->name('home');

//VISTA DE LOS MANTENIMIENTOS
Route::get('/dashboard', [MantenimientoController::class, 'index'])->middleware(['auth', 'verified'])->name('mantenimientos.index');
Route::get('/mantenimientos/create', [MantenimientoController::class, 'create'])->middleware(['auth', 'verified'])->name('mantenimientos.create');
Route::get('/mantenimientos/{mantenimiento}/edit', [MantenimientoController::class, 'edit'])->middleware(['auth', 'verified'])->name('mantenimientos.edit');
Route::get('/mantenimientos/{mantenimiento}', [MantenimientoController::class, 'show'])->name('mantenimientos.show');
Route::get('/mantenimientos/{id}/pdf', [MantenimientoController::class, 'generatePDF'])->name('mantenimientos.pdf');

//VISTA DE LOS EQUIPOS
Route::get('/equipos/index', [EquipoController::class, 'index'])->middleware(['auth', 'verified'])->name('equipos.index');
Route::get('/equipos/create', [EquipoController::class, 'create'])->middleware(['auth', 'verified'])->name('equipos.create');
Route::get('/equipos/{equipo}/edit', [EquipoController::class, 'edit'])->middleware(['auth', 'verified'])->name('equipos.edit');
Route::get('/equipos/{equipo}', [EquipoController::class, 'show'])->name('equipos.show');
Route::get('/equipos/{id}/pdf', [EquipoController::class, 'generatePDF'])->name('equipos.pdf');
Route::get('/pdf/responsable/{responsableId}', [EquipoController::class, 'generateResponsablePDF'])->name('pdf.responsable');

//VISTA DE LOS EMPLEADOS
Route::get('/empleados/index', [EmpleadoController::class, 'index'])->middleware(['auth', 'verified'])->name('empleados.index');
Route::get('/empleados/create', [EmpleadoController::class, 'create'])->middleware(['auth', 'verified'])->name('empleados.create');
Route::get('/empleados/{empleado}/edit', [EmpleadoController::class, 'edit'])->middleware(['auth', 'verified'])->name('empleados.edit');
Route::get('/empleados/{empleado}', [EmpleadoController::class, 'show'])->name('empleados.show');

//VISTA DE LOS RESGUARDOS
Route::get('/resguardos', [ResguardoController::class, 'index'])->middleware(['auth', 'verified'])->name('resguardos.index');
//Route::get('/resguardos/{resguardo}', [ResguardoController::class, 'show'])->name('resguardos.show');

// Ruta para resguardos por equipo
Route::get('/resguardos/equipo', function () {return view('resguardos.equipo');})->name('resguardos.equipo');
Route::post('/equipos/por-equipo', [EquipoController::class, 'mostrarPorEquipo'])->name('equipos.por.equipo');
Route::post('/equipos/pdf', [EquipoController::class, 'generarPDF'])->name('equipos.pdf');

// Ruta para resguardos general
Route::get('/resguardos/total', function () {return view('resguardos.empleado');})->name('resguardos.total');
Route::post('/equipos/total', [EquipoController::class, 'mostrarTotal'])->name('equipos.total');
Route::post('/equipos/pdf', [EquipoController::class, 'generarPDF'])->name('total.pdf');

// Ruta para resguardos por área
Route::get('/resguardos/area', function () {return view('resguardos.area');})->name('resguardos.area');
Route::post('/equipos/por-area', [EquipoController::class, 'mostrarPorArea'])->name('equipos.por.area');
Route::post('/equipos/pdf', [EquipoController::class, 'generarPDF'])->name('equipos.pdf');


//VISTA DE LOS SERVICIOS
Route::get('/servicios', [ServicioController::class, 'index'])->middleware(['auth', 'verified'])->name('servicios.index');
Route::get('/servicios/create', [ServicioController::class, 'create'])->middleware(['auth', 'verified'])->name('servicios.create');
Route::get('/servicios/{servicio}/edit', [ServicioController::class, 'edit'])->middleware(['auth', 'verified'])->name('servicios.edit');
//Route::get('/servicios/{servicio}', [ServicioController::class, 'show'])->name('servicios.show');
Route::get('/pdf/solicitud-servicio/{id}', [ServicioController::class, 'generatePDF'])->name('pdf.solicitudServicio'); //Esto es asi cuando se pone la indicacion
//en el mismo controllador, es decir que en el controlador se pone el generate pdf, si no se hace como en los resguardos.


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
