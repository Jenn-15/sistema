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
            FORMATO DE SOLICITUD DE SERVICIOS INFORMATICOS
        </p>
    </div>

    <div style="margin-top: 30px;"></div> <!-- Ajusta el valor según necesites -->

    <div style="text-align: right;">
        <p class="bold-text uppercase text-gray-800 my-3 smaller-text">FECHA DE SOLICITUD
            <span class="normal-case normal-text">{{ \Carbon\Carbon::parse($servicio->fecha_solicitud)->format('d-m-Y') }} </span>
        </p>
        <p class="bold-text uppercase text-gray-800 my-3 smaller-text">FECHA DE SERVICIO: ___________</p>
    </div>

    <div style="margin-top: 30px;"></div> <!-- Ajusta el valor según necesites -->
    
    <div class="content">
        <!-- Información del Equipo -->
        <div class="md:grid md:grid-cols-2 bg-gray-200 p-4 my-10 smaller-text">
            <p class="bold-text uppercase text-gray-800 my-3">ÁREA QUE SOLICITA:
                <span class="normal-case normal-text">{{ $servicio->area->area }} </span>
            </p>
            <p class="bold-text uppercase text-gray-800 my-3">DESCRIPCIÓN DEL PROBLEMA:
                <span class="normal-case normal-text">{{ $servicio->descripcionProblema }} </span>
            </p>
            <p class="bold-text uppercase text-gray-800 my-3">OBSERVACIONES/DIAGNOSTICO:
                <span class="normal-case normal-text">{{ $servicio->diagnostico }} </span>
            </p>


            <!-- Firmas -->
            <div class="firmas" style="page-break-inside: avoid; text-align: center;">
                <div class="firma" style="display: inline-block; margin-right: 20px;">
                    <div class="signature-space" style="height: 50px;"></div>
                    <p class="firma-nombre">{{ $servicio->tecnico }} </p>
                    <p class="firma-nombre">(REALIZO SERVICIO)</p>
                </div>
            </div>

            <div class="firmas" style="page-break-inside: avoid; text-align: center;">
                <div class="firma" style="display: inline-block; margin-right: 20px;">
                    <div class="signature-space" style="height: 50px;"></div>
                    <p class="firma-nombre">{{ $servicio->autoriza }} </p>
                    <p class="firma-nombre">(FIRMA DE AUTORIZACION)</p>
                </div>
                <div class="firma" style="display: inline-block; margin-left: 20px;">
                    <div class="signature-space" style="height: 50px;"></div>
                    <p class="firma-nombre">{{ $servicio->empleado->nombre }}
                        {{ $servicio->empleado->apellido_paterno }} {{ $servicio->empleado->apellido_materno }}</p>
                    <p class="firma-nombre">(FIRMA DEL SOLICITANTE)</p>
                </div>
            </div>
        </div>
    </div>
</div>
