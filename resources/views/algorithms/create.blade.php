@extends('layouts.app')

@section('title', 'Добавить алгоритм')

@section('content')
    <h1>Добавить алгоритм</h1>

    <form action="{{ route('algorithms.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Название алгоритма</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Сохранить</button>
        <a href="{{ route('algorithms.index') }}" class="btn btn-secondary">Отмена</a>
    </form>
@endsection
