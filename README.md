
<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## JWT-CLIENT

### Пакет для валидации JWT токена, позволяющий загружать публичный ключ с Oauth сервера

### Установка:
```
composer require satpro-hub/jwt-client
```

##
### Настройка загрузки публичного ключа c Oauth сервера
1. Добавить в .env файл ссылку на получение токена
```
PUBLIC_TOKEN_URL=https://mysite.site/api/public_key
```
2. Добавить в cron выполенение команды
```
php artisan oauth:key
```