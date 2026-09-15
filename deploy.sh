#!/usr/bin/env bash

set -euo pipefail

echo "===================================="
echo "Memulai deployment aplikasi catering"
echo "===================================="

echo "1. Menginstal dependency production..."

composer install \
    --no-dev \
    --prefer-dist \
    --no-interaction \
    --optimize-autoloader

echo "2. Membuat application key..."

php artisan key:generate --force

echo "3. Menjalankan migration database..."

php artisan migrate --force

echo "4. Membersihkan cache Laravel..."

php artisan config:clear
php artisan route:clear
php artisan view:clear

echo "===================================="
echo "Deployment berhasil"
echo "===================================="