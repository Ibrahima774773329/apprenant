
@extends('layouts.app')

@section('content')

    <div class="row">

        <div class="col-lg-11">

            <h2>Gestion apprenant</h2>

        </div>

        <div class="col-lg-1">
            <a class="btn btn-success" href="{{ url('cours/create') }}">Ajouter</a>
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
            <th>titre</th>
            <th>contenu</th>
            <th>image</th>
            <th>duree</th>
            <th>Actions</th>

        </tr>

        @foreach ($cours as $index => $cours)

            <tr>
                <td>{{ $index }}</td>
                <td>{{ $cours->titre }}</td>
                <td>{{ $cours->contenu }}</td>
                <td>{{ $cours->image }}</td>
                <td>{{ $cours->duree }}</td>
                <td>

                    <form action="{{ url('cours/'. $cours->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <a class="btn btn-info" href="{{ url('cours/'. $cours->id) }}">Voir</a>
                        <a class="btn btn-primary" href="{{ url('cours/'. $cours->id .'/edit') }}">Modifier</a>

                        <button type="submit" class="btn btn-danger">Supprimer</button>

                    </form>
                </td>

            </tr>

        @endforeach
    </table>

@endsection
