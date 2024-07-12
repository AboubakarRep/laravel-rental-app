@extends('base')

@section('title','formulaire-reservation')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
     <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">

     </head>
     <body >
        <div class="page-heading header-text">
            <div class="container">
              <div class="row">
                <div class="col-lg-12">
                  <span class="breadcrumb"><a href="#">Home</a> / Vehicules</span>
                  <h3>Reservation de vehicule</h3>
                </div>
              </div>
            </div>
          </div>
        <div class="container">

            <div class="row">
                <div class="col-md-8 mx-auto">
                    <h1 class="text-center text-muted mb-3 mt-5">Fomulaire</h1>



                    <form action= "{{ route('ajouterReservation') }}" method="POST"  enctype="multipart/form-data" class="row g-3" id="form-reservation">
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                         @endif
                        @csrf

                        <div>
                           <p style="font-weight: bold">information du vehicule</p>
                        </div>
                        <div class="col-md-6">
                            <label for="firstname" id="marque" class="form-label">Marque</label>
                            <h5>{{ $vehicule->modele->marque->nom }}</h5>
                        </div>
                        <div class="col-md-6">
                            <label for="firstname" id="modele" class="form-label">Modele</label>
                            <h5>{{ $vehicule->modele->nom }}</h5>
                        </div>
                        <div class="col-md-6">

                            <label for="firstname" class="form-label">Date de debut</label>
                            <input type="date" name="date_debut" id="date_debut" class="form-control mb-1"  value="{{old('date_debut')}}" required  autocomplete="firstname" autofocus>
                            <small class="text-danger fw-ligth" id="error-register-date_debut"></small>
                        </div>
                        <div class="col-md-6">
                            <label for="lastname" class="form-label">Date de fin</label>
                            <input type="date" name="date_fin" id="date_fin" class="form-control mb-1"  value="{{old('date_fin')}}" required autocomplete="lastname" autofocus>
                            <small class="text-danger fw-ligth" id="error-register-date_fin"></small>

                        </div>
                        <div class="col-md-6">
                            <label for="lastname" class="form-label">Lieu de recuperation</label>
                            <input type="text" name="lieu_recup" id="lieu_recup" class="form-control mb-1"  value="{{old('lieu_recup')}}" required autocomplete="lastname" autofocus>
                            <small class="text-danger fw-ligth" id="error-register-lieu_recup"></small>
                        </div>
                        <div class="col-md-6">
                            <label for="lastname" class="form-label">Lieu de remise</label>
                            <input type="text" name="lieu_depot" id="lieu_rem" class="form-control mb-1"  value="{{old('lieu_rem')}}" required autocomplete="lastname" autofocus>
                            <small class="text-danger fw-ligth" id="error-register-lieu_rem"></small>
                        </div>
                        <div>
                            <p style="font-weight: bold">information personnel</p>
                        </div>

                        <div class="col-md-6">
                            <label for="firstname" class="form-label">Nom et prenoms</label>
                            @if(Auth::check())
                                    <h1>{{ Auth::user()->name}} {{ Auth::user()->firstname}}</h1>
                             @endif


                        </div>
                        <div class="col-md-6">
                            <label for="lastname" class="form-label">Phone</label>
                           <input type="int" id="latname" name="contactClient" value="{{ Auth::user()->contact}}" class="form-control mb-1" readonly>
                        </div>

                        <div class="col-md-6">

                           <input type="hidden" id="latname" name="code_reservation" value="{{ mt_rand(100000, 999999) }}" class="form-control mb-1">
                        </div>


                        <div><table>
                            <tr>
                                <td> <label for="avecChauffeur">Avec Chauffeur :</label></td>
                                <td><input type="checkbox" id="checkbox"></td>
                            </tr>
                        </div></table>
                        <div class="col-md-6">
                            <label for="lastname" class="form-label">Coût</label>
                            <table>
                           <td><input type="decimal" id="cout" name="cout" class="form-control mb-1"  readonly></td>
                                <td><h2>FCFA</h2></td>
                        </table>
                        </div>
                        <div class="col-md-6">

                           <input type="hidden" id="vehicule" name="vehicule_id"  value="{{ $vehicule->id }}" class="form-control mb-1">
                        </div>
                        <div class="">
                           <table>

                            <tr>
                            <td><h5 id="choix">Choisir un chauffeur :</h5></td>
                            <td><select id="select" name="chauffeur_id" >
                                @foreach (\App\Models\Candidat::all() as $candidat)
                                @if ($candidat->etat == 'chauffeur')
                                     @php
                                         // Calcul de l'âge à partir de la date de naissance
                                         $dateNaissance = new DateTime($candidat->naissance);
                                            $aujourdhui = new DateTime();
                                         $age = $aujourdhui->diff($dateNaissance)->y;
                                     @endphp
                                     <option value="">choisir un chauffeur</option>
                                    <option value="{{ $candidat->id }}">{{ $candidat->user->name }} {{ $candidat->user->firstname }} (Genre: {{ $candidat->user->sexe->nom }} ; Age: {{ $age }} ans ; Experience: {{ $candidat->experience }} ans) </option>
                                    @endif
                                @endforeach

                              </select></td>
                            </tr>
                        </table>
                        </div><br>


                        <div class="d-grid gap-2">
                            <button class="btn btn-primary" type="submit" id="register-user">Reserver</button>
                        </div>


                    </form>
                </div>

            </div>
        </div>
     </body>


     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
    // Cacher l'élément au chargement de la page
    $('#choix').hide();

    $('#checkbox').change(function(){
        if(this.checked){
            $('#choix').show();
        }else{
            $('#choix').hide();
        }
    });
});


$(document).ready(function(){
     // Cacher l'élément au chargement de la page
     $('#select').hide();
    $('#checkbox').change(function(){
        if(this.checked){
            $('#select').show();
        }else{
            $('#select').hide();
        }
    });
});

$(document).ready(function(){
    // Cacher l'élément au chargement de la page
    $('#vehicule').hide();

});

document.addEventListener('DOMContentLoaded', function() {
    var select = document.getElementById('select');
    var options = select.getElementsByTagName('option');

    for (var i = 0; i < options.length; i++) {
        if (i % 2 === 0) {
            options[i].style.backgroundColor = 'lightgray';
        } else {
            options[i].style.backgroundColor = 'lightblue';
        }
    }
});


$(document).ready(function() {
    // Fonction pour mettre à jour le coût lorsque les dates changent
    $('#date_debut, #date_fin, #checkbox').change(function() {
        var date_debut = $('#date_debut').val();
        var date_fin = $('#date_fin').val();

        // Calculer la différence en jours
        var diff = (new Date(date_fin) - new Date(date_debut)) / (1000 * 60 * 60 * 24);

        // Utiliser le tarif par jour pour calculer le coût
        var tarif_par_jour = {{ $vehicule->categorie->tarif_par_jour }};
        var cout = diff * tarif_par_jour;

        // Ajouter 25 000 fois diff au coût si la case avec chauffeur est cochée
        if ($('#checkbox').is(':checked')) {
            cout += 25000 * diff;
        }

        // Mettre à jour la valeur du champ "coût"
        $('#cout').val( cout.toFixed(2)); // Mettez à jour la valeur avec deux décimales et le préfixe "FCFA"
    });
});


function validateDates() {
        var dateDebut = new Date(document.getElementById('date_debut').value);
        var dateFin = new Date(document.getElementById('date_fin').value);
        var errorDateDebut = document.getElementById('error-register-date_debut');
        var errorDateFin = document.getElementById('error-register-date_fin');

        if (dateDebut >= dateFin) {
            errorDateDebut.innerText = "La date de début doit être antérieure à la date de fin.";
            errorDateFin.innerText = "La date de fin doit être postérieure à la date de début.";
        } else {
            // Réinitialise les messages d'erreur
            errorDateDebut.innerText = "";
            errorDateFin.innerText = "";
        }
    }

    // Vérifier les dates lors du changement
    $('#date_debut, #date_fin').on('change', validateDates);

    // Initialiser la validation des dates
    validateDates();


</script>



<script>
    $(document).ready(function(){
        // Cacher les éléments au chargement de la page
        $('#choix').hide();
        $('#select').hide();
        $('#vehicule').hide();

        $('#checkbox').change(function(){
            if(this.checked){
                $('#choix').show();
                $('#select').show();
            }else{
                $('#choix').hide();
                $('#select').hide();
            }
        });

        // Fonction de validation des dates
        function validateDates() {
            var dateDebut = new Date(document.getElementById('date_debut').value);
            var dateFin = new Date(document.getElementById('date_fin').value);
            var errorDateDebut = document.getElementById('error-register-date_debut');
            var errorDateFin = document.getElementById('error-register-date_fin');
            var isValid = true;

            if (dateDebut >= dateFin) {
                errorDateDebut.innerText = "La date de début doit être antérieure à la date de fin.";
                errorDateFin.innerText = "La date de fin doit être postérieure à la date de début.";
                isValid = false;
            } else {
                errorDateDebut.innerText = "";
                errorDateFin.innerText = "";
            }

            return isValid;
        }

        // Fonction pour mettre à jour le coût lorsque les dates changent
        function updateCost() {
            if (!validateDates()) {
                $('#cout').val('');
                return;
            }

            var date_debut = $('#date_debut').val();
            var date_fin = $('#date_fin').val();
            var diff = (new Date(date_fin) - new Date(date_debut)) / (1000 * 60 * 60 * 24);
            var tarif_par_jour = {{ $vehicule->categorie->tarif_par_jour }};
            var cout = diff * tarif_par_jour;

            if ($('#checkbox').is(':checked')) {
                cout += 25000 * diff;
            }

            $('#cout').val(cout.toFixed(2));
        }

        $('#date_debut, #date_fin, #checkbox').change(updateCost);

        // Initialiser la validation des dates et mise à jour du coût
        validateDates();
        updateCost();
    });
    </script>
</html>


@endsection
