<x-guest-layout>
    <!-- Estado de la sesión -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Dirección de correo -->
        <div>
            <x-input-label for="email" :value="__('Correo Electrónico')" class="text-blue-900" />
            <x-text-input id="email" class="block mt-1 w-full border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-lg shadow-sm" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600" />
        </div>

        <!-- Contraseña -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña')" class="text-blue-900" />
            <x-text-input id="password" class="block mt-1 w-full border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-lg shadow-sm" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600" />
        </div>

        <!-- Recordarme -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500" name="remember">
                <span class="ms-2 text-sm text-blue-900">{{ __('Recuérdame') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-between mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-blue-900 hover:text-blue-600 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" href="{{ route('password.request') }}">
                    {{ __('¿Olvidaste tu contraseña?') }}
                </a>
            @endif

            <x-primary-button class="ms-3 bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 rounded-lg shadow-md px-6 py-2 text-white">
                {{ __('Iniciar Sesión') }}
            </x-primary-button>
        </div>

        <!-- Enlace para registrarse -->
        <div class="mt-6 text-center">
            <p class="text-sm text-gray-600">
                {{ __('¿No tienes una cuenta?') }}
                <a href="{{ route('register') }}" class="text-blue-900 hover:text-blue-600 underline">
                    {{ __('Regístrate aquí') }}
                </a>
            </p>
        </div>
    </form>
</x-guest-layout>
