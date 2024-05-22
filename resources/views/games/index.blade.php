@extends('templates.base')





@section('title', 'Crea Prodotto')
@section('content')


    @session('success_create')
        <div class="alert alert-success">

            Il gioco "{{ session('success_create')->name }}" è stato creato con successo

        </div>
    @endsession
    @session('success_update')
        <div class="alert alert-warning">

            Il gioco "{{ session('success_update')->name }}" è stato aggiornato con successo

        </div>
    @endsession
    @session('success_deleted')
        <div class="alert alert-danger">

            Il gioco "{{ session('success_deleted')->name }}" è stato eliminato con successo

        </div>
    @endsession
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
                @auth
                    @if (Auth::user()->id == $game->user_id)
                        <td>
                            <a href="{{ route('games.edit', $game->id) }}"><button class="btn btn-warning">Edit</button></a>
                        </td>
                    @endif

                @endauth

                @auth
                    @if (Auth::user()->id == $game->user_id)
                        <td>
                            <form action="{{ route('games.destroy', $game->id) }}" method="POST">
                                @csrf
                                @method('DELETE')<button type="submit" class="btn btn-danger">Delete</button></form>
                        </td>
                    @endif
                @endauth

            </tr>
        @endforeach
    </table>
    {{ $games->links() }}
@endsection
