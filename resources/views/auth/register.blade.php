<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="space-y-6">
        @csrf

        <!-- Título del formulario -->
        <h2 class="text-3xl font-extrabold text-center text-blue-900">
            {{ __('Crear una cuenta') }}
        </h2>
        <p class="text-center text-gray-600">
            {{ __('Completa los campos para registrarte en el sistema.') }}
        </p>

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nombre')" class="text-blue-900" />
            <x-text-input id="name" class="block mt-1 w-full border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-lg shadow-sm" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-600" />
        </div>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Correo Electrónico')" class="text-blue-900" />
            <x-text-input id="email" class="block mt-1 w-full border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-lg shadow-sm" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600" />
        </div>

        <!-- Número de Documento -->
        <div>
            <x-input-label for="numero_documento" :value="__('Número de Documento')" class="text-blue-900" />
            <x-text-input id="numero_documento" class="block mt-1 w-full border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-lg shadow-sm" type="text" name="numero_documento" :value="old('numero_documento')" required autocomplete="numero_documento" />
            <x-input-error :messages="$errors->get('numero_documento')" class="mt-2 text-red-600" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Contraseña')" class="text-blue-900" />
            <x-text-input id="password" class="block mt-1 w-full border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-lg shadow-sm" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600" />
        </div>

        <!-- Confirm Password -->
        <div>
            <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" class="text-blue-900" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-lg shadow-sm" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-600" />
        </div>

        <!-- Botones -->
        <div class="flex items-center justify-between">
            <a class="underline text-sm text-blue-900 hover:text-blue-600" href="{{ route('login') }}">
                {{ __('¿Ya estás registrado?') }}
            </a>

            <x-primary-button class="bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 rounded-lg shadow-md px-6 py-2 text-white">
                {{ __('Registrar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
