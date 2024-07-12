@extends('base')

@section('title','Postuler')

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

          background-image: url("../assets/images/fondPostuler.jpg");
          background-size: cover; /* Réduit la taille de l'image pour couvrir entièrement l'élément */
          background-repeat: no-repeat; /* Empêche la répétition de l'image */
        }
        .main {
          width: 80%;
          max-width: 600px;
          margin: 50px auto;
          background-color: rgba(255, 255, 255, 0.5); /* Blanc avec une opacité de 0.5 */
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
        input[type="number"],
        input[type="date"],
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
          background-color: rgba(255, 255, 255, 0.3); /* Blanc avec une opacité de 0.5 */
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
     @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
  @endif
     @if (session('success'))
     <div class="alert alert-success">
         {{ session('success') }}
     </div>
          @endif
      <body>
      <div class="main">
    <h2>Formulaire de candidature </h2><br>

    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form action= "{{ route('ajouter') }}" method="POST"  enctype="multipart/form-data">
        @csrf
        @method('get')
      <label for="nom">Nom :</label>
      <input type="text" id="nom"  value="{{ Auth::user()->name }}" readonly required>

      <label for="prenom">Prénom :</label>
      <input type="text" id="prenom"  value="{{ Auth::user()->firstname }}" readonly required>

      <label for="sexe">Genre :</label>
      <input type="text" id="prenom"  value="{{ Auth::user()->sexe->nom }}" readonly required>

      <label for="prenom">Date de naissance :</label>
      <input type="date" id="prenom" name="naissance" required><br><br>

      <label for="email">Email :</label>
      <input type="text" id="email" name="email" value="{{ Auth::user()->email }}" readonly required>


      <label for="telephone">Téléphone :</label>
      <input type="tel" id="telephone" value="{{ Auth::user()->contact }}" readonly required>


      <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" readonly required>

      <label for="ville">Lieu d'habitation :</label>
      <input type="text" id="ville" name="habitation" required>

      <label for="experience">Expérience (en années) :</label>
      <input type="number" id="experience" name="experience" min="0" required>

      <label for="motivation">Motivation :</label>
      <textarea id="motivation" name="motivation" rows="4" required></textarea>

      <label for="photo">Photo de profil :</label>
      <input type="file" id="photo" name="profil" accept="image/*" required>

      <label for="photo">Permis de conduire :</label>
      <input type="file" id="photo" name="permis" accept="image/*" required>

      <input type="hidden" id="" name="etat" value="Candidat"    >

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
