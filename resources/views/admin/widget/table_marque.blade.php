
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


              <div class="card-body" style="padding-top: 1%">


                <a href="{{ route('ajouterMarque') }}" class="btn btn-primary"  style="background-color: orange;">Ajouter marque</a>

                <table class="table">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Action</th>
                            <th>Actions</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($marques as $marque)
                            <tr>
                                <td>{{ $marque->nom }}</td>

                               {{-- <td>
                                    <a href="{{ route('modifierMarque' ,$marque->id) }}" class="btn btn-primary">Modifier</a>
                                </td>--}}
                                <td>
                                  <form action="{{ route('SupprimerMarque', $marque->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-primary">Supprimer</button>
                                </form>
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

