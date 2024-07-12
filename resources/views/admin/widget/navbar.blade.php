<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{config('app.name')}}</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>

@auth
    @if(Auth::check() && Auth::user()->email == 'amos12@gmail.com')

        <!-- ======= Sidebar ======= -->
        <aside id="sidebar" class="sidebar">
            <ul class="sidebar-nav" id="sidebar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('app_admin-home') }}">
                        <i class="bi bi-grid"></i>
                        <span>Dashboard</span>
                    </a>
                </li><!-- End Dashboard Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#reservations-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-menu-button-wide"></i><span>Reservations</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="reservations-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="{{ route('reservationeff') }}">
                                <i class="bi bi-circle"></i><span>Consulter reservation</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('app_admin_formulaire_reservation') }}">
                               <!--  <i class="bi bi-circle"></i><span>Ajouter reservation</span>-->
                            </a>
                        </li>
                    </ul>
                </li><!-- End Reservations Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#chauffeurs-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-menu-button-wide"></i><span>Chauffeurs</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="chauffeurs-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="{{ route('postulation') }}">
                                <i class="bi bi-circle"></i><span>Consulter chauffeurs</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                               <i class="bi bi-circle"></i><span>Ajouter chauffeur</span>
                            </a>
                        </li>
                    </ul>
                </li><!-- End Chauffeurs Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#vehicules-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-journal-text"></i><span>Vehicules</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="vehicules-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="{{ route('admin') }}">
                                <i class="bi bi-circle"></i><span>Consulter vehicule</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('createnew') }}">
                                <i class="bi bi-circle"></i><span>Ajouter vehicule</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('categorieliste') }}">
                                <i class="bi bi-circle"></i><span>Categorie vehicule</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('marqueliste') }}">
                                <i class="bi bi-circle"></i><span>Marque vehicule</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('modeleliste') }}">
                                <i class="bi bi-circle"></i><span>Modele vehicule</span>
                            </a>
                        </li>
                    </ul>
                </li><!-- End Vehicules Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#candidat-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-menu-button-wide"></i><span>Candidat</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="candidat-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="{{ route('postulations') }}">
                                <i class="bi bi-circle"></i><span>Consulter candidats</span>
                            </a>
                        </li>

                    </ul>
                </li><!-- End Candidat Nav -->



                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#candidat-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-menu-button-wide"></i><span>Utilisateur</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="candidat-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="{{ route('sexeliste') }}">
                                <i class="bi bi-circle"></i><span>Consulter Liste Sexe</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('ajouterSexe') }}">
                                <i class="bi bi-circle"></i><span>Ajouter Sexe</span>
                            </a>
                        </li>
                    </ul>
                </li><!-- End Candidat Nav -->
            </ul>
        </aside><!-- End Sidebar-->

        @endif
    @if(Auth::check() && Auth::user()->email == 'caisse12@gmail.com')
        <!-- ======= Sidebar ======= -->
        <aside id="sidebar" class="sidebar">
            <ul class="sidebar-nav" id="sidebar-nav">
                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#caisse-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-layout-text-window-reverse"></i><span>Caisse</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="caisse-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="{{ route('reservationeff') }}">
                                <i class="bi bi-circle"></i><span>Consulter caisse</span>
                            </a>
                        </li>
                    </ul>
                </li><!-- End Caisse Nav -->
            </ul>
        </aside><!-- End Sidebar-->
    @endif

@endauth

</body>
</html>
