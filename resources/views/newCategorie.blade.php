@extends('base')

@section('content')


    <form action="{{ route('storeCategorie') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="tarif_par_jour">Tarif par jour</label>
            <input type="number" name="tarif_par_jour" id="tarif_par_jour" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
@endsection
