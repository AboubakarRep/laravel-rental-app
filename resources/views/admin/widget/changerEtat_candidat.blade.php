
@include('admin.widget.navbar');

<main id="main" class="main">




    <div class="pagetitle">
      <h1>Candidat</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Candidats</li>
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

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div>
              <div class="main" style="padding: 2%">
                <h2>Mise à jour candidat</h2><br>
                <form action="{{ route('miseAjour',$candidat->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                    <label for="nom">Nom :</label>
                                     <h5>{{ $candidat->user->name }}</h5>
                             </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="prenom">Prénom :</label>
                                <h5>{{ $candidat->user->firstname }}</h5>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                 <label for="prenom">Date de naissance :</label>
                                 <h5>{{ $candidat->naissance }}</h5>
                            </div>
                         </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                     <label for="email">Email :</label>
                                     <input type="email" id="email" value="{{ $candidat->user->email }}" class="form-control"  readonly>
                                </div>
                             </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="telephone">Téléphone :</label>
                                         <input type="tel" id="telephone"  value="{{ $candidat->user->contact }}" class="form-control" readonly>
                                     </div>
                              </div>
                              <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                     <label for="ville">Lieu d'habitation :</label>
                                     <input type="text" id="ville" name="habitation" value="{{ $candidat->habitation }}" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                         <label for="experience">Expérience (en années) :</label>
                                         <input type="number" id="experience" name="experience" min="0" value="{{ $candidat->experience }}" required readonly>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="statut">Statut:</label>
                                             <select name="etat"  id="genre" >

                                                 <option value="candidat" {{ $candidat->etat == 'candidat' ? 'selected' : '' }}>Candidat</option>
                                                 <option value="chauffeur" {{ $candidat->etat == 'chauffeur' ? 'selected' : '' }}>Chauffeur</option>
                                             </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="profil">Photo de profil :</label>
                                        <input type="file" id="profil" name="profil" accept="image/*" class="form-control" placeholder="image" >
                                         <img src="/images/profil/{{ $candidat->profil }}" style="width: 150px" >
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="permis">Permis de conduire :</label>
                                        <input type="file" id="permis" name="permis" accept="image/*"  class="form-control" placeholder="image" >
                                         <img src="/images/permis/{{ $candidat->permis }}"  style="width: 300px">
                                    </div>
                                 </div>
                                 <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                        <input type="submit" value="Envoyer">
                                </div>
                     </div>
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
            </div>
        </section>

</main><!-- End #main -->

