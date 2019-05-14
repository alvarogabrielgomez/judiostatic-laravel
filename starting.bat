composer install
npm install
copy .env.example .env
php artisan key:generate
php artisan migrate:refresh --seed
php artisan passport:install
pause