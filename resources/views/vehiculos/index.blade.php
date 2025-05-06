<!-- filepath: resources/views/vehiculos/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
    <h2 class="text-3xl font-bold text-center text-blue-900 mb-6">Vehículos Registrados</h2>

    <!-- Tabla de vehículos -->
    <div class="bg-white shadow-lg rounded-lg p-6">
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-medium text-blue-900">Placa</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-blue-900">Tipo</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-blue-900">Color</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-blue-900">Marca</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-blue-900">Modelo</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($vehiculos as $vehiculo)
                    <tr>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $vehiculo->placa }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $vehiculo->tipo }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $vehiculo->color }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $vehiculo->marca }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $vehiculo->modelo }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection