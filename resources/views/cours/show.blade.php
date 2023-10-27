
@extends('layouts.app')


@section('content')

<h1>Gestion COURS</h1>


    <table class="table table-bordered">

        <tr>
            <th>titre:</th>
            <td>{{ $cours->titre }}</td>
        </tr>

        <tr>

            <th>contenu:</th>
            <td>{{ $cours->contenu }}</td>

        </tr>

        <tr>

            <th>image:</th>
            <td>{{ $cours->image }}</td>

        </tr>

        <tr>

            <th>duree:</th>
            <td>$ {{ $cours->duree }}</td>

        </tr>

    </table>

@endsection

contact/edit.blade.php

@extends('layouts.app')


@section('content')


    <h1>Modifier cours</h1>


    @if ($errors->any())

        <div class="alert alert-danger">

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>

    @endif

    <form method="post" action="{{ url('cours/'. $cours->id) }}" >
        @method('PATCH')
        @csrf


        <div class="form-group mb-3">

            <label for="titre">titre:</label>
            <input type="text" class="form-control" id="titre" placeholder="Entrer titre" name="titre" value="{{ $cours->titre }}">

        </div>

        <div class="form-group mb-3">

            <label for="telephone">contenu:</label>
            <input type="text" class="form-control" id="contenu" placeholder="Entrer contenu" name="contenu" value="{{ $cours->contenu }}">

        </div>

        <div class="form-group mb-3">

            <label for="image">image:</label>
            <input type="file" class="form-control" id="image" placeholder="Entrer image" name="image" value="{{ $cours->image }}">

        </div>

        <div class="form-group mb-3">

            <label for="duree">duree ($):</label>
            <input type="number" class="form-control" id="duree" placeholder="duree" name="duree" value="{{ $cours->duree }}">

        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>

    </form>

@endsection
