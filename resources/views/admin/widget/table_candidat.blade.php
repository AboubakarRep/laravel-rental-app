
@include('admin.widget.navbar');

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Candidats</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Candidat</li>
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


                <table class="table table-borderless datatable">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nom</th>
                      <th scope="col">Prenoms</th>
                      <th scope="col">Genre</th>
                      <th scope="col">Email</th>
                      <th scope="col">Contact</th>
                      <th scope="col">Habitation</th>
                      <th scope="col">Experience(année)</th>
                      <th scope="col">Action</th>
                      <th scope="col">Action</th>



                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($candidats as $candidat)
                    @if ($candidat->etat == 'candidat')
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $candidat->user->name }}</td>
                            <td>{{ $candidat->user->firstname }}</td>
                            <td>{{ $candidat->user->sexe->nom }}</td>
                            <td>{{ $candidat->user->email }}</td>
                            <td>{{ $candidat->user->contact }}</td>
                            <td>{{ $candidat->habitation }}</td>
                            <td>{{ $candidat->experience }}</td>

                            <td> <a class="btn btn-info" href="{{ route('voirInfo',$candidat->id) }}">info</a></td>

                            <td><a class="btn btn-primary" href="{{ route('modifier',$candidat->id) }}">etat</a></td>
                          {{-- <td>
                            <form action="{{ route('Supprimer', $candidat->id) }}" method="POST">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-primary">Supprimer</button>
                          </form>
                        </td>--}}

                          </tr>

                        @endif
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

