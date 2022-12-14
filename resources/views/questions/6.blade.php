<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Question 6') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Affichez Oui ou Non selon si l'utilisateur est authentifi√© -->
            <!-- Replacez false par la bonne valeur -->
            {{-- reference: https://stackoverflow.com/questions/37355733/how-to-check-if-user-is-connected-in-view-laravel --}}
            Authentifi√©: {{ (Auth::check()) ? 'Oui' : 'Non' }} 
        </div>
    </div>
</x-guest-layout>
