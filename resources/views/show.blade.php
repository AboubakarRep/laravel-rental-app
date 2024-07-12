@extends('app')
@if(Auth::check() && Auth::user()->email == 'amos12@gmail.com')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Car</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ url('/admin') }}"> Back</a>
            </div>
        </div>
    </div>
      
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Marque:</strong>
                {{ $vehicule->marque }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Modèle:</strong>
                {{ $vehicule->model }}
            </div>
            <div class="form-group">
                <strong>Matricule du vehicule:</strong>
                {{ $vehicule->matricule_vehicule }}
            </div>
            <div class="form-group">
                <strong>Status Assurance:</strong>
                {{ $vehicule->status_Assurance }}
            </div>
            <div class="form-group">
                <strong>Date de Sortie:</strong>
                {{ $vehicule->date_De_Sortie }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Details:</strong>
                {{ $vehicule->detail }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Image:</strong>
                <img src="/images/{{ $vehicule->image }}" width="500px">
            </div>
        </div>
    </div>
@endsection
@endif