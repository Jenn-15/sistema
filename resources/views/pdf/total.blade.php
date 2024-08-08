<!--BUSQUEDA- RESGUARDO GENEARL DE TODOS LOS EQUIPOS EXISTENTES EN EL SISTEMA-->

<link rel="stylesheet" href="{{ public_path('css/styles.css') }}"> 

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
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr>
                    <th class="smaller-text" style="border: 1px solid black; padding: 8px;">No. INVENTARIO</th>
                    <th class="smaller-text" style="border: 1px solid black; padding: 8px;">CANT.</th>
                    <th class="smaller-text" style="border: 1px solid black; padding: 8px;">DESCRIPCIÓN</th>
                    <th class="smaller-text" style="border: 1px solid black; padding: 8px;">MARCA</th>
                    <th class="smaller-text" style="border: 1px solid black; padding: 8px;">MODELO</th>
                    <th class="smaller-text" style="border: 1px solid black; padding: 8px;">No. DE SERIE</th>
                    <th class="smaller-text" style="border: 1px solid black; padding: 8px;">RESPONSABLE</th>
                    <th class="smaller-text" style="border: 1px solid black; padding: 8px;">FECHA DE RESGUARDO</th>
                    <th class="smaller-text" style="border: 1px solid black; padding: 8px;">OBSERVACIONES</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($equipos as $equipo)
                    <tr>
                        <td class="smaller-text" style="border: 1px solid black; padding: 8px; text-align: center;">
                            {{ $equipo->numero_inventario }}</td>
                        <td class="smaller-text" style="border: 1px solid black; padding: 8px; text-align: center;">1
                        </td>
                        <td class="smaller-text" style="border: 1px solid black; padding: 8px; text-align: center;">
                            {{ $equipo->descripcion }}</td>
                        <td class="smaller-text" style="border: 1px solid black; padding: 8px; text-align: center;">
                            {{ $equipo->marca->marca }}</td>
                        <td class="smaller-text" style="border: 1px solid black; padding: 8px; text-align: center;">
                            {{ $equipo->modelo }}</td>
                        <td class="smaller-text" style="border: 1px solid black; padding: 8px; text-align: center;">
                            {{ $equipo->serie }}</td>
                        <td class="smaller-text" style="border: 1px solid black; padding: 8px; text-align: center;">
                            {{ $equipo->empleado->nombre }} {{ $equipo->empleado->apellido_paterno }}
                            {{ $equipo->empleado->apellido_materno }}</td>
                        <td class="smaller-text" style="border: 1px solid black; padding: 8px; text-align: center;">
                            {{ $equipo->fecha_resguardo }}</td>
                        <td class="smaller-text" style="border: 1px solid black; padding: 8px; text-align: center;">
                            {{$equipo->observacion}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
    @endif
</div>


<div class="signature-container">
    <div class="footer-signatures">
        <!-- Columna izquierda -->
        <div style="float: left; width: 45%;">
            <div class="firma">
                <p class="firma-nombre smaller-text bold-text">RECIBE</p>
                <div class="signature-space smaller-text normal-text"
                    style="border-bottom: 1px solid black; width: 100%; margin: 10px 0;"></div>
                <p class="firma-puesto smaller-text normal-text">(NOMBRE Y FIRMA)</p>
            </div>
        </div>
        <!-- Columna derecha -->
        <div style="float: right; width: 45%;">
            <div class="firma">
                <p class="firma-nombre smaller-text bold-text">ENTREGA</p>
                <div class="signature-space smaller-text normal-text"
                    style="border-bottom: 1px solid black; width: 100%; margin: 10px 0;"></div>
                <p class="firma-puesto smaller-text normal-text">(NOMBRE Y FIRMA)</p>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
