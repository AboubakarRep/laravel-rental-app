@include('admin.widget.navbar');

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Liste des sexes</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Sexes</li>
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
                            <a href="{{ route('ajouterSexe') }}" class="btn btn-primary" style="background-color: orange;">Ajouter un sexe</a>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nom</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sexes as $sexe)
                                    <tr>
                                        <td>{{ $sexe->id }}</td>
                                        <td>{{ $sexe->nom }}</td>
                                           {{-- <td>
                                            <a href="{{ route('modifierSexe', $sexe) }}" class="btn btn-primary">Modifier</a>
                                            </td>--}}
                                            <td>
                                            <form action="{{ route('supprimerSexe', $sexe) }}" method="post" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Supprimer</button>
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
