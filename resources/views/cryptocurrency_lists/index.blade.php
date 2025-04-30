@extends('layouts.app')

@section('title', 'Список криптовалют')

@section('content')
    <h1>Список криптовалют</h1>

    <a href="{{ route('cryptocurrency_lists.create') }}" class="btn btn-primary mb-3">Добавить запись</a>

    @if ($cryptocurrencyLists->isEmpty())
        <p>Записи отсутствуют.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Биржа</th>
                    <th>Криптовалюта</th>
                    <th>Цена ($)</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cryptocurrencyLists as $cryptocurrencyList)
                    <tr>
                        <td>{{ $cryptocurrencyList->id }}</td>
                        <td>{{ $cryptocurrencyList->exchange->name }}</td>
                        <td>{{ $cryptocurrencyList->cryptocurrency->name }}</td>
                        <td>{{ $cryptocurrencyList->price }}</td>
                        <td>
                            <a href="{{ route('cryptocurrency_lists.edit', $cryptocurrencyList->id) }}" class="btn btn-warning btn-sm">Редактировать</a>
                            <form action="{{ route('cryptocurrency_lists.destroy', $cryptocurrencyList->id) }}" method="POST" style="display:inline;">
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
