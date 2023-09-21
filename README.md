# Тестовое задание для АНДАТА
Задача: создание MVC-приложения на PHP без использования фреймворков, в Docker окружении.


## Использованные библиотеки, окружение

### PHP
- vlucas/phpdotenv
- izniburak/router
- jenssegers/blade

### JS
- Vue
- Vuetify
- Pinia
- Vite

### Docker
- nginx
- php-fpm
- mysql

## Запуск
Скопировать ``.env.example`` в ``.env``

``composer install``

``npm install && npm run build``

``docker-compose build && docker-compose up -d``

После развертки окружения сайт будет доступен по адресу http://localhost:8080. Перед проверкой необходимо заполнить БД тестовыми данными, для этого перейти по адресу http://localhost:8080/seed.