@extends('base')

@section('title','about')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
     <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">

     </head>
     <body >
        <h1>About</h1>
        {{--supprimez le h1 et saisissez votre code ici--}}
     </body>
</html>
@endsection
