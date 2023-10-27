
@extends('layouts.app')


@section('content')


    <h1>Modifier etudiant</h1>


    @if ($errors->any())

        <div class="alert alert-danger">

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>

    @endif

    <form method="post" action="{{ url('etudiant/'. $etudiant->id) }}" >
        @method('PATCH')
        @csrf


        <div class="form-group mb-3">

            <label for="prenom">prenom:</label>
            <input type="text" class="form-control" id="prenom" placeholder="prenom" name="prenom" value="{{ $etudiant->prenom }}">

        </div>

        <div class="form-group mb-3">

            <label for="nom">nom:</label>
            <input type="text" class="form-control" id="nom" placeholder="nom" name="nom" value="{{ $etudiant->nom }}">

        </div>

        <div class="form-group mb-3">

            <label for="email">email:</label>
            <input type="text" class="form-control" id="email" placeholder="email" name="email" value="{{ $etudiant->email }}">

        </div>

        <div class="form-group mb-3">

            <label for="classe">classe ($):</label>
            <input type="texte" class="form-control" id="duree" placeholder="classe" name="classe" value="{{ $etudiant->etudiant }}">

        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>

    </form>

@endsection
