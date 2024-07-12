@extends('base')

@if(Auth::check() && Auth::user()->email == 'amos12@gmail.com')

@section('title','listeReservation')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
     <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <style>
        a{
            text-decoration : none ;
            color:orange ;
        }
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
    }
    table {
      width: 90%;
      margin: 20px auto;
      border-collapse: collapse;
      border: 2px solid orangered;
    }
    th, td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: center;
    }
    th {
      background-color: orange;
      color: white;
    }
    tr:nth-child(even) {
      background-color: #f2f2f2;
    }
    a {
      text-decoration: none;
      color: #007bff;
    }
    a:hover {
      text-decoration: underline;
    }
    </style>
     </head>
     <body >

<table border="2">
  <tr>
    <th>Id</th>
    <th>Date début</th>
    <th>Date fin</th>
    <th>Statut</th>
    <th>Lieu de récupération</th>
    <th>Lieu de dépot</th>
    <th>Véhicule</th>
    <th>Chauffeur</th>
    <th>Contact client</th>
    <th>Coût</th>
    <th colspan="3">Action</th>
</tr>


@foreach ($reservations as $reservation) {
    <tr>
        <td>{{ ++$i }}</td>
            <td>{{ $reservation->date_debut }}</td>
            <td>{{ $reservation->date_fin }}</td>
            <td>{{ $reservation->statut }}</td>
            <td>{{ $reservation->lieu_recup }}</td>
            <td>{{ $reservation->lieu_depot }}</td>
            <td>{{ $reservation->vehicule_id }}</td>
            <td>{{ $reservation->chauffeur_id}}</td>
            <td>{{ $reservation->contactClient }}</td>
            <td>{{ $reservation->cout }}</td>

            <td>
              <form action="{{ route('modifierSatatutReservation', $reservation->id) }}" method="GET">
                  @csrf
                  <button type="submit" class="btn btn-danger">Changer statut Reservation</button>
              </form>
          </td>
          
    </tr>
}

 @endforeach
</table>


     </body>
</html>
@endsection
@endif
