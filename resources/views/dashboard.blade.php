@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
    <!-- Encabezado con logo, bienvenida y opciones de autenticación -->
    <div class="bg-gradient-to-r from-blue-900 to-blue-700 shadow sm:rounded-lg p-6 text-center">
        <img src="{{ asset('images/udec-logo.png') }}" alt="Logo UDEC" class="mx-auto h-20 mb-4">
        <h1 class="text-4xl font-bold text-white">Sistema de Parqueadero - UDEC</h1>
        <p class="mt-2 text-blue-200">Gestiona tus vehículos y consulta el historial de entradas y salidas de manera eficiente.</p>

        <!-- Botones de Iniciar Sesión y Registrarse -->
        <div class="mt-6">
            @guest
                <a href="{{ route('login') }}" class="inline-block bg-blue-500 text-white px-6 py-3 rounded-lg shadow-md hover:bg-blue-600 mx-2">
                    Iniciar Sesión
                </a>
                <a href="{{ route('register') }}" class="inline-block bg-blue-400 text-white px-6 py-3 rounded-lg shadow-md hover:bg-blue-500 mx-2">
                    Registrarse
                </a>
            @else
                <p class="text-blue-200 text-lg">¡Bienvenido, {{ Auth::user()->name }}!</p>
            @endguest
        </div>
    </div>

    <!-- Sección de tarjetas -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
        <!-- Vehículos -->
        <div class="bg-blue-50 shadow-lg sm:rounded-lg p-6">
            <h2 class="text-2xl font-semibold text-blue-900">Vehículos Registrados</h2>
            <p class="mt-2 text-blue-700">Consulta y administra tus vehículos registrados en el sistema.</p>
            <a href="{{ route('vehiculos.index') }}" class="mt-4 inline-block bg-blue-500 text-white px-5 py-3 rounded-lg shadow-md hover:bg-blue-600">
                Ver Vehículos
            </a>
        </div>

        <!-- Registrar Vehículo -->
        <div class="bg-blue-50 shadow-lg sm:rounded-lg p-6">
            <h2 class="text-2xl font-semibold text-blue-900">Registrar Vehículo</h2>
            <p class="mt-2 text-blue-700">Añade un nuevo vehículo al sistema de manera rápida y sencilla.</p>
            <a href="{{ route('vehiculos.create') }}" class="mt-4 inline-block bg-blue-500 text-white px-5 py-3 rounded-lg shadow-md hover:bg-blue-600">
                Registrar Vehículo
            </a>
        </div>

        <!-- Historial -->
        <div class="bg-blue-50 shadow-lg sm:rounded-lg p-6">
            <h2 class="text-2xl font-semibold text-blue-900">Historial de Entradas y Salidas</h2>
            <p class="mt-2 text-blue-700">Consulta el historial de entradas y salidas de tus vehículos.</p>
            <a href="{{ route('historial.index') }}" class="mt-4 inline-block bg-blue-500 text-white px-5 py-3 rounded-lg shadow-md hover:bg-blue-600">
                Ver Historial
            </a>
        </div>
    </div>

    <!-- Información adicional -->
    <div class="mt-8 bg-blue-100 shadow-lg sm:rounded-lg p-6">
        <h2 class="text-2xl font-semibold text-blue-900">Información del Sistema</h2>
        <p class="mt-2 text-blue-700">
            Este sistema está diseñado para facilitar la gestión del parqueadero de la Universidad de Cundinamarca. 
            Si tienes alguna duda o inconveniente, por favor contacta al administrador del sistema.
        </p>
    </div>
</div>
@endsection
