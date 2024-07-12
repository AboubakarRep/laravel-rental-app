@extends('app')
@if(Auth::check() && Auth::user()->email == 'amos12@gmail.com')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Ajouter un nouveau véhicule</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ url('/admin') }}"> Retour</a>
        </div>
    </div>
</div>

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

<form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
    @csrf

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Marque:</strong>
                <input type="text" name="marque" class="form-control" placeholder="Marque">
            </div>
        </div>
       <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Modèle:</strong>
                <input type="text" name="model" class="form-control" placeholder="Modèle">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Matricule du vehicule :</strong>
                <input type="text" name="matricule_vehicule" class="form-control" placeholder="Matricule du vehicule">
            </div>
        </div>
        <div><table>
            <tr>
                <td> <label for="climatisation">Climatisation :</label></td>
                <td><input type="checkbox" id="climatisation" name="climatisation" value="true" ></td>
            </tr>

            <tr>
                <td> <label for="gps">GPS :</label></td>
                <td><input type="checkbox"  id="gps" name="gps" value="true" ></td>
            </tr>
        </div></table>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status Assurance:</strong>
                <input type="text" name="status_Assurance" class="form-control" placeholder="Status Assurance">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Date de Sortie:</strong>
                <input type="date" name="date_De_Sortie" class="form-control" placeholder="Date de Sortie">
            </div>
        </div><br>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="categorie">Categorie :</label>
                <select name="categorie_id">
                    @foreach(\App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div><br>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <label for="disponibilite">Disponibilité :</label>
          <select name="disponibilite" >
              <option value="Disponible">Disponible</option>
              <option value="Indisponible">Indisponible</option>
          </select>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Image:</strong>
                <input type="file" name="image" class="form-control" placeholder="image">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </div>
    </div>
</form>

<script>
    // Ajouter un événement pour détecter la saisie de texte dans les champs de texte, sauf pour le champ de détail
    var inputs = document.querySelectorAll('input[type="text"]');
    for (var i = 0; i < inputs.length; i++) {
        if (inputs[i].id !== 'detail') { // Exclure le champ de détail
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
    // Ajouter un événement pour détecter la saisie de texte dans le champ de détail
    document.getElementById('detail').addEventListener('input', function() {
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

        // Mettre à jour le texte dans le champ de détail
        textarea.value = lines.join('\n');
    });
</script>
@endsection
@endif
