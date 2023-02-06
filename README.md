PHP Version: 8.2.1
Laravel Framework 9.50.2

admin login: /admin/login
admin register: /admin/register


user login: /login
user register: /register



## How to run the code
- git clone https://github.com/AjayYadavAi/laravel-9-multi-auth-system.git
- cd laravel-9-multi-auth-system
- cp .env.example `.env`
- open .env and update DB_DATABASE (database details)
- run : `composer install`
- run : `php artisan key:generate`
- run : `php artisan migrate:fresh --seed`
- run : `php artisan serve`

## Credentials
- #### Admin
- email or username: tech@computan.com or admin
- password : secret
- #### user
- email: user@user.com
- password: secret
