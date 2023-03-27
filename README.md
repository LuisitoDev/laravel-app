# laravel-app
To setup this proyect you will need to follow the next steps:

1. Create a database locally named laravel_app
2. Download composer https://getcomposer.org/download/
3. Rename .env.example file to .env inside your project root and fill the database information.
4. Open the console and cd your project root directory
5. Run composer install
6. Run php artisan key:generate
7. Run php artisan migrate
8. Run php artisan db:seed to run seeders.
9. Run php artisan serve