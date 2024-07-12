
@extends('base')
@if(Auth::check() && Auth::user()->email == 'amos12@gmail.com')

@section('title','infoCandidat')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
     <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <style>
        body {
          font-family: Arial, sans-serif;
          margin: 0;
          padding: 20px;
          background-color: #f4f4f4;
        }
        h1 {
          text-align: center;
          color: #007bff;
          margin-bottom: 20px;
        }
        table {
          width: 80%;
          margin: 20px auto;
          border-collapse: collapse;
          border: 2px solid #007bff;
        }
        th, td {
          border: 1px solid #ddd;
          padding: 8px;
          text-align: center;
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
        input[type="file"] {
          margin-bottom: 10px;
        }
        input[type="submit"] {
          background-color: #007bff;
          color: #fff;
          border: none;
          padding: 10px 20px;
          border-radius: 4px;
          cursor: pointer;
          font-size: 16px;
          transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
          background-color: #0056b3;
        }
      </style>
     </head>
    <body >
        <table border="2">

            <tr>
                    <td><img src="/images/{{ $candidat->profil }}" ></td>
                    <td>

                    </td>
            </tr>
                    <tr>
                    <td>NOM</td><td>{{ $candidat->nom }}</td>
                    </tr>
                    <tr>
                    <td>PRENOMS</td><td>{{ $candidat->prenoms }}</td>
                    </tr>
                    <tr>
                    <td>GENRE</td><td>{{ $candidat->genre }}</td>
                    </tr>
                    <tr>
                    <td>EMAIL</td><td>{{ $candidat->email }}</td>
                    </tr>
                    <tr>
                    <td>CONTACT</td><td>{{ $candidat->telephone }}</td>
                    </tr>
                    <tr>
                    <td>HABITATION</td><td>{{ $candidat->habitation }}</td>
                    </tr>
                    <tr>
                    <td>EXPERIENCE</td><td>{{ $candidat->experience }}</td>
                    </tr>
                    <tr>
                        <td>MOTIVATION</td>
                        <td>{{ $candidat->motivation }}</td>
                    </tr>
                    <tr>
                        <td>PERMIS DE CONDUIRE</td>
                        <td><img src="/images/{{ $candidat->permis }}" ></td>
                    </tr>

            </table>
     </body>
</html>
@endsection
@endif