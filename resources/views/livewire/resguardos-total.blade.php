<!-- resources/views/livewire/resguardos-total.blade.php -->

<div>
    <h2 class="text-center font-extrabold text-2xl text-gray-800 leading-tight">
        TODOS LOS REGISTROS
    </h2>
    <div class="p-6 bg-white border-b border-gray-200">
        <!-- Formulario para buscar por término -->
        <form wire:submit.prevent="submit">
            <div>
                <label for="termino" class="block text-sm font-medium text-gray-700">Buscar por término</label>
                <input type="text" id="termino" name="termino" wire:model="termino"
                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm">
            </div>
            <button type="submit"
                class="mt-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-gray-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                MOSTRAR BUSQUEDA
            </button>
        </form>
    </div>
    <!-- Botones para generar PDF y Excel -->
    <div class="flex justify-start space-x-4 p-6 bg-white border-b border-gray-200">
        <form wire:submit.prevent="generatePDF">
            <button type="submit"
                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-red-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-pdf-fill" viewBox="0 0 16 16">
                    <path d="M5.523 10.424q.21-.124.459-.238a8 8 0 0 1-.45.606c-.28.337-.498.516-.635.572l-.035.012a.3.3 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548m2.455-1.647q-.178.037-.356.078a21 21 0 0 0 .5-1.05 12 12 0 0 0 .51.858q-.326.048-.654.114m2.525.939a4 4 0 0 1-.435-.41q.344.007.612.054c.317.057.466.147.518.209a.1.1 0 0 1 .026.064.44.44 0 0 1-.06.2.3.3 0 0 1-.094.124.1.1 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256M8.278 4.97c-.04.244-.108.524-.2.829a5 5 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.5.5 0 0 1 .145-.04c.013.03.028.092.032.198q.008.183-.038.465z"/>
                    <path fill-rule="evenodd" d="M4 0h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2m.165 11.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.6 11.6 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.86.86 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.84.84 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.8 5.8 0 0 0-1.335-.05 11 11 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.24 1.24 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.651.823-.073.34-.04.736.046 1.136.088.406.238.848.43 1.295a20 20 0 0 1-1.062 2.227 7.7 7.7 0 0 0-1.482.645c-.37.22-.699.48-.897.787-.21.326-.275.714-.08 1.103"/>
                  </svg>
                PDF
            </button>
        </form>
        <form wire:submit.prevent="generateExcel">
            <button type="submit"
            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-excel-fill" viewBox="0 0 16 16">
                <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M5.884 6.68 8 9.219l2.116-2.54a.5.5 0 1 1 .768.641L8.651 10l2.233 2.68a.5.5 0 0 1-.768.64L8 10.781l-2.116 2.54a.5.5 0 0 1-.768-.641L7.349 10 5.116 7.32a.5.5 0 1 1 .768-.64"/>
              </svg>
                EXCEL
            </button>
        </form>
    </div>
    <table class="min-w-full bg-white border-gray-200 divide-y divide-gray-200 shadow-md rounded-lg overflow-hidden">
        <thead class="bg-gray-300 dark:bg-gray-700">
            <tr>
                <th scope="col" class="px-6 text-center py-3 text-xs font-bold text-black uppercase tracking-wider">
                    No.Inventario</th>
                <th scope="col" class="px-6 text-center py-3 text-xs font-bold text-black uppercase tracking-wider">
                    Marca</th>
                <th scope="col" class="px-6 text-center py-3 text-xs font-bold text-black uppercase tracking-wider">
                    Modelo</th>
                <th scope="col" class="px-6 text-center py-3 text-xs font-bold text-black uppercase tracking-wider">
                    Serie</th>
                <th scope="col" class="px-6 text-center py-3 text-xs font-bold text-black uppercase tracking-wider">
                    Responsable</th>
                <th scope="col" class="px-6 text-center py-3 text-xs font-bold text-black uppercase tracking-wider">
                    Resguardo</th>
            </tr>
        </thead>
        <tbody class="bg-white">
            @forelse ($equipos as $equipo)
                <tr class="bg-gray-50 border-b dark:bg-gray-800 dark:border:gray-700">
                    <td class="px-6 py-4">{{ $equipo->numero_inventario }}</td>
                    <td class="px-6 py-4">{{ $equipo->marca->marca }}</td>
                    <td class="px-6 py-4">{{ $equipo->modelo }}</td>
                    <td class="px-6 py-4">{{ $equipo->serie }}</td>
                    <td class="px-6 py-4">{{ $equipo->empleado->nombre }} {{ $equipo->empleado->apellido_paterno }}
                        {{ $equipo->empleado->apellido_materno }}</td>
                    <td class="px-6 py-4">{{ $equipo->fecha_resguardo }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="padding: 12px; text-align: center; font-weight: 300;">
                        NO EXISTEN COINCIDENCIAS.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
</div>
