@include('admin.widget.navbar');

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Modifier un sexe</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Sexe</li>
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
              <div class="card-body" style="padding-top: 1%">
                <form action="{{ route('changerSexe', $sexe->id) }}" method="post">
                  @csrf
                  @method('PUT')
                  <div class="form-group">
                    <label for="nom">Nom :</label>
                    <input type="text" name="nom" id="nom" class="form-control" value="{{ $sexe->nom }}" required>
                  </div>
                  <button type="submit" class="btn btn-primary">Modifier</button>
                </form>
              </div>
            </div>
          </div><!-- End Recent Sales -->
        </div>
      </div>
    </section>

</main><!-- End #main -->
