@extends('layouts.app')

@section('title', 'Редактировать биржу')

@section('content')
    <h1>Редактировать биржу</h1>

    <form action="{{ route('exchanges.update', $exchange->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Название биржи</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $exchange->name) }}" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Сохранить</button>
        <a href="{{ route('exchanges.index') }}" class="btn btn-secondary">Отмена</a>
    </form>
@endsection
