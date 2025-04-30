@extends('layouts.app')

@section('title', 'Редактировать алгоритм')

@section('content')
    <h1>Редактировать алгоритм</h1>

    <form action="{{ route('algorithms.update', $algorithm->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Название алгоритма</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $algorithm->name) }}" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Сохранить</button>
        <a href="{{ route('algorithms.index') }}" class="btn btn-secondary">Отмена</a>
    </form>
@endsection
