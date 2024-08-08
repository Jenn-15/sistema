<form class="md:w-1/2 space-y-5" wire:submit.prevent='crearEmpleado'>
    <div>
        <x-input-label for="numeroT" :value="__(' Numero de empleado : ')" />
        <x-text-input 
            id="numeroT" 
            class="border-gray-300 focus:border-red-400 focus:ring-red-400 rounded-md shadow-sms w-full" 
            type="text" 
            wire:model="numeroT" 
            :value="old('numeroT')" 
            paceholder="Numero de identificacion de empleado"
        />
         
    </div>
    
    <div>
        <x-input-label for="nombre" :value="__('Nombre (s):')" />
        <x-text-input 
            id="nombre" 
            class="block mt-1 w-full border-gray-300 focus:border-red-400 focus:ring-red-500 rounded-md shadow-sms" 
            type="text" 
            wire:model="nombre" 
            :value="old('nombre')" 
            placeholder='Nombres del empleado'
        />
        @error('nombre')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label for="apellido_paterno" :value="__('Apellido Paterno: ')" />
        <x-text-input 
            id="apellido_paterno" 
            class="block mt-1 w-full border-gray-300 focus:border-red-400 focus:ring-red-400 rounded-md shadow-sms" 
            type="text" 
            wire:model="apellido_paterno" 
            :value="old('apellido_paterno')" 
        />
        @error('apellido_paterno')
            <livewire:mostrar-alerta :message="$message" />        
        @enderror
    </div>

    <div>
        <x-input-label for="apellido_materno" :value="__('Apellido Materno: ')" />
        <x-text-input 
            id="apellido_materno" 
            class="block mt-1 w-full border-gray-300 focus:border-red-500 focus:ring-red-500 rounded-md shadow-sms" 
            type="text" 
            wire:model="apellido_materno" 
            :value="old('apellido_materno')" 
        />
        @error('apellido_materno')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>
 
    <div>
        <x-input-label for="area" :value="__('Área de Trabajo:')" />
        <select
                id="area"
                wire:model="area"
                class="border-gray-300 focus:border-red-400 focus:ring-red-400 rounded-md shadow-sm w-full"
            >
            <option>-- Seleccione --</option>
            @foreach ($areas as $area)
                <option value="{{$area->id}}">{{$area->area}}</option>
            @endforeach
        </select>

            @error('area')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
    </div>

    <div>
        <x-input-label for="cargo" :value="__('Cargo:')" />
        <x-text-input 
            id="cargo" 
            class="block mt-1 w-full border-gray-300 focus:border-red-400 focus:ring-red-500 rounded-md shadow-sms" 
            type="text" 
            wire:model="cargo" 
            :value="old('cargo')" 
            placeholder='Cargo del empleado'
        />
        @error('cargo')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <x-danger-button class="justify-center ">
        Agregar nuevo
    </x-danger-button>
</form>