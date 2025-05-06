<!-- filepath: resources/views/historial/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
    <h2 class="text-3xl font-bold text-center text-blue-900 mb-6">Historial de Entradas y Salidas</h2>

    <!-- Formulario para registrar entrada/salida -->
    <div class="bg-blue-50 shadow-lg rounded-lg p-6 mb-6">
        <h3 class="text-2xl font-semibold text-blue-900">Registrar Entrada o Salida</h3>
        <form method="POST" action="{{ route('historial.store') }}">
            @csrf
            <div class="mb-4">
                <label for="clave_acceso" class="block text-sm font-medium text-gray-700">Clave de Acceso o QR</label>
                <input type="text" name="clave_acceso" id="clave_acceso" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" placeholder="Ingrese la clave de acceso o escanee el QR" required>
            </div>
            <div class="flex items-center justify-end">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg shadow-md">
                    Registrar
                </button>
            </div>
        </form>
    </div>

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