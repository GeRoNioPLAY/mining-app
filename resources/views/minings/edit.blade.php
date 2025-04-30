@extends('layouts.app')

@section('title', 'Редактировать запись о майнинге')

@section('content')
    <h1>Редактировать запись о майнинге</h1>

    <form action="{{ route('minings.update', $mining->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="mining_device_id" class="form-label">Устройство для майнинга</label>
            <select name="mining_device_id" id="mining_device_id" class="form-control" required>
                <option value="">Выберите устройство</option>
                @foreach ($miningDevices as $miningDevice)
                    <option value="{{ $miningDevice->id }}" {{ old('mining_device_id', $mining->mining_device_id) == $miningDevice->id ? 'selected' : '' }}>{{ $miningDevice->device_name }}</option>
                @endforeach
            </select>
            @error('mining_device_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="cryptocurrency_id" class="form-label">Криптовалюта</label>
            <select name="cryptocurrency_id" id="cryptocurrency_id" class="form-control" required>
                <option value="">Выберите криптовалюту</option>
                @foreach ($cryptocurrencies as $cryptocurrency)
                    <option value="{{ $cryptocurrency->id }}" {{ old('cryptocurrency_id', $mining->cryptocurrency_id) == $cryptocurrency->id ? 'selected' : '' }}>{{ $cryptocurrency->name }}</option>
                @endforeach
            </select>
            @error('cryptocurrency_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="algorithm_id" class="form-label">Алгоритм</label>
            <select name="algorithm_id" id="algorithm_id" class="form-control" required>
                <option value="">Выберите алгоритм</option>
                @foreach ($algorithms as $algorithm)
                    <option value="{{ $algorithm->id }}" {{ old('algorithm_id', $mining->algorithm_id) == $algorithm->id ? 'selected' : '' }}>{{ $algorithm->name }}</option>
                @endforeach
            </select>
            @error('algorithm_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="hashrate" class="form-label">Хэшрейт (TH/s)</label>
            <input type="number" name="hashrate" id="hashrate" class="form-control" value="{{ old('hashrate', $mining->hashrate) }}" step="0.01" min="0" required>
            @error('hashrate')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Сохранить</button>
        <a href="{{ route('minings.index') }}" class="btn btn-secondary">Отмена</a>
    </form>
@endsection
