
@extends('layouts.app')


@section('content')

    <h1>Ajouter un etudiant</h1>


    @if ($errors->any())

        <div class="alert alert-danger">

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

        </div>

    @endif

    <form action="{{ url('etudiant') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label for="prenom">prenom:</label>
            <input type="text" class="form-control" id="prenom" placeholder="prenom" name="prenom">
        </div>

        <div class="form-group mb-3">

            <label for="nom">nom:</label>
            <input type="text" class="form-control" id="nom" placeholder="nom" name="nom">

        </div>


        <div class="form-group mb-3">
            <label for="email">email:</label>
            <input type="text" class="form-control" id="email" placeholder="email" name="email">
        </div>

        <div class="form-group mb-3">
            <label for="classe">classe ($):</label>
            <input type="text" class="form-control" id="classe" placeholder="classe" name="classe">
        </div>


        <button type="submit" class="btn btn-primary">Enregister</button>

    </form>

@endsection
