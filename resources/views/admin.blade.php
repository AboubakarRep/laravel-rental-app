@extends('app')
@if(Auth::check() && Auth::user()->email == 'amos12@gmail.com')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Panel Admin - Service de Covoiturage</h2>
            </div>
            <div class="pull-right" style="margin-bottom:10px;">
            <a class="btn btn-success" href="{{ url('create') }}"> Add New Car</a>
            </div>
            <div class="pull-right" style="margin-bottom:10px;">
                <a class="btn btn-success" href="{{route('ajouterCategorie')}}"> Voir categorie de vehicule</a>
                </div>
                    {{-- <div class="pull-right" style="margin-bottom:10px;">
                        <a class="btn btn-success" href="{{route('ajouterCategorie')}}"> Voir categorie de vehicule</a>
                        </div> --}}
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Image</th>
            <th>Marque</th>
            <th>Modèle</th>
            <th>Matricule du vehicule</th>
            <th>Status Assurance</th>
            <th>Date de Sortie</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($vehicules as $vehicule)
        <tr>
            <td>{{ ++$i }}</td>
            <td><img src="/images/{{ $vehicule->image }}" width="100px"></td>
            <td>{{ $vehicule->marque }}</td>
            <td>{{ $vehicule->model }}</td>
            <td>{{ $vehicule->matricule_vehicule }}</td>
            <td>{{ $vehicule->status_Assurance }}</td>
            <td>{{ $vehicule->date_De_Sortie }}</td>
            <td>{{ $vehicule->detail }}</td>
            <td>
                <form action="{{ route('destroy',$vehicule->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('show',$vehicule->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('edit',$vehicule->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $vehicules->links() !!}

@endsection
@endif

