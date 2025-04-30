@extends('layouts.app')

@section('title', 'Редактировать криптовалюту')

@section('content')
    <h1>Редактировать криптовалюту</h1>

    <form action="{{ route('cryptocurrencies.update', $cryptocurrency->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Название криптовалюты</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $cryptocurrency->name) }}" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="network_difficulty" class="form-label">Сложность сети</label>
            <input type="number" name="network_difficulty" id="network_difficulty" class="form-control" value="{{ old('network_difficulty', $cryptocurrency->network_difficulty) }}" step="0.01" min="0" required>
            @error('network_difficulty')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="block_reward" class="form-label">Награда за блок</label>
            <input type="number" name="block_reward" id="block_reward" class="form-control" value="{{ old('block_reward', $cryptocurrency->block_reward) }}" step="0.01" min="0" required>
            @error('block_reward')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Сохранить</button>
        <a href="{{ route('cryptocurrencies.index') }}" class="btn btn-secondary">Отмена</a>
    </form>
@endsection
