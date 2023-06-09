### Laraboot Authentication
This template includes the following components:
- Laravel 10
- SB Admin (Bootstrap v5.2.3)
- jQuery v3.5.1
- ChartJS v2.8.0
- Datatables v1.13.4

### Description
This template provides the following features:
- Login functionality (Web & API)
- Database seeding
- Role-based access control
- Dashboard

### Instalation
To install and set up the template, follow these steps:
```sh
git clone jahrulnr/laraboot-authentication
cd  laraboot-authentication
composer install
cp .env.example .env

# Open .env and set up the database

php artisan storage:link
php artisan migrate
php artisan db:seed
php artisan serve
```

### Finally
After completing the installation, you will have one user with the "admin" role. You can log in using the following credentials:

Email: ```admin@demo.com``` <br>
Password: ```123456``` <br/>

Feel free to explore and modify this template to suit your needs.

### Source:
- [Laravel](https://github.com/laravel/laravel)
- [SB Admin](https://github.com/StartBootstrap/startbootstrap-sb-admin)
