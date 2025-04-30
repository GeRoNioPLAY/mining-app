@extends('layouts.app')

@section('title', 'Биржи')

@section('content')
    <h1>Биржи</h1>

    <a href="{{ route('exchanges.create') }}" class="btn btn-primary mb-3">Добавить биржу</a>

    @if ($exchanges->isEmpty())
        <p>Биржи отсутствуют.</p>
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
                @foreach ($exchanges as $exchange)
                    <tr>
                        <td>{{ $exchange->id }}</td>
                        <td>{{ $exchange->name }}</td>
                        <td>
                            <a href="{{ route('exchanges.edit', $exchange->id) }}" class="btn btn-warning btn-sm">Редактировать</a>
                            <form action="{{ route('exchanges.destroy', $exchange->id) }}" method="POST" style="display:inline;">
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
