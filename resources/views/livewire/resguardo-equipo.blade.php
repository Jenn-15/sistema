<!-- resources/views/livewire/resguardo-equipo.blade.php -->
<div>
    <div class="p-6 bg-white border-b border-gray-200">
        <!-- Formulario para buscar por términos -->
        <form wire:submit.prevent="submit">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="searchTerm" class="block text-sm font-medium text-gray-700">Buscar por términos</label>
                    <input wire:model="searchTerm" id="searchTerm" name="searchTerm"
                           class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm"
                           placeholder="Ingrese término de búsqueda">
                </div>
            </div>
            <button type="submit"
                    class="mt-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-gray-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                Buscar Equipos
            </button>
        </form>
        
        <!-- Mostrar los equipos según el número de inventario seleccionado -->
        @if ($equipos)
            <h3 class="mt-6 text-lg font-medium text-gray-900">REGISTRO RELACIONADO CON LA BUSQUEDA</h3>
            <div class="overflow-x-auto mt-2">
                <table class="min-w-full bg-white border-gray-200 divide-y divide-gray-200 shadow-md rounded-lg overflow-hidden">
                    <thead class="bg-gray-300 dark:bg-gray-700">
                        <tr>
                            <th scope="col" class="px-6 text-center py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">No. Inventario</th>
                            <th scope="col" class="px-6 text-center py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Marca</th>
                            <th scope="col" class="px-6 text-center py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Modelo</th>
                            <th scope="col" class="px-6 text-center py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Serie</th>
                            <th scope="col" class="px-6 text-center py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Resguardo</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse ($equipos as $equipo)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                                <td class="px-6 text-center py-4 whitespace-nowrap">{{ $equipo->numero_inventario }}</td>
                                <td class="px-6 text-center py-4 whitespace-nowrap">{{ $equipo->marca->marca }}</td>
                                <td class="px-6 text-center py-4 whitespace-nowrap">{{ $equipo->modelo }}</td>
                                <td class="px-6 text-center py-4 whitespace-nowrap">{{ $equipo->serie }}</td>
                                <td class="px-6 text-center py-4 whitespace-nowrap">{{ $equipo->fecha_resguardo }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-4 text-sm font-medium text-gray-500 text-center">NO HA REALIZADO ALGUNA BUSQUEDA RELACIONADA O NO EXISTE NINGÚN REGISTRO.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!-- Botón para generar PDF -->
            <form wire:submit.prevent="generatePDF">
                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-red-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                    <svg class="w-6 h-6 text-gray-100 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M9 2.221V7H4.221a2 2 0 0 1 .365-.5L8.5 2.586A2 2 0 0 1 9 2.22ZM11 2v5a2 2 0 0 1-2 2H4a2 2 0 0 0-2 2v7a2 2 0 0 0 2 2 2 2 0 0 0 2 2h12a2 2 0 0 0 2-2 2 2 0 0 0 2-2v-7a2 2 0 0 0-2-2V4a2 2 0 0 0-2-2h-7Zm-6 9a1 1 0 0 0-1 1v5a1 1 0 1 0 2 0v-1h.5a2.5 2.5 0 0 0 0-5H5Zm1.5 3H6v-1h.5a.5.5 0 0 1 0 1Zm4.5-3a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h1.376A2.626 2.626 0 0 0 15 15.375v-1.75A2.626 2.626 0 0 0 12.375 11H11Zm1 5v-3h.375a.626.626 0 0 1 .625.626v1.748a.625.625 0 0 1-.626.626H12Zm5-5a1 1 0 0 0-1 1v5a1 1 0 1 0 2 0v-1h1a1 1 0 1 0 0-2h-1v-1h1a1 1 0 1 0 0-2h-2Z" clip-rule="evenodd"/>
                    </svg>DESCARGAR
                </button>
            </form>
        @endif
    </div>
</div>
