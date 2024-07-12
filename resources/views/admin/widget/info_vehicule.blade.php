
@include('admin.widget.navbar');

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Vehicule</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Vehicules</li>
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


                <div class="row" style="padding: 4%">
                    <div class="col-lg-12 margin-tb">

                        <div class="pull-right">
                            <a class="btn btn-primary"  href="{{ route('admin') }}"> Retour</a>
                        </div>
                    </div>
                </div>

                <div class="row" style="padding: 4%">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Marque:</strong>
                            {{ $vehicule->modele->marque->nom }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Modèle:</strong>
                            {{ $vehicule->modele->nom }}
                        </div>
                        <div class="form-group">
                            <strong>Matricule du vehicule:</strong>
                            {{ $vehicule->matricule_vehicule }}
                        </div>
                        <div class="form-group">
                            <strong>Status Assurance:</strong>
                            {{ $vehicule->status_Assurance }}
                        </div>
                        <div class="form-group">
                            <strong>Date d'achat:</strong>
                            {{ $vehicule->date_achat }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">

                            <img src="/images/{{ $vehicule->image }}" width="500px">
                        </div>
                    </div>

              </div>

            </div>
          </div><!-- End Recent Sales -->



        </div>
      </div>
    </section>

</main><!-- End #main -->

