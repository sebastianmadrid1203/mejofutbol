<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use App\Models\Player;
use App\Models\Game;
use Illuminate\Http\Request;

class GoalController extends Controller
{
    public function index()
    {
        $goals = Goal::with('player', 'game')->get();
        return view('goals.index', compact('goals'));
    }

    public function create()
    {
        $players = Player::all();
        $games = Game::all();
        return view('goals.create', compact('players', 'games'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'player_id' => 'required|exists:players,id',
            'game_id' => 'required|exists:games,id',
        ]);

        Goal::create($request->all());

        return redirect()->route('goals.index')->with('success', 'Gol creado correctamente.');
    }

    public function show($id)
    {
        $goal = Goal::with('player', 'game')->findOrFail($id);
        return view('goals.show', compact('goal'));
    }

    public function edit($id)
    {
        $goal = Goal::findOrFail($id);
        $players = Player::all();
        $games = Game::all();
        return view('goals.edit', compact('goal', 'players', 'games'));
    }

    public function update(Request $request, $id)
    {
        $goal = Goal::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'player_id' => 'required|exists:players,id',
            'game_id' => 'required|exists:games,id',
        ]);

        $goal->update($request->all());

        return redirect()->route('goals.index')->with('success', 'Gol actualizado correctamente.');
    }

    public function destroy($id)
    {
        $goal = Goal::findOrFail($id);
        $goal->delete();

        return redirect()->route('goals.index')->with('success', 'Gol eliminado correctamente.');
    }
}
