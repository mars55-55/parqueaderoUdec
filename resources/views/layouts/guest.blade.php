<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-100 antialiased bg-gradient-to-r from-blue-900 to-blue-700">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            <!-- Logo con fondo elíptico -->
            <div class="mb-6">
                <div class="bg-white rounded-full p-6 shadow-lg">
                    <a href="/">
                        <x-application-logo class="w-36 h-36 fill-current text-blue-900" />
                    </a>
                </div>
            </div>

            <!-- Contenedor del formulario -->
            <div class="w-full sm:max-w-md mt-6 px-8 py-6 bg-white shadow-2xl rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
