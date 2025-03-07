# Product Price Calculator

## Описание
Product Price Calculator — это веб-приложение, разработанное на Laravel, которое позволяет рассчитывать стоимость товаров на основе заданных параметров.

## Установка и настройка

### 1. Клонирование репозитория
```sh
git clone https://github.com/your-repo/product-price-calculator.git
cd product-price-calculator
```

### 2. Установка зависимостей
```sh
composer install
npm install
```

### 3. Настройка окружения
Скопируйте файл конфигурации окружения и настройте его:
```sh
cp .env.example .env
```
Отредактируйте `.env`, указав настройки базы данных и другие параметры.

### 4. Генерация ключа приложения
```sh
php artisan key:generate
```

### 5. Миграции базы данных
```sh
php artisan migrate --seed
```

### 6. Запуск сервера
```sh
php artisan serve
```
Приложение будет доступно по адресу `http://127.0.0.1:8000`.

## Команды для разработки

### Запуск сборщика фронтенда
```sh
npm run dev
```

### Тестирование
```sh
php artisan test
```

## Лицензия
Проект распространяется под лицензией MIT.

