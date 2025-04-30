<?php

namespace App\Http\Controllers;

use App\Models\MiningDevice;
use Illuminate\Http\Request;

class MiningDeviceController extends Controller
{
    public function index()
    {
        $miningDevices = MiningDevice::all();
        return view('mining_devices.index', compact('miningDevices'));
    }

    public function create()
    {
        return view('mining_devices.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'company' => 'required|string|max:255',
            'device_name' => 'required|string|max:255',
            'cost' => 'required|numeric|min:0',
            'power_consumption' => 'required|numeric|min:0',
        ]);

        MiningDevice::create([
            'company' => $request->company,
            'device_name' => $request->device_name,
            'cost' => $request->cost,
            'power_consumption' => $request->power_consumption,
        ]);

        return redirect()->route('mining_devices.index')->with('success', 'Устройство успешно добавлено');
    }

    public function show(string $id)
    {
    }

    public function edit(string $id)
    {
        $miningDevice = MiningDevice::findOrFail($id);
        return view('mining_devices.edit', compact('miningDevice'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'company' => 'required|string|max:255',
            'device_name' => 'required|string|max:255',
            'cost' => 'required|numeric|min:0',
            'power_consumption' => 'required|numeric|min:0',
        ]);

        $miningDevice = MiningDevice::findOrFail($id);
        $miningDevice->update([
            'company' => $request->company,
            'device_name' => $request->device_name,
            'cost' => $request->cost,
            'power_consumption' => $request->power_consumption,
        ]);

        return redirect()->route('mining_devices.index')->with('success', 'Устройство успешно обновлено');
    }

    public function destroy(string $id)
    {
        $miningDevice = MiningDevice::findOrFail($id);
        $miningDevice->delete();

        return redirect()->route('mining_devices.index')->with('success', 'Устройство успешно удалено');
    }
}
