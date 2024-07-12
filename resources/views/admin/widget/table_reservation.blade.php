

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Reservation</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Reservation</li>
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


                <table class="table table-borderless datatable" class="table app-table-hover mb-0 text-center table-striped table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Code_reservation</th>
                      <th scope="col">Date debut</th>
                      <th scope="col">Date fin</th>
                      <th scope="col">Chauffeur</th>
                      <th scope="col">Cout</th>
                      <th scope="col">Lieu de recuperation</th>
                      <th scope="col">Lieu de depot</th>
                      <th scope="col">Vehicule</th>
                      <th scope="col">Client</th>
                      <th scope="col">Contact client</th>
                      <th scope="col">Status</th>
                      <th scope="col">Action</th>
                      <th scope="col">Facture</th>

                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($reservations as $reservation)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $reservation->code_reservation }}</td>
                        <td>{{ $reservation->date_debut }}</td>
                        <td>{{ $reservation->date_fin }}</td>
                        <td>{{ $reservation->candidat->nom}}</td>
                        <td>{{ $reservation->cout }} FCFA</td>
                        <td>{{ $reservation->lieu_recup }}</td>
                        <td>{{ $reservation->lieu_depot }}</td>
                        <td>{{ $reservation->vehicule->marque }}</td>
                        <td>{{ $reservation->user->name}}</td>
                        <td class="text-primary">{{ $reservation->contactClient }}</td>
                        <td class="@if($reservation->statut == 'Confirmé')  badge bg-success @elseif($reservation->statut == 'En cours') badge bg-warning @else badge bg-danger @endif">
                         
                          <span>{{ $reservation->statut }}</span>
                        </td>
                        <td>
                            <form action="{{ route('modifierSatatutReservation', $reservation->id) }}" method="GET">
                                @csrf
                                <button id="j" type="submit" class="btn btn-danger">Changer statut</button>
                            </form>
                        </td>
                        <td>
                            <a href="{{route('recu.download',['id' => $reservation->id])}}"><i class="bi bi-download bi-5x"></i></a>
                        </td>
                        <td>
                          <form action="{{ route('SupprimerRes', $reservation->id) }}" method="POST">
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

