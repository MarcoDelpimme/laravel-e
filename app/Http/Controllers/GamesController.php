<?php

namespace App\Http\Controllers;


use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $games = Game::all();
        $games = Game::paginate(5);
        return view('games.index', ['games' => $games]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('games.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $newGame = new Game();
        $newGame->name = $data["name"];
        $newGame->genre = $data["genre"];
        $newGame->duration = $data["duration"];
        $newGame->price = $data["price"];
        $newGame->user_id = Auth::user()->id;
        $newGame->save();
        return redirect()->route('games.index')->with('success_create', $newGame);
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game)
    {

        return view('games.show', ['game' => $game]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game, Request $request)
    {
        if (auth()->user()->id !== $game->user_id) {
            abort(403, 'Unauthorized action.');
        }
        return view('games.edit', ['game' => $game]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Game $game)
    {

        if (auth()->user()->id !== $game->user_id) {
            abort(403, 'Unauthorized action.');
        }
        $data = $request->all();
        $game->name = $data["name"];
        $game->genre = $data["genre"];
        $game->duration = $data["duration"];
        $game->price = $data["price"];
        $game->user_id = Auth::user()->id;
        $game->save();
        return redirect()->route('games.index')->with('success_update', $game);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game, Request $request)
    {
        if (auth()->user()->id != $game->user_id) {
            abort(403, 'Unauthorized action.');
        }
        $game->delete();
        return redirect()->route('games.index')->with('success_deleted', $game);
    }
}
