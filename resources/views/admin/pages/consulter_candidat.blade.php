@extends('admin.base_admin')


@section('content_admin')
    @include('admin.widget.header')

    @include('admin.widget.navbar')

    @include('admin.widget.table_candidat')
    @include('admin.widget.footer')


@endsection
