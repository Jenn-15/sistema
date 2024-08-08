<form class="md:w-1/2 space-y-5" wire:submit.prevent='editarMantenimiento'>
    <div>
        <x-input-label for="equipo" :value="__('Equipo:')" />
        <select
                id="equipo"
                wire:model="equipo"
                class="border-gray-300 focus:border-red-400 focus:ring-red-400 rounded-md shadow-sm w-full"
            >
            <option>-- Seleccione  --</option>
            @foreach ($equipos as $equipo )
                <option value="{{ $equipo->id}}">
                    {{$equipo->numero_inventario}}-{{$equipo->modelo}}
                </option>
            @endforeach
        </select>

        @error('equipo')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div> 

    <div> 
        <x-input-label for="tipo" :value="__('Tipo de mantenimiento:')" />
        <select
                id="tipo"
                wire:model="tipo"
                class="border-gray-300 focus:border-red-400 focus:ring-red-400 rounded-md shadow-sm w-full"
            >
            <option>-- Seleccione --</option>
            @foreach ($tipos as $tipo )
                <option value="{{ $tipo->id}}">{{$tipo->tipo}}</option>
            @endforeach
        </select>
        @error('tipo')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>


    <div> 
        <x-input-label for="descripcion" :value="__('Descripcion:')" />
        <textarea
            wire:model="descripcion" 
            placeholder="Descripción del mantenimiento"
            class="border-gray-300 focus:border-red-400 focus:ring-red-400 rounded-md shadow-sm w-full h-72s" 
        ></textarea>

        @error('descripcion')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label for="fecha" :value="__('Fecha de mantenimiento:')" />
        <x-text-input 
            id="fecha" 
            class="block mt-1 w-full class border-gray-300 focus:border-red-400 focus:ring-red-400 rounded-md shadow-sms" 
            type="date" 
            wire:model="fecha" 
            :value="old('fecha')" 
        />
        @error('fecha')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label for="costo" :value="__('Costo:')" />
        <x-text-input 
            id="costo" 
            class="block mt-1 w-full class border-gray-300 focus:border-red-400 focus:ring-red-400 rounded-md shadow-sms" 
            type="text" 
            wire:model="costo" 
            :value="old('costo')" 
            placeholder='Costo del mantenimiento'
        />
        @error('costo')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <x-primary-button class="justify-center ">
        Guardar cambios
    </x-primary-button>

</form>
