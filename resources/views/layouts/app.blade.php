<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Майнинг - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/">Майнинг</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('algorithms.index') }}">Алгоритмы</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('exchanges.index') }}">Биржи</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('mining_devices.index') }}">Устройства</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cryptocurrency_lists.index') }}">Список криптовалют</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cryptocurrencies.index') }}">Криптовалюты</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('minings.index') }}">Майнинг</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
