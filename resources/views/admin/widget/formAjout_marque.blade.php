
@include('admin.widget.navbar');

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Marques</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Marque</li>
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
              <form action="{{ route('storeMarque') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nom</label>
                    <input type="text" name="nom" id="name" class="form-control" required>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </form>
        </div>


              </div>
          </div><!-- End Recent Sales -->

        </div>
      </div>

    </section>

</main><!-- End #main -->

