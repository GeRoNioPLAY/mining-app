@extends('layouts.app')

@section('title', 'Алгоритмы майнинга')

@section('content')
    <h1>Алгоритмы майнинга</h1>

    <a href="{{ route('algorithms.create') }}" class="btn btn-primary mb-3">Добавить алгоритм</a>

    @if ($algorithms->isEmpty())
        <p>Алгоритмы отсутствуют.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Название</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($algorithms as $algorithm)
                    <tr>
                        <td>{{ $algorithm->id }}</td>
                        <td>{{ $algorithm->name }}</td>
                        <td>
                            <a href="{{ route('algorithms.edit', $algorithm->id) }}" class="btn btn-warning btn-sm">Редактировать</a>
                            <form action="{{ route('algorithms.destroy', $algorithm->id) }}" method="POST" style="display:inline;">
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
