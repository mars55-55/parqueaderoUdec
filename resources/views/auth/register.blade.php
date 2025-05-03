<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nombre')" class="text-emerald-800 dark:text-emerald-200" />
            <x-text-input id="name" class="block mt-1 w-full border-emerald-300 dark:border-emerald-600 focus:border-emerald-500 dark:focus:border-emerald-400 focus:ring-emerald-500 dark:focus:ring-emerald-400" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-emerald-600 dark:text-emerald-400" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Correo Electrónico')" class="text-emerald-800 dark:text-emerald-200" />
            <x-text-input id="email" class="block mt-1 w-full border-emerald-300 dark:border-emerald-600 focus:border-emerald-500 dark:focus:border-emerald-400 focus:ring-emerald-500 dark:focus:ring-emerald-400" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-emerald-600 dark:text-emerald-400" />
        </div>

        <!-- Número de Documento -->
        <div class="mt-4">
            <x-input-label for="numero_documento" :value="__('Número de Documento')" class="text-emerald-800 dark:text-emerald-200" />
            <x-text-input id="numero_documento" class="block mt-1 w-full border-emerald-300 dark:border-emerald-600 focus:border-emerald-500 dark:focus:border-emerald-400 focus:ring-emerald-500 dark:focus:ring-emerald-400" type="text" name="numero_documento" :value="old('numero_documento')" required autocomplete="numero_documento" />
            <x-input-error :messages="$errors->get('numero_documento')" class="mt-2 text-emerald-600 dark:text-emerald-400" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña')" class="text-emerald-800 dark:text-emerald-200" />
            <x-text-input id="password" class="block mt-1 w-full border-emerald-300 dark:border-emerald-600 focus:border-emerald-500 dark:focus:border-emerald-400 focus:ring-emerald-500 dark:focus:ring-emerald-400" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-emerald-600 dark:text-emerald-400" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" class="text-emerald-800 dark:text-emerald-200" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full border-emerald-300 dark:border-emerald-600 focus:border-emerald-500 dark:focus:border-emerald-400 focus:ring-emerald-500 dark:focus:ring-emerald-400" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-emerald-600 dark:text-emerald-400" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-emerald-800 dark:text-emerald-200 hover:text-emerald-600 dark:hover:text-emerald-400 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 dark:focus:ring-offset-emerald-800" href="{{ route('login') }}">
                {{ __('¿Ya estás registrado?') }}
            </a>

            <x-primary-button class="ms-4 bg-emerald-500 hover:bg-emerald-600 focus:ring-emerald-500 dark:bg-emerald-600 dark:hover:bg-emerald-700 dark:focus:ring-emerald-400">
                {{ __('Registrar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
