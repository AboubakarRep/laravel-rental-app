@extends('base2')
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
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nom')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="Nom" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
            <small class="text-danger fw-ligth" id="error-register-name"></small>
    </div>

                <!-- prenom -->
                <div>
                    <x-input-label for="firstname" :value="__('Prenoms')" />
                    <x-text-input id="firstname" class="block mt-1 w-full" type="text" name="firstname" :value="old('firstname')" required autofocus autocomplete="Prenoms" />
                    <x-input-error :messages="$errors->get('firstname')" class="mt-2" />
                    <small class="text-danger fw-ligth" id="error-register-firstname"></small>
                </div>

                <!-- sexe -->
                <div>
                    <x-input-label for="sexe" :value="__('Sexe')" />
                    <select id="sexe" name="sexe_id" class="block mt-1 w-full" required autofocus autocomplete="Prenoms">
                        @foreach(\App\Models\Sexe::all() as $sexe)
                        <option value="">Selectionnez votre genre</option>
                            <option value="{{ $sexe->id }}">{{ $sexe->nom }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('sexe_id')" class="mt-2" />
                </div>



          <!-- contact -->
        <div>
            <x-input-label for="contact" :value="__('Contact')" />
            <x-text-input id="contact" class="block mt-1 w-full" type="text" name="contact" :value="old('contact')" required autofocus autocomplete="contact" />
            <x-input-error :messages="$errors->get('contact')" class="mt-2" />
            <small class="text-danger fw-ligth" id="#error-register-contact"></small>
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
            <small class="text-danger fw-ligth" id="error-register-email"></small>
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Mots de passe')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
            <small class="text-danger fw-ligth" id="error-register-email"></small>
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmer mots de passe')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            <small class="text-danger fw-ligth" id="error-register-password_confirmation"></small>
        </div>

        <div class="flex items-center justify-end mt-4">
           <!-- <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a> -->

            <x-primary-button class="ms-4">
                {{ __("S'inscrire") }}
            </x-primary-button>

        </div>
    </form>
</x-guest-layout>
