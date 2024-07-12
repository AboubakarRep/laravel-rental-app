@extends('base')

@section('title','Reservation')

@section('content')
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
             @endif
  <div class="section properties">
    <div class="container">

      @foreach (\App\Models\Vehicule::all() as $vehicule)
      <div class="row properties-box">
        <div class="col-lg-4 col-md-6 align-self-center mb-30 properties-items col-md-6 adv">
            <div class="item">
              <a href="{{route('form_reservation',$vehicule->id)}}"><img src="/images/{{ $vehicule->image }} " style="width: 300PX" width="100px"></a>
              <span class="category">{{ $vehicule->categorie->name }}</span>

              <h4><a href="{{route('form_reservation',$vehicule->id)}}">{{ $vehicule->modele->nom }}</a></h4>
              <ul>
                <li>GPS: <span>{{ $vehicule->gps ? 'Oui' : 'Non' }}</span></li>
                <li>Climatisation: <span>{{ $vehicule->climatisation ? 'Oui' : 'Non' }}</span></li>
            </ul>

            <form action="{{ route('form_reservation',$vehicule->id) }}" method="POST">
                @csrf
                @method('PUT')
                <button type="submit" class="main-button">Reserver</button>
            </form>
            </div>
        </div>
        @endforeach
    </div>
  </div>



@endsection
