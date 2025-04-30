<?php

namespace App\Http\Controllers;

use App\Models\Algorithm;
use Illuminate\Http\Request;

class AlgorithmController extends Controller
{
    public function index()
    {
        $algorithms = Algorithm::all();
        return view('algorithms.index', compact('algorithms'));
    }

    public function create()
    {
        return view('algorithms.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Algorithm::create([
            'name' => $request->name,
        ]);

        return redirect()->route('algorithms.index')->with('success', 'Алгоритм успешно добавлен');
    }

    public function show(string $id)
    {
    }

    public function edit(string $id)
    {
        $algorithm = Algorithm::findOrFail($id);
        return view('algorithms.edit', compact('algorithm'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $algorithm = Algorithm::findOrFail($id);
        $algorithm->update([
            'name' => $request->name,
        ]);

        return redirect()->route('algorithms.index')->with('success', 'Алгоритм успешно обновлён');
    }

    public function destroy(string $id)
    {
        $algorithm = Algorithm::findOrFail($id);
        $algorithm->delete();

        return redirect()->route('algorithms.index')->with('success', 'Алгоритм успешно удалён');
    }
}
