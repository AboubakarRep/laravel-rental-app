@include('admin.widget.navbar');

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Ajouter un sexe</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Ajouter Sexe</li>
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

              <div style="padding: 2%">
              <form action="{{ route('storeSexe') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" name="nom" id="nom" class="form-control" required>
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
