<form class="md:w-1/2 space-y-5" wire:submit.prevent='editarServicio' >
    <div>
        <x-input-label for="area_id" :value="__('Área que solicita:')" />
        <select id="area_id" wire:model="area_id"
            class="border-gray-300 focus:border-red-400 focus:ring-red-400 rounded-md shadow-sm w-full">
            <option>-- Seleccione --</option>
            @foreach ($areas as $area)
                <option value="{{ $area->id }}">{{ $area->area }}</option>
            @endforeach
        </select> 
        @error('area_id')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label for="empleado_id" :value="__('Quien solicita:')" />
        <select id="empleado_id" wire:model="empleado_id"
            class="border-gray-300 focus:border-red-400 focus:ring-red-400 rounded-md shadow-sm w-full">
            <option>-- Seleccione --</option>
            @foreach ($empleados as $empleado)
                <option value="{{ $empleado->id }}">
                    {{ $empleado->nombre }}
                    {{ $empleado->apellido_paterno }}
                    {{ $empleado->apellido_materno }}
                </option>
            @endforeach
        </select>
        @error('empleado_id')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label for="descripcionProblema" :value="__('Descripción:')" />
        <textarea wire:model="descripcionProblema" placeholder="Descripción del problema"
            class="border-gray-300 focus:border-red-400 focus:ring-red-400 rounded-md shadow-sm w-full h-96"></textarea>
        @error('descripcionProblema')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>
    
    <div>
        <x-input-label for="diagnostico" :value="__('Observaciones/Diagnostico:')" />
        <textarea 
            wire:model="diagnostico" 
            placeholder="Observaciones del servicio solicitado"
            class="border-gray-300 focus:border-red-400 focus:ring-red-400 rounded-md shadow-sm w-full h-96"></textarea>
        @error('diagnostico')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>
    
    
    <div>
        <x-input-label for="fecha_solicitud" :value="__('Fecha de solicitud:')" />
        <x-text-input id="fecha_solicitud"
            class="block mt-1 w-full class border-gray-300 focus:border-red-400 focus:ring-red-400 rounded-md shadow-sms"
            type="date" wire:model="fecha_solicitud" :value="old('fecha_solicitud')" />
        @error('fecha_solicitud')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label for="fecha_servicio" :value="__('Fecha de servicio:')" />
        <x-text-input id="fecha_servicio"
            class="block mt-1 w-full class border-gray-300 focus:border-red-400 focus:ring-red-400 rounded-md shadow-sms"
            type="date" wire:model="fecha_servicio" :value="old('fecha_servicio')" />
        @error('fecha_servicio')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label for="autoriza" :value="__('Quien autoriza:')" />
        <x-text-input id="autoriza"
            class="block mt-1 w-full class border-gray-300 focus:border-red-400 focus:ring-red-400 rounded-md shadow-sms"
            type="text" wire:model="autoriza" :value="old('autoriza')" placeholder='Quien autoriza el servicio' />
        @error('autoriza')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>
 
    <div>
        <x-input-label for="tecnico" :value="__('Quien realizo:')" />
        <x-text-input id="tecnico"
            class="block mt-1 w-full class border-gray-300 focus:border-red-400 focus:ring-red-400 rounded-md shadow-sms"
            type="text" wire:model="tecnico" :value="old('tecnico')" placeholder='Persona que realizo el servicio solicitado.' />
        @error('tecnico')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <x-danger-button class="justify-center ">
        Guardar cambios
    </x-danger-button>
</form>
