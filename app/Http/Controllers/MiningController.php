<?php

namespace App\Http\Controllers;

use App\Models\Mining;
use App\Models\MiningDevice;
use App\Models\Cryptocurrency;
use App\Models\Algorithm;
use Illuminate\Http\Request;

class MiningController extends Controller
{
    public function index()
    {
        $minings = Mining::with('miningDevice', 'cryptocurrency', 'algorithm')->get();
        return view('minings.index', compact('minings'));
    }

    public function create()
    {
        $miningDevices = MiningDevice::all();
        $cryptocurrencies = Cryptocurrency::all();
        $algorithms = Algorithm::all();
        return view('minings.create', compact('miningDevices', 'cryptocurrencies', 'algorithms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mining_device_id' => 'required|exists:mining_devices,id',
            'cryptocurrency_id' => 'required|exists:cryptocurrencies,id',
            'algorithm_id' => 'required|exists:algorithms,id',
            'hashrate' => 'required|numeric|min:0|max:99999999.99',
        ]);

        Mining::create([
            'user_id' => null,
            'mining_device_id' => $request->mining_device_id,
            'cryptocurrency_id' => $request->cryptocurrency_id,
            'algorithm_id' => $request->algorithm_id,
            'hashrate' => $request->hashrate,
        ]);

        return redirect()->route('minings.index')->with('success', 'Запись о майнинге успешно добавлена');
    }

    public function show(string $id)
    {
    }

    public function edit(string $id)
    {
        $mining = Mining::findOrFail($id);
        $miningDevices = MiningDevice::all();
        $cryptocurrencies = Cryptocurrency::all();
        $algorithms = Algorithm::all();
        return view('minings.edit', compact('mining', 'miningDevices', 'cryptocurrencies', 'algorithms'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'mining_device_id' => 'required|exists:mining_devices,id',
            'cryptocurrency_id' => 'required|exists:cryptocurrencies,id',
            'algorithm_id' => 'required|exists:algorithms,id',
            'hashrate' => 'required|numeric|min:0|max:99999999.99',
        ]);

        $mining = Mining::findOrFail($id);
        $mining->update([
            'user_id' => null,
            'mining_device_id' => $request->mining_device_id,
            'cryptocurrency_id' => $request->cryptocurrency_id,
            'algorithm_id' => $request->algorithm_id,
            'hashrate' => $request->hashrate,
        ]);

        return redirect()->route('minings.index')->with('success', 'Запись о майнинге успешно обновлена');
    }

    public function destroy(string $id)
    {
        $mining = Mining::findOrFail($id);
        $mining->delete();

        return redirect()->route('minings.index')->with('success', 'Запись о майнинге успешно удалена');
    }
}
