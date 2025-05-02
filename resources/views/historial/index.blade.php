<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Historial de Entradas y Salidas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="GET" action="{{ route('historial.index') }}">
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                            <!-- Filtro por Usuario -->
                            <div>
                                <x-input-label for="user_id" :value="__('Usuario')" />
                                <x-text-input id="user_id" class="block mt-1 w-full" type="text" name="user_id" :value="request('user_id')" />
                            </div>

                            <!-- Filtro por Fecha -->
                            <div>
                                <x-input-label for="fecha" :value="__('Fecha')" />
                                <x-text-input id="fecha" class="block mt-1 w-full" type="date" name="fecha" :value="request('fecha')" />
                            </div>

                            <!-- Filtro por Placa -->
                            <div>
                                <x-input-label for="placa" :value="__('Placa')" />
                                <x-text-input id="placa" class="block mt-1 w-full" type="text" name="placa" :value="request('placa')" />
                            </div>

                            <!-- Filtro por Tipo -->
                            <div>
                                <x-input-label for="tipo" :value="__('Tipo de Vehículo')" />
                                <select id="tipo" name="tipo" class="block mt-1 w-full">
                                    <option value="">-- Seleccionar --</option>
                                    <option value="Auto" {{ request('tipo') == 'Auto' ? 'selected' : '' }}>Auto</option>
                                    <option value="Moto" {{ request('tipo') == 'Moto' ? 'selected' : '' }}>Moto</option>
                                </select>
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Filtrar') }}
                            </x-primary-button>
                        </div>
                    </form>

                    <div class="mt-6">
                        <table class="table-auto w-full text-left">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">Usuario</th>
                                    <th class="px-4 py-2">Placa</th>
                                    <th class="px-4 py-2">Tipo</th>
                                    <th class="px-4 py-2">Hora de Entrada</th>
                                    <th class="px-4 py-2">Hora de Salida</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($entradas as $entrada)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $entrada->user->name }}</td>
                                        <td class="border px-4 py-2">{{ $entrada->vehiculo->placa }}</td>
                                        <td class="border px-4 py-2">{{ $entrada->vehiculo->tipo }}</td>
                                        <td class="border px-4 py-2">{{ $entrada->hora_entrada }}</td>
                                        <td class="border px-4 py-2">{{ $entrada->hora_salida ?? 'N/A' }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="border px-4 py-2 text-center">No se encontraron registros.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>