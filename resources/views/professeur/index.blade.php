
@extends('layouts.app')

@section('content')

    <div class="row">

        <div class="col-lg-11">

            <h2>Gestion professeur</h2>

        </div>

        <div class="col-lg-1">
            <a class="btn btn-success" href="{{ url('professeur/create') }}">Ajouter</a>
        </div>

    </div>



    @if ($message = Session::get('success'))

        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>

    @endif



    <table class="table table-bordered">

        <tr>

            <th>No</th>
            <th>prenom</th>
            <th>nom</th>
            <th>email</th>
            <th>classe</th>
            <th>Actions</th>

        </tr>

        @foreach ($professeurs as $index => $professeur)

            <tr>
                <td>{{ $professeur->id }}</td>
                <td>{{ $professeur->prenom }}</td>
                <td>{{ $professeur->nom }}</td>
                <td>{{ $professeur->email }}</td>
                <td>{{ $professeur->classe }}</td>
                <td>

                    <form action="{{ url('professeur/'. $professeur->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <a class="btn btn-info" href="{{ url('professeur/'. $professeur>id) }}">Voir</a>
                        <a class="btn btn-primary" href="{{ url('professeur/'. $professeurt->id .'/edit') }}">Modifier</a>

                        <button type="submit" class="btn btn-danger">Supprimer</button>

                    </form>
                </td>

            </tr>

        @endforeach
    </table>

@endsection
