@extends('admin.base_admin')


@section('content_admin')
    @include('admin.widget.header')

    @include('admin.widget.navbar')

    @include('admin.widget.info_vehicule')
    @include('admin.widget.footer')


@endsection
