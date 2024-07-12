@extends('base')

@section('content')
    <div class="container">
        <h2>Nouvelle Réservation</h2>

        <form action="{{ route('caisse.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="reservation_name">Nom de la Réservation</label>
                <input type="text" class="form-control" id="reservation_name" name="reservation_name" required>
            </div>

            <div class="form-group">
                <label for="debit_montant">Montant Débité</label>
                <input type="number" class="form-control" id="debit_montant" name="debit_montant" required>
            </div>

            <div class="form-group">
                <label for="credit_montant">Montant Crédité</label>
                <input type="number" class="form-control" id="credit_montant" name="credit_montant" required>
            </div>

            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
@endsection