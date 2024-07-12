
@include('admin.widget.navbar');

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Vehicule</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Vehicule</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
     <!-- Left side columns -->
     <div class="col-lg-12">



        <div class="row">




          <!-- Recent Sales -->
          <div class="col-12">
            <div class="card recent-sales overflow-auto">

              <div class="card-body">
                <div class="row" style="padding: 1%">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('admin') }}"> Retour</a>
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
                                <input type="text"  value="{{ $vehicule->modele->marque->nom }}" class="form-control" readonly>
                            </div>
                        </div>
                       <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Modèle:</strong>
                                <input type="text"  value="{{ $vehicule->modele->nom }}" class="form-control" readonly >
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Matricule du vehicule :</strong>
                                <input type="text" name="matricule_vehicule" value="{{ $vehicule->matricule_vehicule }}" class="form-control"  readonly>
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
                                <strong>Date d'achat:</strong>
                                <input type="text" name="date_achat" value="{{ $vehicule->date_achat }}" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="categorie">Categorie :</label>
                                <select name="categorie_id">
                                    @foreach(\App\Models\Category::all() as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="disponibilite">Disponibilité :</label>
                         <select name="disponibilite" required>
                          <option value="Disponible"  {{ $vehicule->disponibilite == 'Disponible' ? 'selected' : '' }}>Disponible</option>
                          <option value="Indisponible"  {{ $vehicule->disponibilite == 'Indisponible' ? 'selected' : '' }}>Indisponible</option>
                      </select>
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
            </div>
        </section>

</main><!-- End #main -->

