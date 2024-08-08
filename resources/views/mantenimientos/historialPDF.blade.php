<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <title>Historial de Mantenimientos</title>
    <link rel="stylesheet" href="{{ public_path('css/styles.css') }}"> <!-- Vincula tu archivo CSS externo -->
</head>
<body>
    <div class="header-center">
        <img class="h-25 w-auto" src="{{ public_path('img/cmic_tabasco.png') }}" alt="Logo de la Empresa">  
    </div> 
    <br>
    <div class="bold-text text-4xl" style="text-align: center;">REPORTE DE MANTENIMIENTO Y CONTROL DE EQUIPOS DE CÓMPUTO</div><br>

    <div class="content">
        <!-- Información del Equipo -->
        <div class="md:grid md:grid-cols-2 bg-gray-200 p-4 my-10 smaller-text">
            <p class="bold-text uppercase text-gray-800 my-3">EQUIPO:
                <span class="normal-case normal-text">{{ $equipo->numero_inventario }} </span>
            </p>
            <p class="bold-text uppercase text-gray-800 my-3">MARCA:
                <span class="normal-case normal-text">{{ $equipo->marca->marca }} </span>
            </p>
            <p class="bold-text uppercase text-gray-800 my-3">MODELO:
                <span class="normal-case normal-text">{{ $equipo->modelo }} </span>
            </p>
            <p>
                <span class="bold-text text-sm uppercase text-gray-800 my-3">RESPONSABLE:
                    <span class="normal-case normal-text">
                        {{ $equipo->empleado->nombre }}
                        {{ $equipo->empleado->apellido_paterno }}
                        {{ $equipo->empleado->apellido_materno }}
                    </span>
                </span>
            </p>

            <p>
                <span class="bold-text uppercase text-gray-800 my-3">UBICACIÓN:
                    <span class="normal-case normal-text"> {{ $equipo->area->area }} </span>
                </span>
            </p>
            <p class="bold-text uppercase text-gray-800 my-3">CATEGORIA DEL EQUIPO:
                <span class="normal-case normal-text">{{ $equipo->categoria->categoria }} </span>
            </p>
        </div>

        <!-- Detalles del Mantenimiento -->
        <div class="mb-2">
            <p>
                <h4 class="text-2xl  text-slate-600 bold-text mb-5" style="text-align: center;">DETALLES DEL MANTENIMIENTO</h4>
            </p>
            <div class="bg-gray-200 p-4 my-10">
                <table style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr>
                            <th class="smaller-text" style="border: 1px solid black; padding: 8px;">FECHA</th>
                            <th class="smaller-text" style="border: 1px solid black; padding: 8px;">TIPO</th>
                            <th class="smaller-text" style="border: 1px solid black; padding: 8px;">DETALLES</th>
                            <th class="smaller-text" style="border: 1px solid black; padding: 8px;">COSTO</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($equipo->mantenimientos as $mantenimiento)
                            <tr>
                                <td class="smaller-text" style="border: 1px solid black; padding: 8px; text-align: center;">
                                    {{ \Carbon\Carbon::parse($mantenimiento->fecha)->format('d-m-Y') }}
                                </td>
                                
                                <td class="smaller-text" style="border: 1px solid black; padding: 8px; text-align: center;">
                                    {{ $mantenimiento->tipo->tipo }}
                                </td>
                                <td class="smaller-text" style="border: 1px solid black; padding: 8px; text-align: center;">
                                    {{ $mantenimiento->descripcion }}
                                </td>
                                <td class="smaller-text" style="border: 1px solid black; padding: 8px; text-align: center;">
                                    {{ $mantenimiento->costo }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Firmas -->
        <div class="firmas" style="page-break-inside: avoid;">
            <div class="firma" style="display: inline-block; margin-right: 20px; vertical-align: top;">
                <div class="signature-space" style="height: 50px; border-bottom: 1px solid #000;"></div>
                <p class="firma-nombre">{{ $equipo->empleado->nombre }} {{ $equipo->empleado->apellido_paterno }} {{ $equipo->empleado->apellido_materno }}</p>
                <p class="firma-nombre">(RESPONSABLE)</p>
            </div>
            <div class="firma" style="display: inline-block; margin-left: 20px; vertical-align: top;">
                <div class="signature-space" style="height: 50px; border-bottom: 1px solid #000;"></div>
                <p class="firma-nombre">JOSÉ GUADALUPE ACOSTA GÓMEZ</p>
                <p class="firma-nombre">(JEFE DEL DPTO. DE SISTEMAS)</p>
            </div>
        </div>
    </div>
</body>
</html>
