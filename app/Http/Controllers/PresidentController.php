<?php

namespace App\Http\Controllers;

use App\Models\President;
use Illuminate\Http\Request;

class PresidentController extends Controller
{
    public function index()
    {
        $presidents = President::all();
        return view('presidents.index', compact('presidents'));
    }

    public function create()
    {
        return view('presidents.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
        ]);

        President::create($request->all());

        return redirect()->route('presidents.index')->with('success', 'Presidente creado correctamente.');
    }

    public function show($id)
    {
        $president = President::findOrFail($id);
        return view('presidents.show', compact('president'));
    }

    public function edit($id)
    {
        $president = President::findOrFail($id);
        return view('presidents.edit', compact('president'));
    }

    public function update(Request $request, $id)
    {
        $president = President::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
        ]);

        $president->update($request->all());

        return redirect()->route('presidents.index')->with('success', 'Presidente actualizado correctamente.');
    }

    public function destroy($id)
    {
        $president = President::findOrFail($id);
        $president->delete();

        return redirect()->route('presidents.index')->with('success', 'Presidente eliminado correctamente.');
    }
}
