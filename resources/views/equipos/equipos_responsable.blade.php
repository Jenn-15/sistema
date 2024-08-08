<link rel="stylesheet" href="css/styles.css"> <!-- Vincula tu archivo CSS externo -->

<div class="header">
    <div class="header-center">
        <img class="h-25 w-auto" src="{{ public_path('img/cmic_tabasco.png') }}" alt="Logo de la Empresa">
    </div>

    <div class="header-center text-center">
        <p class="text-black smaller-text bold-text">
            CÁMARA MEXICANA DE LA INDUSTRIA DE LA CONSTRUCCIÓN
        </p>

        <p class="text-black my-1 smaller-text normal-text">
            FORMATO DE RESGUARDO DE EQUIPOS DE COMPUTO Y ACCESORIOS
        </p>
    </div>
</div>

<div class="content">
    @if ($equipos->isNotEmpty())
        @php
            // Crear un array para contar los números de inventario
            $inventariosCount = [];
            foreach ($equipos as $equipo) {
                if (!isset($inventariosCount[$equipo->numero_inventario])) {
                    $inventariosCount[$equipo->numero_inventario] = [
                        'count' => 0,
                        'equipo'=> $equipo
                    ];
                }
                $inventariosCount[$equipo->numero_inventario]['count']++;
            }
        @endphp

        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr>
                    <th class="smaller-text" style="border: 1px solid black; padding: 8px;">No. INVENTARIO</th>
                    <th class="smaller-text" style="border: 1px solid black; padding: 6px;">CANT.</th>
                    <th class="smaller-text" style="border: 1px solid black; padding: 8px;">DESCRIPCIÓN</th>
                    <th class="smaller-text" style="border: 1px solid black; padding: 8px;">MARCA</th>
                    <th class="smaller-text" style="border: 1px solid black; padding: 8px;">MODELO</th>
                    <th class="smaller-text" style="border: 1px solid black; padding: 8px;">No. DE SERIE</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($inventariosCount as $inventario => $details)
                    <tr>
                        <td class="smaller-text" style="border: 1px solid black; padding: 8px; text-align: center;">{{ $inventario }}</td>
                        <td class="smaller-text" style="border: 1px solid black; padding: 6px; text-align: center;">{{ $details['count'] }}</td>
                        <td class="smaller-text" style="border: 1px solid black; padding: 8px;">{{ $details['equipo']->descripcion }}</td>
                        <td class="smaller-text" style="border: 1px solid black; padding: 8px; text-align: center;">{{ $details['equipo']->marca->marca }}</td>
                        <td class="smaller-text" style="border: 1px solid black; padding: 8px; text-align: center;">{{ $details['equipo']->modelo }}</td>
                        <td class="smaller-text" style="border: 1px solid black; padding: 8px; text-align: center;">{{ $details['equipo']->serie }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <p class="text-black my-1 smaller-text">DEPARTAMENTO SOLICITANTE:
            <span class="text-black my-1">{{ $responsable->area->area }}.</span>
        </p>
    @else
        <p class="text-black my-1 smaller-text">NO HAY EQUIPOS ASIGNADOS AL C. {{ $responsable->nombre }} {{ $responsable->apellido_paterno }} {{ $responsable->apellido_materno }}.</p>
    @endif
</div>

<!-- Firmas *agregar position: fixed; bottom: 0; left: 0; en caso de que se requiera que las firmas esten hasta abajo-->
<div class="signature-container">
    <div class="footer-signatures">
        <!-- Columna izquierda -->
        <div style="float: left; width: 45%;">
            <div class="firma">
                <p class="text-black my-1 smaller-text bold-text" style="flex: 1;">
                    FECHA DE ENTREGA:
                    <p class="firma-puesto smaller-text firma-puesto normal-case font-normal normal-text">
                        {{ $equipos->isNotEmpty() ? Carbon\Carbon::parse($equipos->first()->fecha_resguardo)->translatedFormat('d F Y') : '' }}
                        <span style="display: block; border-bottom: 1px solid black; width: 100%; margin-top: -10px;"></span>
                    </p>
                </p>
                <br>
                <p class="firma-nombre smaller-text normal-text">ENTREGA</p>
                <div class="signature-space smaller-text normal-text" style="border-bottom: 1px solid black; width: 100%; margin: 10px 0;"></div>
                <p class="firma-puesto smaller-text normal-text">(NOMBRE Y FIRMA)</p>
            </div>
            <div class="firma">
                <p class="firma-nombre smaller-text normal-text">RECIBE</p>
                <p class="firma-puesto smaller-text normal-text">
                    {{ $responsable->nombre }} {{ $responsable->apellido_paterno }} {{ $responsable->apellido_materno }}
                    <span style="display: block; border-bottom: 1px solid black; width: 100%; margin-top: -10px;"></span>
                </p>
                <p class="firma-puesto smaller-text normal-text">(NOMBRE Y FIRMA)</p>
            </div>
        </div>
        <!-- Columna derecha -->
        <div style="float: right; width: 45%;">
            <div class="firma">
                <p class="firma-nombre smaller-text bold-text p-5" style="margin-bottom: 10px;">FECHA DE DEVOLUCIÓN</p>
                <p class="normal-case font-normal normal-text signature-space smaller-text" style="margin-bottom: 10px; border-bottom: 1px solid black; width: 100%; margin: 10px 0;"></p>
                <br>
                <p class="firma-nombre smaller-text normal-text">ENTREGA</p>
                <div class="signature-space smaller-text normal-text" style="border-bottom: 1px solid black; width: 100%; margin: 10px 0;"></div>
                <p class="firma-puesto smaller-text normal-text">(NOMBRE Y FIRMA)</p>
            </div>
            <div class="firma">
                <p class="firma-nombre smaller-text normal-text">RECIBE</p>
                <div class="signature-space smaller-text normal-text" style="border-bottom: 1px solid black; width: 100%; margin: 10px 0;"></div>
                <p class="firma-puesto smaller-text normal-text">(NOMBRE Y FIRMA)</p>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
