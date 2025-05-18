<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Team;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::with('teams')->get();
        return view('games.index', compact('games'));
    }

    public function create()
    {
        $teams = Team::all();
        return view('games.create', compact('teams'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'local_goals' => 'required|integer|min:0',
            'away_goals' => 'required|integer|min:0',
            'teams' => 'required|array|min:2', // mínimo 2 equipos por juego
            'teams.*' => 'exists:teams,id',
        ]);

        $game = Game::create($request->only(['date', 'local_goals', 'away_goals']));
        $game->teams()->attach($request->teams);

        return redirect()->route('games.index')->with('success', 'Juego creado correctamente.');
    }

    public function show($id)
    {
        $game = Game::with('teams', 'goals')->findOrFail($id);
        return view('games.show', compact('game'));
    }

    public function edit($id)
    {
        $game = Game::with('teams')->findOrFail($id);
        $teams = Team::all();
        return view('games.edit', compact('game', 'teams'));
    }

    public function update(Request $request, $id)
    {
        $game = Game::findOrFail($id);

        $request->validate([
            'date' => 'required|date',
            'local_goals' => 'required|integer|min:0',
            'away_goals' => 'required|integer|min:0',
            'teams' => 'required|array|min:2',
            'teams.*' => 'exists:teams,id',
        ]);

        $game->update($request->only(['date', 'local_goals', 'away_goals']));
        $game->teams()->sync($request->teams);

        return redirect()->route('games.index')->with('success', 'Juego actualizado correctamente.');
    }

    public function destroy($id)
    {
        $game = Game::findOrFail($id);
        $game->teams()->detach();
        $game->delete();

        return redirect()->route('games.index')->with('success', 'Juego eliminado correctamente.');
    }
}


