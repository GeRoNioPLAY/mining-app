@extends('layouts.app')

@section('title', 'Редактировать запись')

@section('content')
    <h1>Редактировать запись</h1>

    <form action="{{ route('cryptocurrency_lists.update', $cryptocurrencyList->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="exchange_id" class="form-label">Биржа</label>
            <select name="exchange_id" id="exchange_id" class="form-control" required>
                <option value="">Выберите биржу</option>
                @foreach ($exchanges as $exchange)
                    <option value="{{ $exchange->id }}" {{ old('exchange_id', $cryptocurrencyList->exchange_id) == $exchange->id ? 'selected' : '' }}>{{ $exchange->name }}</option>
                @endforeach
            </select>
            @error('exchange_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="cryptocurrency_id" class="form-label">Криптовалюта</label>
            <select name="cryptocurrency_id" id="cryptocurrency_id" class="form-control" required>
                <option value="">Выберите криптовалюту</option>
                @foreach ($cryptocurrencies as $cryptocurrency)
                    < option value="{{ $cryptocurrency->id }}" {{ old('cryptocurrency_id', $cryptocurrencyList->cryptocurrency_id) == $cryptocurrency->id ? 'selected' : '' }}>{{ $cryptocurrency->name }}</option>
                @endforeach
            </select>
            @error('cryptocurrency_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Цена ($)</label>
            <input type="number" name="price" id="price" class="form-control" value="{{ old('price', $cryptocurrencyList->price) }}" step="0.01" min="0" required>
            @error('price')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Сохранить</button>
        <a href="{{ route('cryptocurrency_lists.index') }}" class="btn btn-secondary">Отмена</a>
    </form>
@endsection
