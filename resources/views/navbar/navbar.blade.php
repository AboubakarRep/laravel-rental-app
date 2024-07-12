<head>
    <style>
        .user-info {
            text-align: right;
            position: relative;
            padding-left:  18px;
        }

    .logo h1 {
        position: relative;
        margin-top: -0px;
        margin-left: 10px; /* Marge à gauche pour séparer l'image du texte */
    }

    .logo {
    display: flex; /* Utilisation de Flexbox */
    align-items: center; /* Alignement vertical des éléments au centre */
    text-decoration: none; /* Supprimer la décoration du lien */
    position: relative;
    margin-top: -21px
}

.logo-img {
    position: relative;
    max-height: 50px; /* Hauteur maximale de l'image */
    width: auto; /* Largeur automatique pour conserver les proportions */
    margin-top: 10px;


    object-fit: contain;
    transform: scale(2);

}
.logoname{
    margin-top:30px;

    height: 40px;
}
.contlogo{

    height: 50px;
    width: 80px;
    margin-right: 10px;
    transform: scale(1.5);
}

.logo-text {
    position: relative;
    margin-top: -20px;
}



    </style>
</head>

 <!-- ***** Header Area Start ***** -->
 <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->


                        <div class="contlogo"  class="logo me-auto">
                            <img src="{{ asset('assets/images/app_auto.png') }}" alt="" class="logo-img">

                        </div>
                        <div class="logoname"><h1 class="logo-text" class="logo me-auto" >{{config('app.name')}}</h1></div>



                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                      <li><a href=" {{route('app_home')}} " class="nav-item nav-link @if(Request::route()->getName() =='app_home') active @endif ">Home</a></li>
                      <li><a href=" {{route('app_reservation')}} " class="nav-item nav-link @if(Request::route()->getName() =='app_reservation') active @endif ">Reservation</a></li>
                      <li><a href=" {{route('login')}} " class="nav-item nav-link @if(Request::route()->getName() =='login') active @endif ">Mon Compte</a></li>
                      <li><a href=" {{route('app_postuler')}}" class="nav-item nav-link @if(Request::route()->getName() =='app_postuler') active @endif ">Postuler</a></li>
                      <li><a href="#contactez_nous" class="nav-item nav-link "><i class="fa fa-phone"></i>
                        Contactez nous</a></li>
                      @if(Auth::check() && (Auth::user()->email == 'amos12@gmail.com' || Auth::user()->email == 'caisse12@gmail.com' || Auth::user()->email == 'rh11@gmail.com'))
                        <li><a href="{{ route('app_admin-home') }}" class="nav-item nav-link "><i class="fa fa-calendar"></i> Admin</a></li>
                      @endif
                  </ul>
                    <div class="user-info" name="user_infoc" >
                        @if(Auth::check())
                            <h2 name="users_info">{{ Auth::user()->name}}</h2>
                        @endif
                    </div>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                        <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->
