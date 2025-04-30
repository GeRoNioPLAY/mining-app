@extends('layouts.app')

@section('title', 'Криптовалюты')

@section('content')
    <h1>Криптовалюты</h1>

    <a href="{{ route('cryptocurrencies.create') }}" class="btn btn-primary mb-3">Добавить криптовалюту</a>

    @if ($cryptocurrencies->isEmpty())
        <p>Криптовалюты отсутствуют.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Название</th>
                    <th>Сложность сети</th>
                    <th>Награда за блок</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cryptocurrencies as $cryptocurrency)
                    <tr>
                        <td>{{ $cryptocurrency->id }}</td>
                        <td>{{ $cryptocurrency->name }}</td>
                        <td>{{ $cryptocurrency->network_difficulty }}</td>
                        <td>{{ $cryptocurrency->block_reward }}</td>
                        <td>
                            <a href="{{ route('cryptocurrencies.edit', $cryptocurrency->id) }}" class="btn btn-warning btn-sm">Редактировать</a>
                            <form action="{{ route('cryptocurrencies.destroy', $cryptocurrency->id) }}" method="POST" style="display:inline;">
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
