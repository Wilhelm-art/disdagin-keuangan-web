#!/usr/bin/env bash
echo "--> Memulai inisialisasi DISDAGIN Kota Bandung..."

echo "--> Menjalankan Composer install..."
composer install --no-dev --optimize-autoloader --no-interaction

echo "--> Optimasi caching Laravel..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "--> Menjalankan Migrasi Database..."
php artisan migrate --force

echo "--> Menjalankan Seeder Akun Default (Admin & Kadis)..."
php artisan db:seed --class=UserSeeder --force

echo "--> DISDAGIN Kota Bandung siap melayani request!"
