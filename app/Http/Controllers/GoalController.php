<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goal;
use App\Models\Player;
use App\Models\Game;

class GoalController extends Controller
{
    public function index()
    {
        $goals = Goal::with(['player', 'game'])->get();
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

        $goal = new Goal();
        $goal->name = $request->name;
        $goal->description = $request->description;
        $goal->player_id = $request->player_id;
        $goal->game_id = $request->game_id;
        $goal->save();

        return redirect()->route('goals.index')->with('success', 'Gol creado correctamente');
    }

    public function show(Goal $goal)
    {
        return view('goals.show', compact('goal'));
    }

    public function edit(Goal $goal)
    {
        $players = Player::all();
        $games = Game::all();
        return view('goals.edit', compact('goal', 'players', 'games'));
    }

    public function update(Request $request, Goal $goal)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'player_id' => 'required|exists:players,id',
            'game_id' => 'required|exists:games,id',
        ]);

        $goal->name = $request->name;
        $goal->description = $request->description;
        $goal->player_id = $request->player_id;
        $goal->game_id = $request->game_id;
        $goal->save();

        return redirect()->route('goals.index')->with('success', 'Gol actualizado correctamente');
    }

    public function destroy(Goal $goal)
    {
        $goal->delete();
        return redirect()->route('goals.index')->with('success', 'Gol eliminado correctamente');
    }
}
