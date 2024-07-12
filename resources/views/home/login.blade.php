@extends('base')

@section('title', 'Se connecter')

@section('content')

    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <title>Connexion</title>


        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <style>
            body {
                font-family: "DMSerif", Verdana;
                /* pour mettre des images en arriere plan de la page*/
                background-image: linear-gradient(rgb(0, 0, 0, 0.6), rgb(0, 0, 0, 0.6)), url("assets/images/Q.jpg");
                color-interpolation-filters: initial
                    /* VH veut dire prendre toute la page de l'utilisateur */
                    height: 100vh;
                background-size: cover;
                background-position: center;
                /*  Vireport Height*/

            }

            h1 {
                text-transform: uppercase;
                color: rgba(5, 33, 71, 0.342);
                word-spacing: 70%;
                text-align: center;
                text-shadow: 0 0 0 rgba(235, 13, 13, 0.61);
                font-family: 'Oswald', sans-serif;
            }

            main {
                min-height: 50px;
                background: rgba(175, 174, 174, 0.367);
                width: 70%;
                /*  Pour centrer une boite */
                margin: 40px 200px 20px;
                /* une bordure de la boite*/
                border: 2px solid rgba(191, 242, 233, 0.703);
                border-radius: 40px;
                box-shadow: 7px -6px 11px 6px rgb(105, 103, 103);
                padding: -5px -50% -50px;



            }
        </style>

    </head>

    <body class="font-sans antialiased">

        <main>
            <header>

                <div class="container">
                    <div class="row">
                        <div class="col-md-4 mx-auto">

                            <h1>
                                <p class="text-center text-muted mb-5">
                                    <font color="white"> AutoPaRc.com </font>
                                </p>
                            </h1>

                            <h1 class="text-center text-muted mb-5 mt-5">
                                <font color="black">Please log in</font>
                            </h1>


                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                @error('email')
                                    <div class="alert alert-danger text-center" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                                @error('password')
                                    <div class="alert alert-danger text-center" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" required
                                    class="form-control mb-3  @error('email') is-invalid @enderror "
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" required
                                    class="form-control mb-2 @error('password') is-invalid @enderror" required
                                    autocomplete="current-password" autofocus>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="remember" role="switch"
                                                name="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="remember">
                                                <font color="gray"></font>Remember me
                                            </label>
                                        </div>

                                    </div>

                                    <div class="col-md-6 text-end">

                                        <a href="">
                                            <font color="#f35525"> Forgot password?
                                        </a>
                                        </font>


                                    </div>

                                </div>
                                <div class="d-grid gap-2">
                                    <button class="btn btn-outline-danger" style="background:  orangered"
                                        type="submit">Sign in</button>
                                </div>
                                <p class="text-center text-muted mt-5">
                                    <font color="white">Not registered yet ? </font><a href="{{ route('register') }}">
                                        <font color="#f35525">Create an account</font>
                                    </a>
                                </p>


                            </form>


                        </div>

                    </div>
                </div>

            </header>




        </main>


    </body>

    </html>
@endsection

