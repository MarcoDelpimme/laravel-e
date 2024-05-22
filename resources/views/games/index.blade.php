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

    <table class="table">
        <thead class="text-center">
            <tr>
                <th scope="col">#</th>
                <th scope="col">GAME</th>
                <th scope="col">GENRE</th>
                <th scope="col">PRICE</th>
                <th scope="col">DURATION</th>
                @auth
                    <th scope="col">ACTIONS</th>
                @endauth

            </tr>
        </thead>
        <tbody>
            @foreach ($games as $game)
                <tr class="text-center">
                    <th scope="row">{{ $game->id }}</th>
                    <td> <a href="{{ route('games.show', $game->id) }}">{{ $game->name }}</a></td>
                    <td>{{ $game->genre }}</td>
                    <td>{{ $game->price }} $</td>
                    <td>{{ $game->duration }} h</td>
                    @auth
                        @if (Auth::user()->id == $game->user_id)
                            <td class="row justify-content-center">
                                <div class="col-auto"> <a href="{{ route('games.edit', $game->id) }}"><button
                                            class="btn btn-warning">Edit</button></a></div>
                        @endif
                    @endauth
                    @auth
                        @if (Auth::user()->id == $game->user_id)
                            <div class="col-auto">
                                <form action="{{ route('games.destroy', $game->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')<button type="submit" class="btn btn-danger">Delete</button></form>
                            </div>
                            </td>
                        @endif

                    @endauth
                </tr>
            @endforeach
        </tbody>
    </table>



    {{ $games->links() }}
@endsection
