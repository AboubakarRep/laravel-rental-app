<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(Auth::check())
                        @php
                            $candidats = App\Models\Candidat::where('email', Auth::user()->email)->get();
                        @endphp

<div class="mb-8">
    @if($candidats->count() > 0)
        <h3 class="text-lg font-bold mb-4">Vos candidatures en cours de traitement :</h3>
        <ul>
            @foreach($candidats as $key => $candidat)
                <li class="mb-4 p-4 bg-gray-100 rounded-lg shadow-md">
                    <div class="flex justify-between">
                        <div>
                            <h4 class="font-bold">{{ $key + 1 }}. {{ $candidat->nom }} - {{ $candidat->prenoms }}</h4>
                            <!-- Ajoutez d'autres détails sur la candidature ici si nécessaire -->
                        </div>
                        <div>
                            <!-- Boutons d'action (le cas échéant) -->
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    @else
        <p class="text-gray-500">Aucune candidature en cours de traitement.</p>
    @endif
                        </div>

                        <div>
                            @php
                                $reservations = App\Models\Reservation::where('user_id', Auth::id())->get();
                            @endphp

                            @if($reservations->count() > 0)
                                <h3 class="text-lg font-bold mb-4">Vos Réservations :</h3>
                                <ul>
                                    @foreach($reservations as $key => $reservation)
                                        <li class="mb-4">
                                            <span class="block mb-2 font-bold rounded-lg bg-blue-200 text-blue-800 p-2">Véhicule Numéro: {{ $reservation->vehicule_id }}</span>
                                            <span class="block mb-1">Statut: {{ $reservation->statut }}</span>
                                            <span class="block mb-1">Date de début: {{ $reservation->date_debut }}</span>
                                            <span class="block mb-1">Date de fin: {{ $reservation->date_fin }}</span>
                                            <span class="block mb-1">Téléphone: {{ $reservation->contactClient }}</span>
                                            <span class="block mb-1">Coût: {{ $reservation->cout }}</span>
                                        </li>
                                        <!-- Ajoutez d'autres détails sur la réservation ici si nécessaire -->
                                        <form method="POST" action="{{ route('modifierStatutReservationUser', $reservation->id) }}" class="inline">
                                            @csrf
                                            @method('PUT')
                                            <button type="button" class="btn btn-sm" style="background-color: #dc3545; color: white; border: 1px solid #dc3545; border-radius: 4px; padding: 5px 10px; transition: background-color 0.3s ease;" onclick="annulerReservation({{ $reservation->id }})">
                                                Annuler
                                            </button>

                                            {{-- <button type="button" class="btn btn-sm" style="background-color: #d9ff01; color: white; border: 1px solid #d9ff01; border-radius: 4px; padding: 5px 10px; transition: background-color 0.3s ease;" > --}}

                                            </button>

                                            <a href="{{route('code.download',['id' => $reservation->id])}}">Code</a>



                                            <script>
                                                function annulerReservation(reservationId) {
                                                    if (confirm('Êtes-vous sûr de vouloir annuler cette réservation ?')) {
                                                        // Effectuer l'action d'annulation ici, par exemple, soumettre un formulaire via JavaScript
                                                        // Vous pouvez utiliser une requête AJAX ou une redirection vers une route Laravel pour effectuer l'annulation
                                                        // Ici, j'utilise une redirection vers une route Laravel qui gère l'annulation
                                                        window.location.href = "{{ route('changerReservationUser', ['reservation' => $reservation->id]) }}".replace(':reservationId', reservationId);
                                                    }
                                                }
                                            </script>
                                        </form>

                                    @endforeach
                                </ul>
                            @else
                                <p>Aucune réservation en cours.</p>
                            @endif
                        </div>
                    @else
                        <p>{{ __("You're not logged in!") }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
