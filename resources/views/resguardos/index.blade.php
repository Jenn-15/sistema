<!-- resources/views/resguardos/index.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Resguardos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-wrap justify-between">

            <!-- RESGUARDO POR EQUIPO -->
            <div class="w-full text-center sm:w-auto mb-4 sm:mb-0">
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="{{ route('resguardos.equipo') }}">
                        <img class="h-25 w-auto" src="{{ asset('img/equipos.jpg') }}" alt="Logo de la Empresa">
                    </a>
                    <div class="p-5">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-black dark:text-white">RESGUARDO</h5>
                        <p class="mb-2 font-extrabold tracking-tight text-gray-500 dark:text-white">POR EQUIPO</p>
                        <a href="{{ route('resguardos.equipo') }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                            MOSTRAR
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- RESGUARDO POR ÁREA  Y EMPLEADO-->
            <div class="w-full text-center sm:w-auto mb-4 sm:mb-0">
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="{{ route('resguardos.area') }}">
                        <img class="h-25 w-auto" src="{{ asset('img/trabajo.jpg') }}" alt="Logo de la Empresa">
                    </a>
                    <div class="p-3">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-black dark:text-white">RESGUARDO</h5>
                        <p class="mb-2 font-extrabold tracking-tight text-gray-500 dark:text-white">ÁREA/EMPLEADO</p>
                        <a href="{{ route('resguardos.area') }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                            MOSTRAR
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- RESGUARDO POR TOTAL -->
            <div class="w-full text-center sm:w-auto mb-4 sm:mb-0">
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="{{ route('resguardos.total') }}">
                        <img class="h-25 w-auto" src="{{ asset('img/general.jpg') }}" alt="Logo de la Empresa">
                    </a>
                    <div class="p-5">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-black dark:text-white">RESGUARDO GENERAL</h5>
                        <p class="mb-2 font-extrabold tracking-tight text-gray-500 dark:text-white">TODOS LOS EQUIPOS</p>
                        <a href="{{ route('resguardos.total') }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                            MOSTRAR
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
