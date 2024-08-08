<x-app-layout>
    <div class="py-16 bg-white overflow-hidden lg:py-15">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 lg:max-w-5xl">
            <div class="relative">
                <div class="text-center">
                    <img src="{{ asset('img/portada_3.png') }}" alt="Portada de la pagina">
                    <!-- Botón de desplazamiento -->
                    <button id="scroll-button" class="mt-8 inline-flex items-center px-4 py-2 bg-gray-500 text-white font-semibold text-xs uppercase rounded hover:bg-gray-600">
                        Iniciar
                        <!-- Puedes usar un icono aquí -->
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div> 
    </div>

    <!-- Añadir ID para facilitar el desplazamiento -->
    <div id="filtrar-mantenimientos">
        <livewire:filtrar-mantenimientos />
    </div>
</x-app-layout>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('scroll-button').addEventListener('click', function() {
            document.getElementById('filtrar-mantenimientos').scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
</script>
