@extends('base')

@section('content')
    <h1>Categories</h1>

    <a href="{{ route('newCategorie') }}" class="btn btn-primary">Create Category</a>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Tarif par jour</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->tarif_par_jour }}</td>
                    <td>
                        <!--<a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary">Edit</a>
                         Add delete functionality here -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
