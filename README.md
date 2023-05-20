# Install
Add LastUserActivity middleware to middleware array in *app/Http/Kernel.php*:
```php
  protected $middleware = [
        …
        \Atin\LaravelUserOnline\Http\Middleware\LastUserActivity::class,
    ];
```

### Trait
Add **HasOnline** trait to User model

```php

use Atin\LaravelUserOnline\Traits\HasOnline;

class User extends Authenticatable
{
    use HasOnline, …
```

# Publishing
### Config
```php
php artisan vendor:publish --tag="laravel-user-online-config"
```