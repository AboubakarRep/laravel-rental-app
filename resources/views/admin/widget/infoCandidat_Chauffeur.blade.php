
@include('admin.widget.navbar');

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Info Candidat</h1>
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

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>
                </ul>
              </div>

              <div class="card-body">

                <table  class="table table-borderless datatable">

                    <tr>
                            <td><img src="/images/profil/{{ $candidat->profil }}  " style="width: 150px;" ></td>
                            <td>

                            </td>
                    </tr>
                            <tr>
                            <td>NOM</td><td>{{ $candidat->user->name }}</td>
                            </tr>
                            <tr>
                            <td>PRENOMS</td><td>{{ $candidat->user->firstname }}</td>
                            </tr>
                            <tr>
                            <td>GENRE</td><td>{{ $candidat->user->sexe->nom }}</td>
                            </tr>
                            <tr>
                            <td>EMAIL</td><td>{{ $candidat->user->email }}</td>
                            </tr>
                            <tr>
                            <td>CONTACT</td><td>{{ $candidat->user->contact }}</td>
                            </tr>
                            <tr>
                            <td>HABITATION</td><td>{{ $candidat->habitation }}</td>
                            </tr>
                            <tr>
                            <td>EXPERIENCE</td><td>{{ $candidat->experience }}</td>
                            </tr>
                            <tr>
                                <td>MOTIVATION</td>
                                <td>{{ $candidat->motivation }}</td>
                            </tr>
                            <tr>
                                <td>PERMIS DE CONDUIRE</td>
                                <td><img src="/images/permis/{{ $candidat->permis }}" style="width: 800px;"></td>
                            </tr>

                    </table>

              </div>

            </div>
          </div><!-- End Recent Sales -->



        </div>
      </div>
    </section>

</main><!-- End #main -->

