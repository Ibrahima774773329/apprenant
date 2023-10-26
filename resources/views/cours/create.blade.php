
@extends('layouts.app')


@section('content')

    <h1>Ajouter un cours</h1>


    @if ($errors->any())

        <div class="alert alert-danger">

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

        </div>

    @endif

    <form action="{{ url('cours') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label for="titre">titre:</label>
            <input type="text" class="form-control" id="titre" placeholder="titre" name="titre">
        </div>

        <div class="form-group mb-3">

            <label for="contenu">contenu:</label>
            <input type="text" class="form-control" id="contenu" placeholder="contenu" name="contenu">

        </div>


        <div class="form-group mb-3">
            <label for="image">image:</label>
            <input type="file" class="form-control" id="image" placeholder="image" name="image">
        </div>

        <div class="form-group mb-3">
            <label for="duree">duree ($):</label>
            <input type="number" class="form-control" id="duree" placeholder="duree" name="duree">
        </div>


        <button type="submit" class="btn btn-primary">Enregister</button>

    </form>

@endsection
