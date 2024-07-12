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
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Resend Verification Email') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout>
