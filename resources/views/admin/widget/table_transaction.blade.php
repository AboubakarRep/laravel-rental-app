
@include('admin.widget.navbar');

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Transactions</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Transaction</li>
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


                <a href="{{ route('ajouterCategorie') }}" class="btn btn-primary">Ajouter categorie</a>

                <table class="table">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Tarif par jour</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->tarif_par_jour }}</td>
                                <td>
                                    <a href="" class="btn btn-primary">Modifier</a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
              </div>

            </div>
          </div><!-- End Recent Sales -->



        </div>
      </div>
    </section>

</main><!-- End #main -->

