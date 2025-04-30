<?php

namespace App\Http\Controllers;

use App\Models\Exchange;
use Illuminate\Http\Request;

class ExchangeController extends Controller
{
    public function index()
    {
        $exchanges = Exchange::all();
        return view('exchanges.index', compact('exchanges'));
    }

    public function create()
    {
        return view('exchanges.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Exchange::create([
            'name' => $request->name,
        ]);

        return redirect()->route('exchanges.index')->with('success', 'Биржа успешно добавлена');
    }

    public function show(string $id)
    {
    }

    public function edit(string $id)
    {
        $exchange = Exchange::findOrFail($id);
        return view('exchanges.edit', compact('exchange'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $exchange = Exchange::findOrFail($id);
        $exchange->update([
            'name' => $request->name,
        ]);

        return redirect()->route('exchanges.index')->with('success', 'Биржа успешно обновлена');
    }

    public function destroy(string $id)
    {
        $exchange = Exchange::findOrFail($id);
        $exchange->delete();

        return redirect()->route('exchanges.index')->with('success', 'Биржа успешно удалена');
    }
}
