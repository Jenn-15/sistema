<!--BUSQUEDA- RESGUARDO POR AREA-EMPLEADO, FUNCIONA PARA BUSCAR POR AMBOS TERMINOS O SOLO
    ELIJIENDO AL EMPLEADO-->

    

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
    
    <div class="content">
    @if ($equipos->isNotEmpty())
        @php
            // Crear un array para contar los números de inventario
            $inventariosCount = [];
            foreach ($equipos as $equipo) {
                if (!isset($inventariosCount[$equipo->numero_inventario])) {
                    $inventariosCount[$equipo->numero_inventario] = [
                        'count' => 0,
                        'equipo' => $equipo,
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
                    <th class="smaller-text" style="border: 1px solid black; padding: 8px;">OBSERVACIONES</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($inventariosCount as $inventario => $details)
                    <tr>
                        <td class="smaller-text" style="border: 1px solid black; padding: 8px; text-align: center;">
                            {{ $inventario }}</td>
                        <td class="smaller-text" style="border: 1px solid black; padding: 6px; text-align: center;">
                            {{ $details['count'] }}</td>
                        <td class="smaller-text" style="border: 1px solid black; padding: 8px;">
                            {{ $details['equipo']->descripcion }}</td>
                        <td class="smaller-text" style="border: 1px solid black; padding: 8px; text-align: center;">
                            {{ $details['equipo']->marca->marca }}</td>
                        <td class="smaller-text" style="border: 1px solid black; padding: 8px; text-align: center;">
                            {{ $details['equipo']->modelo }}</td>
                        <td class="smaller-text" style="border: 1px solid black; padding: 8px; text-align: center;">
                            {{ $details['equipo']->serie }}</td>
                        <td class="smaller-text" style="border: 1px solid black; padding: 8px; text-align: center;">
                            {{ $details['equipo']->observacion }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table> 

        <p class="text-black my-1 smaller-text">DEPARTAMENTO SOLICITANTE:
            <span class="text-black my-1">{{ $responsable->area->area }}.</span>
        </p>

        <p class="text-black my-1 smaller-text" style="flex: 1;">
            FECHA DE ENTREGA:____________________________
        </p>
        
    @else
        <p class="text-black my-1 smaller-text">NO HAY EQUIPOS ASIGNADOS AL C. {{ $responsable->nombre }}
            {{ $responsable->apellido_paterno }} {{ $responsable->apellido_materno }}.</p>
    @endif
</div>

<br>
<!-- FIRMAS -->
<div class="signature-container" style="text-align: center;">
    <div class="footer-signatures" style="display: inline-block; width: 100%;">
        <!-- Columna izquierda -->
        <div style="display: inline-block; width: 45%; text-align: left;">
            <div class="firma">
                <p class="firma-nombre bold-text">RECIBE</p>
                <p class="firma-puesto smaller-text normal-text">
                    {{ $responsable->nombre }} {{ $responsable->apellido_paterno }} {{ $responsable->apellido_materno }}
                    <span style="display: block; border-bottom: 1px solid black; width: 100%; margin-top: -10px;"></span>
                </p>
                <p class="firma-puesto smaller-text normal-text">(NOMBRE Y FIRMA)</p>
            </div>
        </div>
        <!-- Columna derecha -->
        <div style="display: inline-block; width: 45%; text-align: left;">
            <div class="firma">
                <p class="firma-nombre bold-text">ENTREGA</p>
                <div class="signature-space smaller-text normal-text" style="border-bottom: 1px solid black; width: 100%; margin: 10px 0;"></div>
                <p class="firma-puesto smaller-text normal-text">(NOMBRE Y FIRMA)</p>
            </div>
        </div>
    </div>
</div>

        <div class="clear"></div>
    </div>
</div>


