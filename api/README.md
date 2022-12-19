# Intruções
## Instalar Dependencias
> composer update

# Crete Applicatrion with last version
    - composer create-project laravel/laravel
    -

# Implement Auth Core Application - Sanctum
    - composer require laravel/sanctum
    - php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
    - app/Http/Kernel.php
        - \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,

# Ajustes .env
    - DataBase
    - Queue
        - php artisan queue:table
        - add QUEUE_CONNECTION=database
    - Email
        - mailtrap
    - API_SECRET_TOKEN=M3rC4d0

# Queue
    - Crete Template Email
        - php artisan make:mail TestHelloEmail
    - RUN Queue
        - php artisan queue:work

# Migrations
    - create
        - Product
        - Financial

# Models
    - User
    - Product
    - Financial

# Controller
    - Product
    - Auth
    - Financial
