
@extends('admin.base_admin')

@section('content_admin')
    @include('admin.widget.header')

    @include('admin.widget.navbar')

    @include('admin.widget.ajouter_sexe_candidat')
    @include('admin.widget.footer')


@endsection
