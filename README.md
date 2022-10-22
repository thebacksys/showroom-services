# Pre-Installation 
1. copy .env.example .env
2. config DATABASE in .env file

# Installation
1. composer install
2. php artisan key:generate
3. php artisan migrate:fresh --seed

# Run 
php artisan serve
