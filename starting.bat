composer install
npm install
copy .env.example .env
php artisan key:generate
php artisan migrate
php artisan db:seed --class=UserTableSeeder
php artisan passport:install
pause