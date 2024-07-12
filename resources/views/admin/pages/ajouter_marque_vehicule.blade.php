@extends('admin.base_admin')
@section('page','Caisse')

@section('content_admin')
    @include('admin.widget.header')

    @include('admin.widget.navbar')

    @include('admin.widget.formAjout_marque')
    @include('admin.widget.footer')


@endsection
