@if(Auth::check() && Auth::user())
@if(Auth::check() && Auth::user()->email == 'amos12@gmail.com')

@extends('admin.base_admin')
@section('page','Reservation')

@section('content_admin')
    @include('admin.widget.header')

    @include('admin.widget.navbar')

    @include('admin.widget.formulaire_reservation')
    @include('admin.widget.footer')


@endsection
@endif
@endif