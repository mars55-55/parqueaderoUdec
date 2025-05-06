<x-guest-layout>
    <div class="mb-4 text-sm text-blue-900">
        {{ __('¿Olvidaste tu contraseña? No hay problema. Simplemente indícanos tu dirección de correo electrónico y te enviaremos un enlace para restablecer tu contraseña.') }}
    </div>

    <!-- Estado de la sesión -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Dirección de correo -->
        <div>
            <x-input-label for="email" :value="__('Correo Electrónico')" class="text-blue-900" />
            <x-text-input id="email" class="block mt-1 w-full border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-lg shadow-sm" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 rounded-lg shadow-md px-6 py-2 text-white">
                {{ __('Enviar enlace de restablecimiento') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
