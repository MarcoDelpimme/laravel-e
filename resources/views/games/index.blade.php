@extends('templates.base')





@section('title', 'Crea Prodotto')
@section('content')
    <table>
        <thead>
            <th>GAME</th>
            <th>GENRE</th>
            <th>PRICE</th>
            <th>DURATION</th>
        </thead>
        @foreach ($games as $game)
            <tr>

                <td> <a href="{{ route('games.show', $game->id) }}">{{ $game->name }}</a></td>

                <td>{{ $game->genre }}</td>
                <td>{{ $game->price }} $</td>
                <td>{{ $game->duration }} h</td>
                <td><a href="{{ route('games.edit', $game->id) }}"><button class="btn btn-warning">Edit</button></a></td>
                <td>
                    <form action="{{ route('games.destroy', $game->id) }}" method="POST">
                        @csrf
                        @method('DELETE')<button type="submit" class="btn btn-danger">Delete</button></form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
