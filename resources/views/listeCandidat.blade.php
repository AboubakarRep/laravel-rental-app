@extends('base')

@if(Auth::check() && Auth::user()->email == 'amos12@gmail.com')

@section('title','listeCandidat')

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
        <th>Id</th><th>Nom</th><th>Prenoms</th><th>Genre</th><th>Email</th><th>Contact</th><th>Habitation</th><th>Experience(en année)</th></th><th colspan="3" >Action</th>
    </tr>

@foreach ($candidats as $candidat) {
    <tr>
        <td>{{ ++$i }}</td>
            <td>{{ $candidat->nom }}</td>
            <td>{{ $candidat->prenoms }}</td>
            <td>{{ $candidat->genre }}</td>
            <td>{{ $candidat->email }}</td>
            <td>{{ $candidat->telephone }}</td>
            <td>{{ $candidat->habitation }}</td>
            <td>{{ $candidat->experience }}</td>
            <td>
                <table>
                    <tr>
                           <td> <a class="btn btn-info" href="{{ route('voirInfo',$candidat->id) }}">info</a></td>

                            <td><a class="btn btn-primary" href="{{ route('modifier',$candidat->id) }}">etat</a></td>


                    </tr>
                </table></form>
            </td>
    </tr>
}

 @endforeach
</table>


     </body>
</html>
@endsection
@endif
