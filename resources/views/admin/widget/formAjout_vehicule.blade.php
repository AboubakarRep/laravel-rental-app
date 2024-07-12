
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

              <div class="card-body">
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
                @method('get')
                 <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Marque:</strong>
                            <select id="marque_id"  class="form-control">
                                <option value="">Sélectionnez une marque</option>
                                @foreach(\App\Models\Marque::all() as $marque)
                                    <option value="{{ $marque->id }}">{{ $marque->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                   <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Modèle:</strong>
                            <select name="modele_id" id="modele_id" class="form-control">
                                <option value="">Sélectionnez une marque d'abord</option>
                            </select>
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

                        <tr>
                            <td> <label for="assurance">Assurance :</label></td>
                            <td><input type="checkbox"  id="assurance" name="assurance" value="true" ></td>
                        </tr>
                    </div></table>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Date d'achat:</strong>
                            <input type="date" name="date_achat" class="form-control" placeholder="Date de Sortie">
                        </div>
                    </div><br>
                    <div class="col-xs-12 col-sm-12 col-md-12" >
                        <div class="form-group">
                            <strong>Categorie:</strong>
                            <select name="categorie_id"  class="form-control">>
                                @foreach(\App\Models\Category::all() as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div><br>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <strong>Disponibilité:</strong>
                         <select  class="form-control">>
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

              </div>
          </div><!-- End Recent Sales -->

        </div>
      </div>


<script>
    document.getElementById('marque_id').addEventListener('change', function() {
        var marqueId = this.value;
        var modeleSelect = document.getElementById('modele_id');

        // Effacer les options actuelles du champ modèle
        modeleSelect.innerHTML = '<option value="">Sélectionnez un modèle</option>';

        if (marqueId) {
            // Faire une requête à l'API pour obtenir les modèles basés sur la marque sélectionnée
            fetch(`/api/modeles/${marqueId}`)
                .then(response => response.json())
                .then(data => {
                    data.forEach(modele => {
                        var option = document.createElement('option');
                        option.value = modele.id;
                        option.textContent = modele.nom;
                        modeleSelect.appendChild(option);
                    });
                })
                .catch(error => console.error('Erreur:', error));
        }
    });
</script>





    </section>

</main><!-- End #main -->

