

@extends('admin.base_admin')


@section('content_admin')
    @include('admin.widget.header')

    @include('admin.widget.navbar')

    @include('admin.widget.modifier_res_user')
    @include('admin.widget.footer')


@endsection