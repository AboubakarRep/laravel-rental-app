@extends('admin.base_admin')


@section('content_admin')
    @include('admin.widget.header')

    @include('admin.widget.navbar')

    @include('admin.widget.table_transaction')
    @include('admin.widget.footer')


@endsection
