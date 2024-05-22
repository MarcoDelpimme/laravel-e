@extends('templates.base')





@section('title', 'Crea Prodotto')
@section('content')

    <body>

        <div class="container">
            <h1>Crea Gioco</h1>
            <form method="POST" action="{{ route('games.update', $game) }}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">NAME</label>
                    <input type="text" class="form-control" id="name" name="name" aria-describedby="name"
                        value="{{ $game->name }}">
                </div>
                <div class="mb-3">
                    <label for="genre" class="form-label">GENRE</label>
                    <input type="text" class="form-control" id="genre" name="genre" value="{{ $game->genre }}">
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">PRICE</label>
                    <input type="number" class="form-control" id="price" name="price" value="{{ $game->price }}">
                </div>

                <div class="mb-3">
                    <label for="duration" class="form-label">DURATION</label>
                    <input type="number" class="form-control" id="duration" name="duration" value="{{ $game->duration }}">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>

    @endsection
