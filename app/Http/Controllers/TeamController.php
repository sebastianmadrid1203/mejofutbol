<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\President;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    // Mostrar listado de equipos
    public function index()
    {
        $teams = Team::with('president')->get();
        return view('teams.index', compact('teams'));
    }

    // Mostrar formulario para crear nuevo equipo
    public function create()
    {
        $presidents = President::all();
        return view('teams.create', compact('presidents'));
    }

    // Guardar equipo en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'city' => 'required|string',
            'stadium' => 'required|string',
            'capacity' => 'required|integer|min:100',
            'year_of_foundation' => 'required|integer',
            'president_id' => 'required|exists:presidents,id|unique:teams,president_id',
        ]);

        Team::create($request->all());

        return redirect()->route('teams.index')->with('success', 'Equipo registrado correctamente.');
    }

    // Mostrar formulario para editar equipo existente
    public function edit($id)
    {
        $team = Team::findOrFail($id);
        $presidents = President::all();
        return view('teams.edit', compact('team', 'presidents'));
    }

    // Actualizar equipo en la base de datos
    public function update(Request $request, $id)
    {
        $team = Team::findOrFail($id);

        $request->validate([
            'name' => 'required|string',
            'city' => 'required|string',
            'stadium' => 'required|string',
            'capacity' => 'required|integer|min:100',
            'year_of_foundation' => 'required|integer',
            'president_id' => 'required|exists:presidents,id|unique:teams,president_id,' . $team->id,
        ]);

        $team->update($request->all());

        return redirect()->route('teams.index')->with('success', 'Equipo actualizado correctamente.');
    }

    // Eliminar equipo
    public function destroy($id)
    {
        $team = Team::findOrFail($id);
        $team->delete();

        return redirect()->route('teams.index')->with('success', 'Equipo eliminado correctamente.');
    }
}
