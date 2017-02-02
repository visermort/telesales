<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

## Тестовый проект Laravel Telesales

### Инструкция по разворачиванию

1. git clone  git@github.com:visermort/telesales.git
2. cd telesales
3. composer install
4. Скопировать .env.example в .env, настроить параметры рабочей среды.
5. php artisan key:generate
6. php artisan migrate
7. php artisan db:seed
7. Настроить корень веб-сервера в папку public и отрыть страницу в браузере
 или выполнить php artisan serve, страница будет доступна по адресу http://localhost:8000
