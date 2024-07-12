@extends('app')
@if(Auth::check() && Auth::user()->email == 'amos12@gmail.com')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Car</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('admin') }}"> Back</a>
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
     
    <form action="{{ route('update',$vehicule->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
      
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Marque:</strong>
                    <input type="text" name="marque" value="{{ $vehicule->marque }}" class="form-control" placeholder="Marque">
                </div>
            </div>
           <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Modèle:</strong>
                    <input type="text" name="model" value="{{ $vehicule->model }}" class="form-control" placeholder="Modèle">
                </div>
            </div> 
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Matricule du vehicule :</strong>
                    <input type="text" name="matricule_vehicule" value="{{ $vehicule->matricule_vehicule }}" class="form-control" placeholder="Matricule du vehicule">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Status Assurance:</strong>
                    <input type="text" name="status_Assurance" value="{{ $vehicule->status_Assurance }}" class="form-control" placeholder="Status Assurance">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Date de Sortie:</strong>
                    <input type="text" name="date_De_Sortie" value="{{ $vehicule->date_De_Sortie }}" class="form-control" placeholder="Date de Sortie">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Detail:</strong>
                    <textarea class="form-control" id="detail" style="height:150px" name="detail" placeholder="Detail">{{ $vehicule->detail }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Image:</strong>
                    <input type="file" name="image" class="form-control" placeholder="image">
                    <img src="/images/{{ $vehicule->image }}" width="300px">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
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
    </form>
@endsection
@endif