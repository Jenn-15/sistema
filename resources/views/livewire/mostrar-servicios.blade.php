<div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-center rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-black uppercase bg-gray-400 dark:bg-gray-700 dark:text-gray-500 smaller-text">
                <tr>
                    <th scope="col" class="px-3 py-3 smaller-text" style="min-width: 100px;">Área</th>
                    <th scope="col" class="px-6 py-3 smaller-text" style="min-width: 200px;">Descripción del Problema</th>
                    <th scope="col" class="px-6 py-3 smaller-text" style="min-width: 180px;">Solicitud</th>
                    <th scope="col" class="px-6 py-3 smaller-text" style="min-width: 180px;">Servicio</th>
                    <th scope="col" class="px-6 py-3 smaller-text" style="min-width: 180px;">Responsable</th>
                    <th scope="col" class="px-6 py-3 smaller-text" style="min-width: 150px;">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @forelse ($servicios as $servicio)
                    <tr class="bg-gray-50 border-b dark:bg-gray-800 dark:border-gray-700 smaller-text">
                        <td class="px-6 py-4 smaller-text">{{ $servicio->area->area }}</td>
                        <td class="px-6 py-4 smaller-text">{{ $servicio->descripcionProblema }}</td>
                        <td class="px-6 py-4 smaller-text">{{ $servicio->fecha_solicitud }}</td>
                        <td class="px-6 py-4 smaller-text">{{ $servicio->fecha_servicio }}</td>
                        <td class="px-6 py-4 smaller-text">
                            {{ $servicio->empleado->nombre }} {{ $servicio->empleado->apellido_paterno }} {{ $servicio->empleado->apellido_materno }}</td>
                        <td class="px-6 py-4">
                            <div class="flex flex-col sm:flex-row justify-center items-center gap-2">
                                <a href="{{ route('pdf.solicitudServicio', $servicio->id) }}" type="button"
                                    class="px-3 py-2 text-xs font-medium text-white focus:ring-4 focus:outline-none">
                                    <svg class="w-6 h-6 text-gray-400 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#FF0000" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M9 2.221V7H4.221a2 2 0 0 1 .365-.5L8.5 2.586A2 2 0 0 1 9 2.22ZM11 2v5a2 2 0 0 1-2 2H4a2 2 0 0 0-2 2v7a2 2 0 0 0 2 2 2 2 0 0 0 2 2h12a2 2 0 0 0 2-2 2 2 0 0 0 2-2v-7a2 2 0 0 0-2-2V4a2 2 0 0 0-2-2h-7Zm-6 9a1 1 0 0 0-1 1v5a1 1 0 1 0 2 0v-1h.5a2.5 2.5 0 0 0 0-5H5Zm1.5 3H6v-1h.5a.5.5 0 0 1 0 1Zm4.5-3a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h1.376A2.626 2.626 0 0 0 15 15.375v-1.75A2.626 2.626 0 0 0 12.375 11H11Zm1 5v-3h.375a.626.626 0 0 1 .625.626v1.748a.625.625 0 0 1-.626.626H12Zm5-5a1 1 0 0 0-1 1v5a1 1 0 1 0 2 0v-1h1a1 1 0 1 0 0-2h-1v-1h1a1 1 0 1 0 0-2h-2Z" clip-rule="evenodd"/>
                                    </svg>
                                </a>

                                <a href="{{ route('servicios.edit', $servicio->id) }}"
                                    class="font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 ">
                                    <svg class="w-[26px] h-[26px] text-blue-500 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                            d="M11.32 6.176H5c-1.105 0-2 .949-2 2.118v10.588C3 20.052 3.895 21 5 21h11c1.105 0 2-.948 2-2.118v-7.75l-3.914 4.144A2.46 2.46 0 0 1 12.81 16l-2.681.568c-1.75.37-3.292-1.263-2.942-3.115l.536-2.839c.097-.512.335-.983.684-1.352l2.914-3.086Z"
                                            clip-rule="evenodd" />
                                        <path fill-rule="evenodd"
                                            d="M19.846 4.318a2.148 2.148 0 0 0-.437-.692 2.014 2.014 0 0 0-.654-.463 1.92 1.92 0 0 0-1.544 0 2.014 2.014 0 0 0-.654.463l-.546.578 2.852 3.02.546-.579a2.14 2.14 0 0 0 .437-.692 2.244 2.244 0 0 0 0-1.635ZM17.45 8.721 14.597 5.7 9.82 10.76a.54.54 0 0 0-.137.27l-.536 2.84c-.07.37.239.696.588.622l2.682-.567a.492.492 0 0 0 .255-.145l4.778-5.06Z"
                                            clip-rule="evenodd" />
                                    </svg>

                                </a>

                                <button wire:click="$dispatch('mostrarAlerta', {{ $servicio->id }})" type="button"
                                    class="font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2h5a1 1 0 0 1 0 2h-1v12a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V8H3a1 1 0 0 1 0-2h5Zm2 0h4V4h-4v2Zm0 4v8m4-8v8"
                                            stroke="#E74C3C " stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" style="padding: 12px; text-align: center; font-weight: 300;">
                            No hay nada que mostrar.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <!-- Paginación en la parte inferior -->
    <div class="mt-4">
        {{ $servicios->links() }}
    </div>

    <div class="flex flex-col md:flex-row items-stretch gap-3 mt-5 md:mt-0 p-3">
        <a href="{{ route('servicios.create') }}"
            class="bg-red-600 p-20 py-3 px-6 rounded-lg text-white text-xs text-center font-bold uppercase">
            Nuevo
        </a>
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            Livewire.on('mostrarAlerta', servicioId => {
                Swal.fire({
                    title: '¿Eliminar solicitud?',
                    text: "¡Esta acción no se podrá revertir!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, ¡Eliminar!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        //Eliminar desde el servidor
                        @this.call('eliminarServicio', servicioId)

                        Swal.fire(
                            '¡Eliminado!',
                            'La solicitud del servicio se ha eliminado',
                            'success'
                        )
                    }
                })
            })
        </script>
    @endpush
</div>
