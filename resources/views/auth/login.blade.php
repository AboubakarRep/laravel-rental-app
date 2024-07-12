<x-guest-layout>
    <style>
        /* Définition du style pour le corps de la page */
        body {
            margin: 0; /* Pour enlever les marges par défaut */
            padding: 0; /* Pour enlever le padding par défaut */
            background-image: url('{{ asset('assets/images/why-kei-8e2gal_GIE8-unsplash.jpg') }}'); /* Spécifiez le chemin de votre image */
            background-size: cover; /* Pour que l'image couvre toute la surface */
            background-position: center; /* Pour centrer l'image */
            background-repeat: no-repeat; /* Pour éviter la répétition de l'image */
            display: flex; /* Pour utiliser le modèle de boîte flexible */
            justify-content: center; /* Pour centrer les éléments horizontalement */
            align-items: center; /* Pour centrer les éléments verticalement */
            height: 100vh; /* Pour occuper 100% de la hauteur de la fenêtre */
            opacity: 0.8; /* Opacité de l'image de fond (vous pouvez ajuster cette valeur selon vos besoins) */
        }

        /* Définition du style pour le formulaire de connexion */
        .login-container {
            padding: 20px; /* Espacement interne */
            border-radius: 10px; /* Coins arrondis */
        }
    </style>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />


@section('title','Se connecter')
@section('title', 'Se connecter')
<form method="POST" action="{{ route('login') }}">
    @csrf
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Mots de passe')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Se rappeler de moi') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('register'))
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('register') }}">
                {{ __("S'inscrire ?") }}
            </a>
        @endif

            <x-primary-button class="ms-3">
                {{ __('Connexion') }}
            </x-primary-button>
        </div>




    </form>
</x-guest-layout>
