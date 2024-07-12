<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config('app.name')}}- @yield('title')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('assets/css/fontawesome.css')}}">
        <link rel="icon" href="{{ asset('assets/images/app_auto.png') }}">
        <link rel="shortcut icon" href="{{ asset('assets/images/app_auto.png') }}" type="image/x-icon">
        <link rel="stylesheet" href="{{asset('assets/css/new.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/templatemo-villa-agency.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/owl.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
        <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    </head>
    <body>
         @yield('content')














          <!-- Scripts -->
          <script src="{{ asset('jquery/jquery.js')}}"></script>
          <script src="{{ asset('main/users/user.js')}}"></script>
          <script src="{{ asset('main/users/reservation.js')}}"></script>
          <script src="{{ asset('main/users/candidature.js')}}"></script>




    </body>
</html>
