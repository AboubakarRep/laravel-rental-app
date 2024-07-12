@extends('layouts.app') <!-- Si vous utilisez un layout -->

@section('content')
    <h1>Liste des messages</h1>

    @if ($messages->isEmpty())
    <p>Aucun message trouvé.</p>
@else
    <ul>
        @foreach ($messages as $message)
            <li>
                <strong>{{ $message->subject }}</strong>
                <p>{{ $message->message }}</p>
                <small>Envoyé par {{ $message->name }} ({{ $message->email }})</small>
            </li>
        @endforeach
    </ul>
@endif
@endsection