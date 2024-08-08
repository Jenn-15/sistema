<!-- PDF EN CASO DE SOLO BUSCAR POR AREA-->

<link rel="stylesheet" href="{{ public_path('css/styles.css') }}"> <!-- Vincula tu archivo CSS externo -->

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
    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th class="smaller-text" style="border: 1px solid black; padding: 8px;">No. INVENTARIO</th>
                <th class="smaller-text" style="border: 1px solid black; padding: 6px;">CANT.</th>
                <th class="smaller-text" style="border: 1px solid black; padding: 8px;">DESCRIPCIÓN</th>
                <th class="smaller-text" style="border: 1px solid black; padding: 8px;">MARCA</th>
                <th class="smaller-text" style="border: 1px solid black; padding: 8px;">MODELO</th>
                <th class="smaller-text" style="border: 1px solid black; padding: 8px;">No. DE SERIE</th>
                <th class="smaller-text" style="border: 1px solid black; padding: 8px;">RESPONSABLE</th>
                <th class="smaller-text" style="border: 1px solid black; padding: 8px;">FECHA RESGUARDO</th>
                <th class="smaller-text" style="border: 1px solid black; padding: 8px;">OBSERVACIONES</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($equipos as $equipo)
                <tr>
                    <td class="smaller-text" style="border: 1px solid black; padding: 8px; text-align: center;">{{ $equipo->numero_inventario }}</td>
                    <td class="smaller-text" style="border: 1px solid black; padding: 6px; text-align: center;">1</td>
                    <td class="smaller-text" style="border: 1px solid black; padding: 8px;">{{ $equipo->descripcion }}</td>
                    <td class="smaller-text" style="border: 1px solid black; padding: 8px; text-align: center;">{{ $equipo->marca->marca }}</td>
                    <td class="smaller-text" style="border: 1px solid black; padding: 8px; text-align: center;">{{ $equipo->modelo }}</td>
                    <td class="smaller-text" style="border: 1px solid black; padding: 8px; text-align: center;">{{ $equipo->serie }}</td>
                    <td class="smaller-text" style="border: 1px solid black; padding: 8px; text-align: center;">{{ $equipo->empleado->nombre }} 
                        {{ $equipo->empleado->apellido_paterno }} {{ $equipo->empleado->apellido_materno }} </td>
                    <td class="smaller-text" style="border: 1px solid black; padding: 8px; text-align: center;">{{ $equipo->fecha_resguardo }}</td>
                    <td class="smaller-text" style="border: 1px solid black; padding: 8px; text-align: center;">{{ $equipo->observacion }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p class="text-black my-1 smaller-text">DEPARTAMENTO SOLICITANTE:
        <span class="text-black my-1">{{ $area->area }}</span>
    </p>

    <p class="firma-nombre normal-text p-5" style="margin-bottom: 10px;">
        FECHA DE ENTREGA:_____________________________
    </p>
</div>

<br>
<!-- FIRMAS -->
<div class="signature-container" style="text-align: center;">
    <div class="footer-signatures" style="display: inline-block; width: 100%;">
        <!-- Columna izquierda -->
        <div style="display: inline-block; width: 45%; text-align: left;">
            <div class="firma">
                <p class="firma-nombre bold-text">RECIBE</p>
                <<div class="signature-space smaller-text normal-text" style="border-bottom: 1px solid black; width: 100%; margin: 10px 0;"></div>
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


