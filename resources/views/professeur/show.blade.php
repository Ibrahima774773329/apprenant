
@extends('layouts.app')


@section('content')

<h1>Gestion Professeur</h1>


    <table class="table table-bordered">

        <tr>
            <th>prenom:</th>
            <td>{{ $professeur->prenom }}</td>
        </tr>

        <tr>

            <th>nom:</th>
            <td>{{ $professeur->nom }}</td>

        </tr>

        <tr>

            <th>email:</th>
            <td>{{ $professeur->email}}</td>

        </tr>

        <tr>

            <th>classe:</th>
            <td>$ {{ $professeur->classe }}</td>

        </tr>

    </table>

@endsection

contact/edit.blade.php

@extends('layouts.app')


@section('content')


    <h1>Modifier professeur</h1>


    @if ($errors->any())

        <div class="alert alert-danger">

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>

        @endif

<form method="post" action="{{ url('professeur/'. $professeur->id) }}" >
    @method('PATCH')
    @csrf


        <div class="form-group mb-3">

            <label for="prenom">prenom:</label>
            <input type="text" class="form-control" id="prenom" placeholder="prenom" name="prenom" value="{{ $professeur->prenom }}">

        </div>

        <div class="form-group mb-3">

            <label for="nom">nom:</label>
            <input type="text" class="form-control" id="nom" placeholder="nom" name="nom" value="{{ $professeurt->nom }}">

        </div>

        <div class="form-group mb-3">

            <label for="email">email:</label>
            <input type="text" class="form-control" id="email" placeholder="email" name="email" value="{{ $professeur->email}}">

        </div>

        <div class="form-group mb-3">

            <label for="classe">classe ($):</label>
            <input type="integer" class="form-control" id="classe" placeholder="classee" name="classe" value="{{ $professeur->classe }}">

        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>

    </form>

@endsection
