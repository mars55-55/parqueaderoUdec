@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
    <!-- Encabezado con logo, bienvenida y opciones de autenticación -->
    <div class="bg-emerald-100 dark:bg-emerald-600 shadow sm:rounded-lg p-6 text-center">
        <img src="{{ asset('images/udec-logo.png') }}" alt="Logo UDEC" class="mx-auto h-16 mb-4">
        <h1 class="text-3xl font-bold text-emerald-800 dark:text-white">Sistema de Parqueadero - UDEC</h1>
        <p class="mt-2 text-emerald-600 dark:text-emerald-100">Gestiona tus vehículos y consulta el historial de entradas y salidas de manera eficiente.</p>

        <!-- Botones de Iniciar Sesión y Registrarse -->
        <div class="mt-6">
            @guest
                <a href="{{ route('login') }}" class="inline-block bg-emerald-500 text-white px-4 py-2 rounded-md hover:bg-emerald-600 mx-2">
                    Iniciar Sesión
                </a>
                <a href="{{ route('register') }}" class="inline-block bg-emerald-400 text-white px-4 py-2 rounded-md hover:bg-emerald-500 mx-2">
                    Registrarse
                </a>
            @else
                <p class="text-emerald-600 dark:text-emerald-100">¡Bienvenido, {{ Auth::user()->name }}!</p>
            @endguest
        </div>
    </div>

    <!-- Sección de tarjetas -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
        <!-- Vehículos -->
        <div class="bg-white dark:bg-emerald-700 shadow sm:rounded-lg p-6">
            <h2 class="text-xl font-semibold text-emerald-800 dark:text-white">Vehículos Registrados</h2>
            <p class="mt-2 text-emerald-600 dark:text-emerald-100">Consulta y administra tus vehículos registrados en el sistema.</p>
            <a href="{{ route('vehiculos.index') }}" class="mt-4 inline-block bg-emerald-500 dark:text-emerald-100 px-4 py-2 rounded-md hover:bg-emerald-600">
                Ver Vehículos
            </a>
        </div>

        <!-- Historial -->
        <div class="bg-white dark:bg-emerald-700 shadow sm:rounded-lg p-6">
            <h2 class="text-xl font-semibold text-emerald-800 dark:text-white">Historial de Entradas y Salidas</h2>
            <p class="mt-2 text-emerald-600 dark:text-emerald-100">Consulta el historial de entradas y salidas de tus vehículos.</p>
            <a href="{{ route('historial.index') }}" class="mt-4 inline-block bg-emerald-500 dark:text-emerald-100 px-4 py-2 rounded-md hover:bg-emerald-600">
                Ver Historial
            </a>
        </div>
    </div>

    <!-- Información adicional -->
    <div class="mt-8 bg-emerald-50 dark:bg-emerald-700 shadow sm:rounded-lg p-6">
        <h2 class="text-xl font-semibold text-emerald-800 dark:text-white">Información del Sistema</h2>
        <p class="mt-2 text-emerald-600 dark:text-emerald-100">
            Este sistema está diseñado para facilitar la gestión del parqueadero de la Universidad de Cundinamarca. 
            Si tienes alguna duda o inconveniente, por favor contacta al administrador del sistema.
        </p>
    </div>
</div>
@endsection
