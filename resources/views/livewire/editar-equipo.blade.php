<form class="md:w-1/2 space-y-5" wire:submit.prevent='editarEquipo'>
    <div>
        <x-input-label for="serie" :value="__('No. Inventario:')" />
        <x-text-input 
            id="numero_inventario"
            class="block mt-1 w-full border-gray-300 focus:border-red-400 focus:ring-red-400 rounded-md shadow-sms"
            type="text" 
            wire:model="numero_inventario" 
            :value="old('numero_inventario')" 
            placeholder='Numero de inventario' 
            />
            @error('numero_inventario')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
    </div> 
    
    <div>
        <x-input-label for="serie" :value="__('No.Serie:')" />
        <x-text-input 
            id="serie"
            class="block mt-1 w-full border-gray-300 focus:border-red-400 focus:ring-red-400 rounded-md shadow-sms"
            type="text" 
            wire:model="serie" 
            :value="old('serie')" 
            placeholder='Numero de serie del equipo' 
            />
            @error('serie')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
    </div>

    <div>
        <x-input-label for="marca" :value="__('Marca:')" />
        <select 
            id="marca" 
            wire:model="marca"
            class="border-gray-300 focus:border-red-400 focus:ring-red-400 rounded-md shadow-sm w-full"
        >
            <option>-- Seleccione --</option>
            @foreach ($marcas as $marca)
                <option value="{{ $marca->id }}">{{$marca->marca }}</option>
            @endforeach
        </select>

            @error('marca')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
    </div>

    <div>
        <x-input-label for="modelo" :value="__('Modelo')" />
        <x-text-input 
            id="modelo"
            class="block mt-1 w-full border-gray-300 focus:border-red-400 focus:ring-red-400 rounded-md shadow-sms"
            type="text" 
            wire:model="modelo" 
            :value="old('modelo')" 
            placeholder='Modelo del equipo' />

            @error('modelo')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
    </div>

    <div>
        <x-input-label for="categoria" :value="__('Categoria del equipo:')" />
        <select 
            id="categoria" 
            wire:model="categoria"
            class="border-gray-300 focus:border-red-400 focus:ring-red-400 rounded-md shadow-sm w-full"
            >
            <option>-- Seleccione --</option>
            @foreach ($categorias as $categoria)
            <option value="{{ $categoria->id}}">{{$categoria->categoria}}</option>
            @endforeach
        </select>
        
        @error('categoria')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label for="descripcion" :value="__('Detalles del equipo:')" />
        <textarea 
            wire:model="descripcion" 
            placeholder="Detalles del equipo"
            class="border-gray-300 focus:border-red-400 focus:ring-red-400 rounded-md shadow-sm w-full h-72"></textarea>
    
        @error('descripcion')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>
 

    <div>
        <x-input-label for="area" :value="__('Área donde se ubica:')" />
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
        <x-input-label for="" :value="__('Responsable del equipo:')" />
        <select 
            id="empleado" 
            wire:model="empleado"
            class="border-gray-300 focus:border-red-400 focus:ring-red-400 rounded-md shadow-sm w-full"
            >
            <option>-- Seleccione --</option>
            @foreach ($empleados as $empleado)
                <option value="{{$empleado->id}}">
                    {{$empleado->nombre}} {{$empleado->apellido_paterno}} {{$empleado->apellido_materno}} </option>
            @endforeach
        </select>

        @error('empleado')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label for="fecha_alta" :value="__('Fecha de alta:')" />
        <x-text-input id="fecha_alta"
            class="block mt-1 w-full class border-gray-300 focus:border-red-400 focus:ring-red-400 rounded-md shadow-sms"
            type="date" wire:model="fecha_alta" :value="old('fecha_alta')" />
        @error('fecha_alta')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label for="fecha_resguardo" :value="__('Fecha de Resguardo:')" />
        <x-text-input id="fecha_resguardo"
            class="block mt-1 w-full class border-gray-300 focus:border-red-400 focus:ring-red-400 rounded-md shadow-sms"
            type="date" wire:model="fecha_resguardo" :value="old('fecha_resguardo')" />
        @error('fecha_resguardo')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label for="fecha_baja" :value="__('Fecha de baja:')" />
        <x-text-input id="fecha_baja"
            class="block mt-1 w-full class border-gray-300 focus:border-red-400 focus:ring-red-400 rounded-md shadow-sms"
            type="date" wire:model="fecha_baja" :value="old('fecha_resguardo')" />
        @error('fecha_baja')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>
    
    <div>
        <x-input-label for="observacion" :value="__('Observaciones:')" />
        <textarea 
            wire:model="observacion" 
            placeholder="Observaciones del equipo"
            class="border-gray-300 focus:border-red-400 focus:ring-red-400 rounded-md shadow-sm w-full h-72"></textarea>
    
        @error('observacion')
            <livewire:mostrar-alerta :message="$message" /> 
        @enderror
    </div>


    <x-danger-button class="justify-center ">
        Guardar cambios
    </x-danger-button>
</form>
