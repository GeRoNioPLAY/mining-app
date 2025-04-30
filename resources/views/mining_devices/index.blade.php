@extends('layouts.app')

@section('title', 'Устройства для майнинга')

@section('content')
    <h1>Устройства для майнинга</h1>

    <a href="{{ route('mining_devices.create') }}" class="btn btn-primary mb-3">Добавить устройство</a>

    @if ($miningDevices->isEmpty())
        <p>Устройства отсутствуют.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Компания</th>
                    <th>Название устройства</th>
                    <th>Стоимость ($)</th>
                    <th>Потребление (Вт)</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($miningDevices as $miningDevice)
                    <tr>
                        <td>{{ $miningDevice->id }}</td>
                        <td>{{ $miningDevice->company }}</td>
                        <td>{{ $miningDevice->device_name }}</td>
                        <td>{{ $miningDevice->cost }}</td>
                        <td>{{ $miningDevice->power_consumption }}</td>
                        <td>
                            <a href="{{ route('mining_devices.edit', $miningDevice->id) }}" class="btn btn-warning btn-sm">Редактировать</a>
                            <form action="{{ route('mining_devices.destroy', $miningDevice->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Вы уверены?')">Удалить</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
