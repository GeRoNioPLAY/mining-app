# Установка

- Клонирование репозитория

```sh
git clone https://github.com/GeRoNioPLAY/mining-app.git
```

- Установка пакетов

```sh
composer install
npm install
```

- Настройка окружения

```sh
cp .env.example .env
php artisan key:generate
```

- Применение миграций

```sh
php artisan migrate
```

- Сборка фронтенда

```sh
npm run build
```

# Запуск

```sh
php artisan serve
```
