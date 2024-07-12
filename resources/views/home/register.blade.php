@extends('base')

@section('title', 'Créer un compte')

@section('content')

    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <title>Compte</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <style>
            body {
                font-family: "DMSerif", Verdana;
                /* pour mettre des images en arriere plan de la page*/
                background-image: linear-gradient(rgb(0, 0, 0, 0.6), rgb(0, 0, 0, 0.6)), url("assets/images/M.jpg");
                color-interpolation-filters: initial
                    /* VH veut dire prendre toute la page de l'utilisateur */
                    height: 100vh;
                background-size: cover;
                background-position: center;
                /*  Vireport Height*/

            }


            main {
                min-height: 90px;
                background: rgba(58, 56, 56, 0.367);
                width: 80%;
                /*  Pour centrer une boite */
                margin: 60px 120px 60px;
                /* une bordure de la boite*/
                border: 2px solid rgba(224, 234, 232, 0.703);
                border-radius: 50px;
                box-shadow: 7px -6px 11px 6px rgb(20, 2, 2);
                padding: -5%;

            }
        </style>

    </head>

    <body class="font-sans antialiased">
        <main>

            <div class="container">
                <div class="row">
                    <div class="col-md-5 mx-auto">
                        <h1 class="text-center text-muted mb-5 mt-5">
                            <font color="white"> * Account *</font>
                        </h1>
                        <p class="text-center text-muted mb-3">
                            <font color="enjay">
                                Create an account if you don't have one...
                            </font>
                        </p>


                        <form method="POST" action="{{ route('register') }}" class="row g-3" id="form-register">
                            @csrf

                            <div class="col-md-6">
                                <label for="firstname" class="form-label">
                                    <font color="gray"> First Name:
                                    </font>
                                </label>
                                <input type="text" name="firstname" id="firstname" class="form-control mb-1"
                                    value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>
                                <small class="text-danger fw-ligth" id="error-register-firstname"></small>
                            </div>
                            <div class="col-md-6">
                                <label for="lastname" class="form-label">
                                    <font color="gray"> Last Name:
                                    </font>
                                </label>
                                <input type="text" name="lastname" id="lastname" class="form-control mb-1"
                                    value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>
                                <small class="text-danger fw-ligth" id="error-register-lastname"></small>
                            </div>
                            <div class="col-md-12">
                                <label for="email" class="form-label">
                                    <font color="gray">E-mail:
                                    </font>
                                </label>
                                <input type="email" name="email" id="email" class="form-control mb-1"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <small class="text-danger fw-ligth" id="error-register-email"></small>
                            </div>

                            <div class="col-md-6">
                                <label for="password" class="form-label">
                                    <font color="gray">Password:
                                    </font>
                                </label>
                                <input type="password" name="password" id="password" class="form-control mb-1"
                                    value="{{ old('password') }}" required autocomplete="password" autofocus>
                                <small class="text-danger fw-ligth" id="password"></small>
                            </div>
                            <div class="col-md-6">
                                <label for="password-confirm" class="form-label">
                                    <font color="gray">password-confirm:
                                    </font>
                                </label>
                                <input type="password" name="password-confirm" id="password-confirm"
                                    class="form-control mb-1" value="{{ old('password-confirm') }}" required
                                    autocomplete="password-confirm" autofocus>
                                <small class="text-danger fw-ligth" id="password-confirm"></small>
                            </div>

                            <div class="col-md-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="agreeTerms">
                                    <Agree class="form-check-label" for="flexCheckDisabled">
                                        <font color="gray">Agree team
                                        </font> </label><br>
                                        <small class="text-danger fw-ligth" id="error-register-agreeTerms"></small>
                                </div>
                            </div>

                            <div class="d-grid gap-2">
                                <button class="btn btn-outline-danger" style="background: orangered" type="button"
                                    id="register-user">Sign up</button>
                            </div>
                            <p class="text-center text-muted mt-5">
                                <font color="orange"></font>Already have an account ? <a href="{{ route('login') }}">
                                    <font color="red">login an account</font>
                                </a>
                            </p>


                        </form>
                    </div>

                </div>
            </div>
        </main>
    </body>

    </html>
@endsection
