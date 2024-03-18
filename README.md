<p align="center">
<a href="https://packagist.org/packages/satpro-hub/jwt-client"><img src="https://poser.pugx.org/satpro-hub/jwt-client/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/satpro-hub/jwt-client"><img src="https://poser.pugx.org/satpro-hub/jwt-client/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/satpro-hub/jwt-client"><img src="https://poser.pugx.org/satpro-hub/jwt-client/license.svg" alt="License"></a>
</p>

## JWT-CLIENT

### Пакет для валидации JWT токена, позволяющий загружать публичный ключ с Oauth сервера

### Установка:

```
composer require satpro-hub/oauth-client
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