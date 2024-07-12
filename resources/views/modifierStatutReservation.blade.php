@extends('base')

@section('title', 'Modifier Réservation')

@section('content')
    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Modifier Réservation</title>
    </head>
    <body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Modifier Réservation</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('modifierSatatutReservation', $reservation->id) }}">
                            @csrf
                            @method('PUT')

                            <!-- Statut -->
                            <div class="form-group row">
                                <label for="statut" class="col-md-4 col-form-label text-md-right">Statut</label>
                                <div class="col-md-6">
                                    <select id="statut" class="form-control" name="statut" required>
                                        <option value="Confirmé" {{ $reservation->statut == 'Confirmé' ? 'selected' : '' }}>Confirmé</option>
                                        <option value="En cours" {{ $reservation->statut == 'En cours' ? 'selected' : '' }}>En cours</option>
                                        <option value="Annulé" {{ $reservation->statut == 'Annulé' ? 'selected' : '' }}>Annulé</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Date de début -->
                            <div class="form-group row">
                                <label for="date_debut" class="col-md-4 col-form-label text-md-right">Date de début</label>
                                <div class="col-md-6">
                                    <input id="date_debut" type="date" class="form-control" name="date_debut" value="{{ $reservation->date_debut }}">
                                </div>
                            </div>

                            <!-- Date de fin -->
                            <div class="form-group row">
                                <label for="date_fin" class="col-md-4 col-form-label text-md-right">Date de fin</label>
                                <div class="col-md-6">
                                    <input id="date_fin" type="date" class="form-control" name="date_fin" value="{{ $reservation->date_fin }}">
                                </div>
                            </div>

                            <!-- Coût -->
                            <div class="form-group row">
                                <label for="cout" class="col-md-4 col-form-label text-md-right">Coût</label>
                                <div class="col-md-6">
                                    <input id="cout" type="text" class="form-control" name="cout" value="{{ $reservation->cout }}">
                                </div>
                            </div>

                            <!-- Contact Client -->
                            <div class="form-group row">
                                <label for="contactClient" class="col-md-4 col-form-label text-md-right">Contact Client</label>
                                <div class="col-md-6">
                                    <input id="contactClient" type="text" class="form-control" name="contactClient" value="{{ $reservation->contactClient }}">
                                </div>
                            </div>

                            <!-- Lieu de récupération -->
                            <div class="form-group row">
                                <label for="lieu_recup" class="col-md-4 col-form-label text-md-right">Lieu de récupération</label>
                                <div class="col-md-6">
                                    <input id="lieu_recup" type="text" class="form-control" name="lieu_recup" value="{{ $reservation->lieu_recup }}">
                                </div>
                            </div>

                            <!-- Lieu de dépot -->
                            <div class="form-group row">
                                <label for="lieu_depot" class="col-md-4 col-form-label text-md-right">Lieu de dépot</label>
                                <div class="col-md-6">
                                    <input id="lieu_depot" type="text" class="form-control" name="lieu_depot" value="{{ $reservation->lieu_depot }}">
                                </div>
                            </div>

                            <!-- Autres champs à ajouter selon vos besoins -->

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Enregistrer
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
    </html>
@endsection
