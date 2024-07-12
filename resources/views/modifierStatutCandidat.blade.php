@extends('base')
@if(Auth::check() && Auth::user()->email == 'amos12@gmail.com')

@section('title','modifierSatatutCandidat')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
     <head>

     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <style>
        body {

          font-family: Arial, sans-serif;
          margin: 0;
          padding: 0;
          background-color: #f4f4f4;
        }
        .main {
          width: 80%;
          max-width: 600px;
          margin: 50px auto;
          background-color: #fff;
          padding: 20px;
          border-radius: 8px;
          box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
          text-align: center;
        }
        label {
          display: block;
          margin-bottom: 10px;
        }
        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="file"],#genre,
        textarea {
          width: 100%;
          padding: 10px;
          margin-bottom: 20px;
          border: 1px solid #ccc;
          border-radius: 4px;
          box-sizing: border-box;
        }
        input[type="submit"] {
          background-color: orange;
          color: #fff;
          border: none;
          padding: 12px 20px;
          border-radius: 4px;
          cursor: pointer;
        }
        input[type="submit"]:hover {
          background-color: orange;
        }
</style>
     </head>

      <body>

      <div class="main">
    <h2>Mise à jour candidat</h2><br>
    <form action="{{ route('miseAjour',$candidat->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
      <label for="nom">Nom :</label>
      <h5>{{ $candidat->nom }}</h5>

      <label for="prenom">Prénom :</label>
      <h5>{{ $candidat->prenoms }}</h5>

      <label for="prenom">Date de naissance :</label>
      <h5>{{ $candidat->naissance }}</h5>

      <label for="email">Email :</label>
      <input type="email" id="email" name="email" value="{{ $candidat->email }}" class="form-control" placeholder="email"  readonly>

      <label for="telephone">Téléphone :</label>
      <input type="tel" id="telephone" name="telephone" value="{{ $candidat->telephone }}" class="form-control" placeholder="telephone">

      <label for="ville">Lieu d'habitation :</label>
      <input type="text" id="ville" name="habitation" value="{{ $candidat->habitation }}" class="form-control" placeholder="habitation">

      <label for="experience">Expérience (en années) :</label>
      <input type="number" id="experience" name="experience" min="0" value="{{ $candidat->experience }}" required>

      <label for="statut">Statut:</label>
          <select name="etat"  id="genre" required>
              <option value="candidat" {{ $candidat->etat == 'candidat' ? 'selected' : '' }}>Candidat</option>
              <option value="chauffeur" {{ $candidat->etat == 'chauffeur' ? 'selected' : '' }}>Chauffeur</option>
          </select>

          <label for="profil">Photo de profil :</label>
          <input type="file" id="profil" name="profil" accept="image/*" class="form-control" placeholder="image">
          <img src="/images/{{ $candidat->profil }}" >
      
          <label for="permis">Permis de conduire :</label>
          <input type="file" id="permis" name="permis" accept="image/*" required>
          <img src="/images/{{ $candidat->permis }}" >
          
      <input type="submit" value="Envoyer">
    </form>
</div>



<script>
    // Ajouter un événement pour détecter la saisie de texte dans les champs de texte, sauf pour le champ de motivation
    var inputs = document.querySelectorAll('input[type="text"]');
    for (var i = 0; i < inputs.length; i++) {
        if (inputs[i].id !== 'motivation') { // Exclure le champ de motivation
            inputs[i].addEventListener('input', adjustInput);
        }
    }

    function adjustInput() {
        var input = this;
        var maxLength = 20; // Limite de caractères pour les champ "
        var text = input.value;

        // Tronquer le texte si nécessaire
        if (text.length > maxLength) {
            input.value = text.slice(0, maxLength);
        }
    }
</script>





<script>
    // Ajouter un événement pour détecter la saisie de texte dans le champ de motivation
    document.getElementById('motivation').addEventListener('input', function() {
        var textarea = this;
        var maxCharsPerLine = 20; // Nombre maximum de caractères par ligne
        var text = textarea.value;
        var lines = text.split('\n'); // Séparer le texte par ligne

        // Vérifier chaque ligne et ajouter un retour à la ligne si nécessaire
        for (var i = 0; i < lines.length; i++) {
            if (lines[i].length > maxCharsPerLine) {
                lines[i] = lines[i].replace(new RegExp('(.{' + maxCharsPerLine + '})', 'g'), '$1\n');
            }
        }

        // Mettre à jour le texte dans le champ de motivation
        textarea.value = lines.join('\n');
    });
</script>
      </body>

</html>
@endsection
@endif
