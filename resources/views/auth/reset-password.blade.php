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
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
