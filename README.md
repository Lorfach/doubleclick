# DoubleClick

Веб-игры на реакцию и клики (SUO, Circles) с авторизацией и таблицей лидеров.

## Стек
- PHP 8 / MySQL
- Vanilla JS, jQuery, Anime.js, Bootstrap

## Локальный запуск

1. Создать базу данных:
```bash
mysql -u root -p < schema.sql
```

2. Запустить сервер:
```bash
php -S localhost:8000 -d short_open_tag=On
```

Либо через Docker:
```bash
docker build -t doubleclick .
docker run -p 8000:80 doubleclick
```

## Переменные окружения
- `DB_HOST` — хост базы (по умолчанию `localhost`)
- `DB_USER` — пользователь (по умолчанию `root`)
- `DB_PASS` — пароль
- `DB_NAME` — имя базы (`doubleclick`)
- `DB_PORT` — порт (по умолчанию `3306`)
