
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
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
                <div>
            <a href="{{ route('createnew') }}" class="btn btn-primary"  style="background-color: orange;">Ajouter vehicule</a>
        </div>
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Image</th>
                    <th>Marque</th>
                    <th>Modèle</th>
                    <th>Matricule du vehicule</th>
                    <th>Status Assurance</th>
                    <th>Date d'achat</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($vehicules as $vehicule)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td><img src="/images/{{ $vehicule->image }}" width="100px"></td>
                    <td>{{ $vehicule->modele->marque->nom }}</td>
                    <td>{{ $vehicule->modele->nom }}</td>
                    <td>{{ $vehicule->matricule_vehicule }}</td>
                    <td>
                        @if ($vehicule->assurance)
                            Assuré
                        @else
                             Non assuré
                        @endif
                    </td>
                    <td>{{ $vehicule->date_achat }}</td>

                    <td>
                        <form action="{{ route('destroy',$vehicule->id) }}" method="POST">

                            <a class="btn btn-info" href="{{ route('show',$vehicule->id) }}">Voir</a>

                            <a class="btn btn-primary" href="{{ route('edit',$vehicule->id) }}">modifier</a>

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>

            {!! $vehicules->links() !!}


              </div>

            </div>
          </div><!-- End Recent Sales -->



        </div>
      </div>
    </section>

</main><!-- End #main -->

