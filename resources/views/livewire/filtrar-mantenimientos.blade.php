<div class="bg-gray-100 py-10">
    <h1 class="text-2xl md:text-2xl text-gray-600 text-center font-extrabold my-5">BÚSCAR Y FILTRAR MANTENIMIENTOS</h1>

    <div class="max-w-7xl mx-auto">
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

        <!-- Mostrar siempre la tabla, incluso si no hay resultados -->
        <div class="mt-8">
            <h2 class="text-lg font-bold mb-4">Resultados:</h2>
            <table class="min-w-full bg-white">
                <thead class="bg-gray-200 text-white">
                    <tr>
                        <th scope="col" class="px-6 text-center py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">
                            No.Inventario
                        </th>
                        <th scope="col" class="px-6 text-center py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">
                            Categoria
                        </th>
                        <th scope="col" class="px-6 text-center py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">
                            Ubicacion
                        </th>
                        <th scope="col" class="px-6 text-center py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">
                            Descarga
                        </th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @forelse ($equipos as $equipo)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                            <td class="px-6 text-center py-4 whitespace-nowrap">{{ $equipo->numero_inventario }}</td>
                            <td class="px-6 text-center py-4 whitespace-nowrap">{{ $equipo->categoria->categoria }}</td>
                            <td class="px-6 text-center py-4 whitespace-nowrap">{{ $equipo->area->area }}</td>
                            <td class="px-6 text-center py-4 whitespace-nowrap">
                                <button wire:click="generatePDF({{ $equipo->id }})"
                                    class="font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" stroke="#E74C3C"
                                        fill="currentColor" class="bi bi-file-earmark-pdf" viewBox="0 0 16 16">
                                        <path
                                            d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z" />
                                        <path
                                            d="M4.603 14.087a.8.8 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.7 7.7 0 0 1 1.482-.645 20 20 0 0 0 1.062-2.227 7.3 7.3 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.188-.012.396-.047.614-.084.51-.27 1.134-.52 1.794a11 11 0 0 0 .98 1.686 5.8 5.8 0 0 1 1.334.05c.364.066.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.86.86 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.7 5.7 0 0 1-.911-.95 11.7 11.7 0 0 0-1.997.406 11.3 11.3 0 0 1-1.02 1.51c-.292.35-.609.656-.927.787a.8.8 0 0 1-.58.029z" />
                                        <path
                                            d="M8 10.781l2.116 2.54a.5.5 0 0 0 .768-.641L8.651 10l2.233-2.68a.5.5 0 0 0-.768-.64L8 9.219l-2.116-2.54a.5.5 0 0 0-.768.64L7.349 10l-2.233 2.68a.5.5 0 0 0 .768.64L8 10.781z" />
                                    </svg>
                                </button>
                                <button wire:click="generateExcel({{ $equipo->id }})"
                                    class="font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" stroke="#4BB543"
                                        fill="currentColor" class="bi bi-file-earmark-excel" viewBox="0 0 16 16">
                                        <path
                                            d="M5.884 6.68a.5.5 0 0 1 .683.205l1.933 3.346 1.933-3.346a.5.5 0 0 1 .88.478l-2.52 4.37 2.52 4.37a.5.5 0 1 1-.88.478L8.5 12.557 6.567 14.91a.5.5 0 0 1-.88-.478l2.52-4.37-2.52-4.37a.5.5 0 0 1 .205-.683z" />
                                        <path
                                            d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z" />
                                    </svg>
                                </button>
                            </td> 
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-4">No hay resultados disponibles.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
