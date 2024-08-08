<div>
    <div>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div>
                <h1 class="text-center text-2xl text-gray-700 font-extrabold mb-5">EMPLEADOS</h1>
                <!-- Formulario de búsqueda -->
                <form wire:submit.prevent="buscar" class="text-center mb-4">
                    <!-- Campo de búsqueda -->
                    <input wire:model="search" type="text" placeholder="Buscar por términos"
                        class="mb-4 px-4 py-2 rounded-lg border-gray-300 focus:outline-none  focus:border-red-400">
                    <!-- Botón de búsqueda -->
                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg">
                        Buscar</button>
                </form>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-center rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-black uppercase bg-gray-400 dark:bg-gray-700 dark:text-gray-500">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                <a href="#" wire:click.prevent="sortBy('nombre')">
                                    Nombre(s)
                                    @if ($sortField === 'nombre')
                                        <span>{!! $sortDirection === 'asc' ? '&#9650;' : '&#9660;' !!}</span>
                                    @endif
                                </a>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <a href="#" wire:click.prevent="sortBy('apellido_paterno')">
                                    Apellido Paterno
                                    @if ($sortField === 'apellido_paterno')
                                        <span>{!! $sortDirection === 'asc' ? '&#9650;' : '&#9660;' !!}</span>
                                    @endif
                                </a>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <a href="#" wire:click.prevent="sortBy('apellido_materno')">
                                    Apellido Materno
                                    @if ($sortField === 'apellido_materno')
                                        <span>{!! $sortDirection === 'asc' ? '&#9650;' : '&#9660;' !!}</span>
                                    @endif
                                </a>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <a href="#" wire:click.prevent="sortBy('cargo')">
                                    Cargo
                                    @if ($sortField === 'cargo')
                                        <span>{!! $sortDirection === 'asc' ? '&#9650;' : '&#9660;' !!}</span>
                                    @endif
                                </a>
                            </th>
                            <th scope="col" class="px-6 py-3">Acción</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @forelse ($empleados as $empleado)
                            <tr class="bg-gray-50 border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4">{{ $empleado->nombre }}</td>
                                <td class="px-6 py-4">{{ $empleado->apellido_paterno }}</td>
                                <td class="px-6 py-4">{{ $empleado->apellido_materno }}</td>
                                <td class="px-6 py-4">{{ $empleado->cargo }}</td>
                                <td>
                                    <a href="{{ route('empleados.show', $empleado->id) }}"
                                        class="font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12 4.5C7.305 4.5 3.246 7.273 1 12c2.246 4.727 6.305 7.5 11 7.5s8.754-2.773 11-7.5c-2.246-4.727-6.305-7.5-11-7.5zm0 13c-3.125 0-5.667-2.55-5.667-5.667 0-3.125 2.542-5.667 5.667-5.667 3.125 0 5.667 2.542 5.667 5.667 0 3.117-2.542 5.667-5.667 5.667zm0-9.334A3.668 3.668 0 0 0 8.333 12 3.668 3.668 0 0 0 12 15.667 3.668 3.668 0 0 0 15.667 12 3.668 3.668 0 0 0 12 8.166z"
                                                fill="#1C2833 " />
                                        </svg>
                                    </a>

                                    <a href="{{ route('empleados.edit', $empleado->id) }}"
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

                                    <button wire:click="$dispatch('mostrarAlerta', {{ $empleado->id }})" type="button"
                                        class="font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2h5a1 1 0 0 1 0 2h-1v12a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V8H3a1 1 0 0 1 0-2h5Zm2 0h4V4h-4v2Zm0 4v8m4-8v8"
                                                stroke="#E74C3C " stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="p-3 text-center text-sm text-gray-600">
                                    NO HAY NADA QUE MOSTRAR.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="flex flex-col md:flex-row items-stretch gap-3 mt-5 md:mt-0 p-3">
            <a href="{{ route('empleados.create') }}"
                class="bg-red-600 p-20 py-3 px-6 rounded-lg text-white text-xs text-center font-bold uppercase">
                Nuevo </a>

                <a> {{ $empleados->links() }} </a> <!-- Controles de paginación -->
        </div>
    </div>
</div>
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        Livewire.on('mostrarAlerta', empleadoId => {
            Swal.fire({
                title: '¿Eliminar registro?',
                text: "¡Esta acción no se podrá revertir!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, ¡Eliminar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {

                    //Elimiar desde el servidor
                    @this.call('eliminarEmpleado', {
                        empleadoId
                    })

                    Swal.fire(
                        'Eliminado!',
                        'El registro se ha eliminado.',
                        'success'
                    )
                }
            })
        })
    </script>
@endpush
