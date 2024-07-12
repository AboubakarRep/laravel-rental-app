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
    <div class="mb-4 text-sm text-gray-600">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex justify-end mt-4">
            <x-primary-button>
                {{ __('Confirm') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
