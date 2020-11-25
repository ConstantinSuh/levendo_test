## Установка

Установите зависимости:

``` composer install ```

Создайте ключ:

``` php artisan key:generate```

Настройте подключение к бд в ```.env``` файле. Выполните миграции.

```php artisan migrate```

Для работы поискового движка (algolia) установите `` ALGOLIA_APP_ID `` и  ``ALGOLIA_SECRET``
