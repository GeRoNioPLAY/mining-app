<?php

namespace App\Http\Controllers;

use App\Models\Cryptocurrency;
use Illuminate\Http\Request;

class CryptocurrencyController extends Controller
{
    public function index()
    {
        $cryptocurrencies = Cryptocurrency::all();
        return view('cryptocurrencies.index', compact('cryptocurrencies'));
    }

    public function create()
    {
        return view('cryptocurrencies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'network_difficulty' => 'required|numeric|min:0|max:99999999.99',
            'block_reward' => 'required|numeric|min:0|max:99999999.99',
        ]);

        Cryptocurrency::create([
            'name' => $request->name,
            'network_difficulty' => $request->network_difficulty,
            'block_reward' => $request->block_reward,
        ]);

        return redirect()->route('cryptocurrencies.index')->with('success', 'Криптовалюта успешно добавлена');
    }

    public function show(string $id)
    {
    }

    public function edit(string $id)
    {
        $cryptocurrency = Cryptocurrency::findOrFail($id);
        return view('cryptocurrencies.edit', compact('cryptocurrency'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'network_difficulty' => 'required|numeric|min:0|max:99999999.99',
            'block_reward' => 'required|numeric|min:0|max:99999999.99',
        ]);

        $cryptocurrency = Cryptocurrency::findOrFail($id);
        $cryptocurrency->update([
            'name' => $request->name,
            'network_difficulty' => $request->network_difficulty,
            'block_reward' => $request->block_reward,
        ]);

        return redirect()->route('cryptocurrencies.index')->with('success', 'Криптовалюта успешно обновлена');
    }

    public function destroy(string $id)
    {
        $cryptocurrency = Cryptocurrency::findOrFail($id);
        $cryptocurrency->delete();

        return redirect()->route('cryptocurrencies.index')->with('success', 'Криптовалюта успешно удалена');
    }
}
