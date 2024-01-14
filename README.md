# Install
### Migrations
Run migrations to create the necessary tables.
```php
php artisan migrate
```

### Middleware
Add LastUserActivity middleware to middleware array in *app/Http/Kernel.php*:
```php
protected $middlewareGroups = [
    …
    \Atin\LaravelUserOnline\Http\Middleware\LastUserActivity::class,
];
```

### Trait
You cant optionally add **HasOnline** trait to User model to get the online status of the user.

```php

use Atin\LaravelUserOnline\Traits\HasOnline;

class User extends Authenticatable
{
    use HasOnline, …
```

don't forget to cast last_seen_at property to datetime in your User model:

```php  
protected $casts = [
    …
    'last_seen_at' => 'datetime',
];
```

and then you can check the online status:

```php
auth->user()->isOnline();
```

# Publishing
### Migrations
```php
php artisan vendor:publish --tag="laravel-user-online-migrations"
```

### Config
```php
php artisan vendor:publish --tag="laravel-user-online-config"
```