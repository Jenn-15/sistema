<div class="p-10 printable">
    <div class="text-right">
        <a href="{{ route('mantenimientos.index', $mantenimiento->id) }}" type="button"
            class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
            <svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 24 24">
                <path d="M19 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H19v-2z" />
            </svg> Regresar
        </a>
    </div>
    <h3 class="font-bold text-3xl text-gray-800 my-3">
        INFORMACIÓN DEL MANTENIMIENTO:
    </h3>

    <div class="md:grid md:grid-cols-2 bg-gray-200 p-4 my-10">
        <p class="font-bold text-sm uppercase text-gray-800 my-3">EQUIPO:
            <span class="normal-case font-normal">
                {{ $mantenimiento->equipo->serie }}-{{ $mantenimiento->equipo->marca->marca }}-{{ $mantenimiento->equipo->modelo}}
            </span>
            <br>
            <a class="font-medium text-sm uppercase text-gray-800 my-3">No.Iventario:
                <span class="normal-case font-normal">{{ $mantenimiento->equipo->numero_inventario }} </span>
            </a>
            <br>

            <a class="font-medium text-sm uppercase text-gray-800 my-3">RESPONSABLE:
                <span class="normal-case font-normal">
                    {{ $mantenimiento->equipo->empleado->nombre }}
                    {{ $mantenimiento->equipo->empleado->apellido_paterno }}
                    {{ $mantenimiento->equipo->empleado->apellido_materno }}
                </span>
            </a>
            <br>
            <a class="font-medium text-sm uppercase text-gray-800 my-3">UBICACIÓN:
                <span class="normal-case font-normal"> {{ $mantenimiento->equipo->area->area }} </span>
            </a>
        </p>
        <p class="font-bold text-sm uppercase text-gray-800 my-3">CATEGORIA DEL EQUIPO:
            <span class="normal-case font-normal">{{ $mantenimiento->equipo->categoria->categoria }} </span>
        </p>

        <p class="font-bold text-sm uppercase text-gray-800 my-3">TIPO DE MANTENIMIENTO:
            <span class="normal-case font-normal">{{ $mantenimiento->tipo->tipo }} </span>
        </p>
        
        <p class="font-bold text-sm uppercase text-gray-800 my-3">COSTO:
            <span class="normal-case font-normal">{{ $mantenimiento->costo }} </span>
        </p>

        <p class="font-bold text-sm uppercase text-gray-800 my-3">ÚLTIMO MANTENIMIENTO:
            <span
                class="normal-case font-normal">{{ Carbon\Carbon::parse($mantenimiento->fecha)->toFormattedDateString() }}
            </span>
        </p>
    </div>
    <div class="mb-2">
        <h2 class="text-2xl text-center text-slate-600 font-bold mb-5"> DETALLES DEL MANTENIMIENTO</h2>
        <div class="bg-gray-200 p-4 my-10">
            <!-- Utiliza <div> con CSS white-space para respetar los saltos de línea -->
            <div class="normal-case font-normal text-xs" style="white-space: pre-line;">{{ $mantenimiento->descripcion }}</div>
        </div>
    </div>

    @guest
        <div class="mt-5 bg-gray-50 border border-dashed p-5 text-center">
            <p>
                PARA REGISTRAR UN MANTENIMIENTO, DEBE CONTAR CON UNA CUENTA.
            </p>
        </div>
    @endguest
</div>