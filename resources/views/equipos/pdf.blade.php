<link rel="stylesheet" href="css/styles.css"> <!-- Vincula tu archivo CSS externo -->
<div class="header">
    <div class="header-center">
        <img class="h-25 w-auto" src="{{ public_path('img/cmic_tabasco.png') }}" alt="Logo de la Empresa">
    </div><br>
    <div class="header-center text-center">
        <p class="text-black smaller-text bold-text">
            CÁMARA MEXICANA DE LA INDUSTRIA DE LA CONSTRUCCIÓN
        </p>

        <p class="text-black my-1 smaller-text normal-text">
            FORMATO DE RESGUARDO DE EQUIPOS DE CÓMPUTO Y ACCESORIOS
        </p>
    </div>
</div>

<div class="content">
    <div class="content">

            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr>
                        <th class="smaller-text" style="border: 1px solid black; padding: 8px;">CÓD.DE INVENTARIO</th>
                        <th class="smaller-text" style="border: 1px solid black; padding: 8px;">CANT.</th>
                        <th class="smaller-text" style="border: 1px solid black; padding: 8px;">DESCRIPCIÓN</th>
                        <th class="smaller-text" style="border: 1px solid black; padding: 8px;">MARCA</th>
                        <th class="smaller-text" style="border: 1px solid black; padding: 8px;">MODELO</th>
                        <th class="smaller-text" style="border: 1px solid black; padding: 8px;">No. DE SERIE</th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td class="smaller-text" style="border: 1px solid black; padding: 8px;">{{ $equipo->numero_inventario }}
                            <td style="border: 1px solid black; padding: 8px;">1</td>
                            <td style="border: 1px solid black; padding: 8px;">{{ $equipo->descripcion }}</td>
                            <td class="smaller-text" style="border: 1px solid black; padding: 8px;">{{ $equipo->marca->marca }}
                                <td class="smaller-text" style="border: 1px solid black; padding: 8px;">{{ $equipo->modelo }}
                                    <td class="smaller-text" style="border: 1px solid black; padding: 8px;">{{ $equipo->serie }}
                            </td>
                        </tr>
                </tbody>
            </table>

            <p class="text-black my-1 smaller-text">DEPARTAMENTO SOLICITANTE:
                <span class="text-black my-1">{{ $equipo->area->area }}.</span>
            </p>
    </div>

    
   <!-- Firmas *agregar position: fixed; bottom: 0; left: 0; en caso de que se requiera que las firmas esten hasta abajo-->
<div class="footer-signatures" style="margin-top: 20px; width: 100%; padding: 10px; text-align: center;">
    <!-- Columna izquierda -->
    <div style="float: left; width: 50%;">
        <div class="firma" style="width: 200px; margin-bottom: 60px; text-align: center;">
            <p class="text-black my-1 smaller-text bold-text" style="flex: 1;">
                FECHA DE ENTREGA:
                <p class="firma-puesto smaller-text firma-puesto normal-case font-normal normal-text">
                    {{ Carbon\Carbon::parse($equipo->fecha_resguardo)->translatedFormat('d F Y') }}
                    <span style="display: block; border-bottom: 1px solid black; width: 100%; margin-top: -10px;"></span>
                </p> 
            </p>
            <br>
            <p class="firma-nombre smaller-text normal-text">ENTREGA</p>
            <div class="signature-space smaller-text normal-text" style="border-bottom: 1px solid black; width: 100%; margin: 10px 0;"></div>
            <p class="firma-puesto smaller-text normal-text">(NOMBRE Y FIRMA)</p>
        </div>
        <div class="firma" style="width: 200px; text-align: center;">
            <p class="firma-nombre smaller-text normal-text">RECIBE</p>
            <p class="firma-puesto smaller-text normal-text">
                {{ $equipo->empleado->nombre }}
                {{ $equipo->empleado->apellido_paterno }} {{ $equipo->empleado->apellido_materno }} 
                <span style="display: block; border-bottom: 1px solid black; width: 100%; margin-top: -10px;"></span>
            </p>
            <p class="firma-puesto smaller-text normal-text">(NOMBRE Y FIRMA)</p>
        </div>
    </div>
    <!-- Columna derecha -->
    <div style="float: right;">
        <div class="firma" style="width: 200px; margin-bottom: 60px; text-align: center;">
            <p class="firma-nombre smaller-text bold-text p-5" style="margin-bottom: 10px;">FECHA DE DEVOLUCIÓN</p>
            <p class="normal-case font-normal normal-text signature-space smaller-text" style="margin-bottom: 10px; border-bottom: 1px solid black; width: 100%; margin: 10px 0;"></p>
            <br>
            
            <p class="firma-nombre smaller-text normal-text">ENTREGA</p>
            <div class="signature-space smaller-text normal-text" style="border-bottom: 1px solid black; width: 100%; margin: 10px 0;"></div>
            <p class="firma-puesto smaller-text normal-text">(NOMBRE Y FIRMA)</p>
        </div>
        <div class="firma" style="width: 200px; text-align: center;">
            <p class="firma-nombre smaller-text normal-text">RECIBE</p>
            <div class="signature-space smaller-text normal-text" style="border-bottom: 1px solid black; width: 100%; margin: 10px 0;"></div>
            <p class="firma-puesto smaller-text normal-text">(NOMBRE Y FIRMA)</p>
        </div>
    </div>
    <div style="clear: both;"></div>
</div>
