@extends('layouts.app')

@section('title', 'Добавить биржу')

@section('content')
    <h1>Добавить биржу</h1>

    <form action="{{ route('exchanges.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Название биржи</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Сохранить</button>
        <a href="{{ route('exchanges.index') }}" class="btn btn-secondary">Отмена</a>
    </form>
@endsection
