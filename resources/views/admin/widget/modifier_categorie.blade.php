
@include('admin.widget.navbar');

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Categories</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Categorie</li>
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
              <div style="padding: 2%">
              <form action="{{ route('changerCategorie' , $categorie->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="{{ $categorie->name }}" required>
                </div>
                <div class="form-group">
                    <label for="tarif_par_jour">Tarif par jour</label>
                    <input type="number" name="tarif_par_jour" id="tarif_par_jour" class="form-control" placeholder="{{ $categorie->tarif_par_jour }}" required>
                </div><br>
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </form>
        </div>


              </div>
          </div><!-- End Recent Sales -->

        </div>
      </div>

    </section>

</main><!-- End #main -->

