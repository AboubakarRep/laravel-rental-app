@extends('base')

@section('content')
    <h1>Liste des Réservations</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('caisse.create') }}" class="btn btn-primary">Ajouter une Réservation</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom de la Réservation</th>
                <th>Montant Débité</th>
                <th>Montant Crédité</th>
                <th>Date de Création</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservations as $reservation)
                <tr>
                    <td>{{ $reservation->id }}</td>
                    <td>{{ $reservation->reservation_name }}</td>
                    <td>{{ $reservation->debit_montant }}</td>
                    <td>{{ $reservation->credit_montant }}</td>
                    <td>{{ $reservation->created_at->format('dd/m/YY H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection