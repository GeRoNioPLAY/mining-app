<?php

namespace App\Http\Controllers;

use App\Models\CryptocurrencyList;
use App\Models\Exchange;
use App\Models\Cryptocurrency;
use Illuminate\Http\Request;

class CryptocurrencyListController extends Controller
{
    public function index()
    {
        $cryptocurrencyLists = CryptocurrencyList::with('exchange', 'cryptocurrency')->get();
        return view('cryptocurrency_lists.index', compact('cryptocurrencyLists'));
    }

    public function create()
    {
        $exchanges = Exchange::all();
        $cryptocurrencies = Cryptocurrency::all();
        return view('cryptocurrency_lists.create', compact('exchanges', 'cryptocurrencies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'exchange_id' => 'required|exists:exchanges,id',
            'cryptocurrency_id' => 'required|exists:cryptocurrencies,id',
            'price' => 'required|numeric|min:0|max:1000000',
        ]);

        CryptocurrencyList::create([
            'exchange_id' => $request->exchange_id,
            'cryptocurrency_id' => $request->cryptocurrency_id,
            'price' => $request->price,
        ]);

        return redirect()->route('cryptocurrency_lists.index')->with('success', 'Запись успешно добавлена');
    }

    public function show(string $id)
    {
    }

    public function edit(string $id)
    {
        $cryptocurrencyList = CryptocurrencyList::findOrFail($id);
        $exchanges = Exchange::all();
        $cryptocurrencies = Cryptocurrency::all();
        return view('cryptocurrency_lists.edit', compact('cryptocurrencyList', 'exchanges', 'cryptocurrencies'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'exchange_id' => 'required|exists:exchanges,id',
            'cryptocurrency_id' => 'required|exists:cryptocurrencies,id',
            'price' => 'required|numeric|min:0|max:1000000',
        ]);

        $cryptocurrencyList = CryptocurrencyList::findOrFail($id);
        $cryptocurrencyList->update([
            'exchange_id' => $request->exchange_id,
            'cryptocurrency_id' => $request->cryptocurrency_id,
            'price' => $request->price,
        ]);

        return redirect()->route('cryptocurrency_lists.index')->with('success', 'Запись успешно обновлена');
    }

    public function destroy(string $id)
    {
        $cryptocurrencyList = CryptocurrencyList::findOrFail($id);
        $cryptocurrencyList->delete();

        return redirect()->route('cryptocurrency_lists.index')->with('success', 'Запись успешно удалена');
    }
}
