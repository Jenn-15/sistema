<div class="p-10">
    <div class="text-right">
        <a href="{{ route('empleados.index', $empleado->id) }}" type="button"
            class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
            <svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 24 24">
                <path d="M19 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H19v-2z" />
            </svg> Regresar
        </a>
    </div>
    <h3 class="font-bold text-3xl text-gray-800 my-3">
        INFORMACIÓN DEL EMPLEADO
    </h3>
    <div class="bg-gray-200 p-4 my-10">
        <p class="font-bold text-sm uppercase text-gray-800 my-3">NÚMEERO DE EMPLEADO:
            <span class="normal-case font-normal">{{ $empleado->numeroT }} </span>
        </p>

        <p class="font-bold text-sm uppercase text-gray-800 my-3">NOMBRE(S):
            <span class="normal-case font-normal">{{ $empleado->nombre }} </span>
        </p>

        <p class="font-bold text-sm uppercase text-gray-800 my-3">APELLIDO PATERNO:
            <span class="normal-case font-normal">{{ $empleado->apellido_paterno }} </span>
        </p>

        <p class="font-bold text-sm uppercase text-gray-800 my-3">APELLIDO MATERNO:
            <span class="normal-case font-normal">{{ $empleado->apellido_materno }} </span>
        </p>

        <p class="font-bold text-sm uppercase text-gray-800 my-3">ÁREA DE TRABAJO:
            <span class="normal-case font-normal">{{ $empleado->area->area }} </span>
        </p>

        <p class="font-bold text-sm uppercase text-gray-800 my-3">CARGO:
            <span class="normal-case font-normal">{{ $empleado->cargo }} </span>
        </p>
    </div>

    @guest
        <div class="mt-5 bg-gray-50 border border-dashed p-5 text-center">
            <p>
                PARA REGISTRAR UN EMPLEADO, DEBE TENER UNA CUENTA.
            </p>
        </div>
    @endguest
</div>
