@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
    <h2 class="text-3xl font-bold text-center text-blue-900 mb-6">Registrar Vehículo</h2>
    <form action="{{ route('vehiculos.store') }}" method="POST" class="bg-white shadow-lg rounded-lg p-6">
        @csrf

        <!-- Placa -->
        <div class="mb-4">
            <label for="placa" class="block text-sm font-medium text-blue-900">Placa</label>
            <input type="text" name="placa" id="placa" maxlength="7" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
        </div>

        <!-- Tipo de Vehículo -->
        <div class="mb-4">
            <label for="tipo" class="block text-sm font-medium text-blue-900">Tipo de Vehículo</label>
            <select name="tipo" id="tipo" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                <option value="Auto">Auto</option>
                <option value="Moto">Moto</option>
            </select>
        </div>

        <!-- Color -->
        <div class="mb-4">
            <label for="color" class="block text-sm font-medium text-blue-900">Color</label>
            <input type="text" name="color" id="color" maxlength="20" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500">
        </div>

        <!-- Marca -->
        <div class="mb-4">
            <label for="marca" class="block text-sm font-medium text-blue-900">Marca</label>
            <input type="text" name="marca" id="marca" maxlength="30" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500">
        </div>

        <!-- Modelo -->
        <div class="mb-4">
            <label for="modelo" class="block text-sm font-medium text-blue-900">Modelo</label>
            <input type="text" name="modelo" id="modelo" maxlength="4" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500">
        </div>

        <!-- Botón de registro -->
        <div class="text-center">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Registrar Vehículo
            </button>
        </div>
    </form>
</div>
@endsection
