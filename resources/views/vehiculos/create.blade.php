<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Registrar Vehículo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('vehiculos.store') }}">
                        @csrf

                        <!-- Placa -->
                        <div>
                            <x-input-label for="placa" :value="__('Placa')" />
                            <x-text-input id="placa" class="block mt-1 w-full" type="text" name="placa" :value="old('placa')" required autofocus />
                            <x-input-error :messages="$errors->get('placa')" class="mt-2" />
                        </div>

                        <!-- Tipo -->
                        <div class="mt-4">
                            <x-input-label for="tipo" :value="__('Tipo de Vehículo')" />
                            <select id="tipo" name="tipo" class="block mt-1 w-full" required>
                                <option value="Auto">Auto</option>
                                <option value="Moto">Moto</option>
                            </select>
                            <x-input-error :messages="$errors->get('tipo')" class="mt-2" />
                        </div>

                        <!-- Color -->
                        <div class="mt-4">
                            <x-input-label for="color" :value="__('Color')" />
                            <x-text-input id="color" class="block mt-1 w-full" type="text" name="color" :value="old('color')" />
                            <x-input-error :messages="$errors->get('color')" class="mt-2" />
                        </div>

                        <!-- Marca -->
                        <div class="mt-4">
                            <x-input-label for="marca" :value="__('Marca')" />
                            <x-text-input id="marca" class="block mt-1 w-full" type="text" name="marca" :value="old('marca')" />
                            <x-input-error :messages="$errors->get('marca')" class="mt-2" />
                        </div>

                        <!-- Modelo -->
                        <div class="mt-4">
                            <x-input-label for="modelo" :value="__('Modelo')" />
                            <x-text-input id="modelo" class="block mt-1 w-full" type="text" name="modelo" :value="old('modelo')" />
                            <x-input-error :messages="$errors->get('modelo')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Registrar Vehículo') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
