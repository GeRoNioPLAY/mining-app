@extends('layouts.app')

@section('title', 'Майнинг')

@section('content')
    <h1>Майнинг</h1>

    <a href="{{ route('minings.create') }}" class="btn btn-primary mb-3">Добавить запись</a>

    @if ($minings->isEmpty())
        <p>Записи отсутствуют.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Устройство</th>
                    <th>Криптовалюта</th>
                    <th>Алгоритм</th>
                    <th>Хэшрейт (TH/s)</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($minings as $mining)
                    <tr>
                        <td>{{ $mining->id }}</td>
                        <td>{{ $mining->miningDevice->device_name }}</td>
                        <td>{{ $mining->cryptocurrency->name }}</td>
                        <td>{{ $mining->algorithm->name }}</td>
                        <td>{{ $mining->hashrate }}</td>
                        <td>
                            <a href="{{ route('minings.edit', $mining->id) }}" class="btn btn-warning btn-sm">Редактировать</a>
                            <form action="{{ route('minings.destroy', $mining->id) }}" method="POST" style="display:inline;">
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
