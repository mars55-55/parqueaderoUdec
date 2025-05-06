<!-- filepath: resources/views/historial/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
    <h2 class="text-3xl font-bold text-center text-blue-900 mb-6">Historial de Entradas y Salidas</h2>

    <!-- Tabla de historial -->
    <div class="bg-white shadow-lg rounded-lg p-6">
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-medium text-blue-900">Vehículo</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-blue-900">Acción</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-blue-900">Fecha</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($historials as $historial)
                    <tr>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $historial->vehiculo->placa }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $historial->accion }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $historial->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Paginación -->
    <div class="mt-6">
        {{ $historials->links() }}
    </div>
</div>
@endsection