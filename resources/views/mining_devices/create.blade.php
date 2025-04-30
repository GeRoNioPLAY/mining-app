@extends('layouts.app')

@section('title', 'Добавить устройство')

@section('content')
    <h1>Добавить устройство</h1>

    <form action="{{ route('mining_devices.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="company" class="form-label">Компания</label>
            <input type="text" name="company" id="company" class="form-control" value="{{ old('company') }}" required>
            @error('company')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="device_name" class="form-label">Название устройства</label>
            <input type="text" name="device_name" id="device_name" class="form-control" value="{{ old('device_name') }}" required>
            @error('device_name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="cost" class="form-label">Стоимость ($)</label>
            <input type="number" name="cost" id="cost" class="form-control" value="{{ old('cost') }}" step="0.01" min="0" required>
            @error('cost')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="power_consumption" class="form-label">Потребление (Вт)</label>
            <input type="number" name="power_consumption" id="power_consumption" class="form-control" value="{{ old('power_consumption') }}" step="0.01" min="0" required>
            @error('power_consumption')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Сохранить</button>
        <a href="{{ route('mining_devices.index') }}" class="btn btn-secondary">Отмена</a>
    </form>
@endsection
