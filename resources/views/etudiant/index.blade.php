
@extends('layouts.app')

@section('content')

    <div class="row">

        <div class="col-lg-11">

            <h2>Gestion ETUDIANT</h2>

        </div>

        <div class="col-lg-1">
            <a class="btn btn-success" href="{{ url('etudiant/create') }}">Ajouter</a>
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

        @foreach ($etudiants as $index => $etudiant)

            <tr>
                <td>{{ $etudiant->id }}</td>
                <td>{{ $etudiant->prenom }}</td>
                <td>{{ $etudiant->nom }}</td>
                <td>{{ $etudiant->email }}</td>
                <td>{{ $etudiant->classe }}</td>
                <td>

                    <form action="{{ url('etudiant/'. $etudiant->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <a class="btn btn-info" href="{{ url('etudiant/'. $etudiant->id) }}">Voir</a>
                        <a class="btn btn-primary" href="{{ url('etudiant/'. $etudiant->id .'/edit') }}">Modifier</a>

                        <button type="submit" class="btn btn-danger">Supprimer</button>

                    </form>
                </td>

            </tr>

        @endforeach
    </table>

@endsection
