
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
            <input type="text" class="form-control" id="titre" placeholder="titre" name="titre" value="{{ $cours->titre }}">

        </div>

        <div class="form-group mb-3">

            <label for="contenu">contenu:</label>
            <input type="text" class="form-control" id="contenu" placeholder="contenu" name="contenu" value="{{ $cours->contenu }}">

        </div>

        <div class="form-group mb-3">

            <label for="image">image:</label>
            <input type="file" class="form-control" id="image" placeholder="image" name="email" value="{{ $cours->image }}">

        </div>

        <div class="form-group mb-3">

            <label for="salaire">duree ($):</label>
            <input type="number" class="form-control" id="duree" placeholder="duree" name="duree" value="{{ $cours->duree }}">

        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>

    </form>

@endsection
