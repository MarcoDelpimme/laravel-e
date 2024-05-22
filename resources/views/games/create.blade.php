@extends('templates.base')





@section('title', 'Crea Prodotto')
@section('content')
    <h1>ADD NEW GAME </h1>

    <form method="POST" action="{{ route('games.store') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">NAME</label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="name">
        </div>
        <div class="mb-3">
            <label for="genre" class="form-label">GENRE</label>
            <input type="text" class="form-control" id="genre" name="genre">
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">price</label>
            <input type="number" class="form-control" id="price" name="price">
        </div>
        <div class="mb-3">
            <label for="duration" class="form-label">duration</label>
            <input type="number" class="form-control" id="duration" name="duration">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
