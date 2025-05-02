<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
                <!-- Botón para registrar vehículo -->
                <div class="mt-4">
                    <a href="{{ route('vehiculos.create') }}" 
                       class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        {{ __('Registrar Vehículo') }}
                    </a>
                </div>
                @if (Auth::user()->tipo_usuario === 'Vigilante')
                    <div class="mt-4">
                        <a href="{{ route('entrada.registrar') }}" 
                           class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            {{ __('Registrar Entrada') }}
                        </a>
                        <a href="{{ route('salida.registrar') }}" 
                           class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ml-4">
                            {{ __('Registrar Salida') }}
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
