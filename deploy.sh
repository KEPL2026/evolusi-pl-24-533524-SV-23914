#!/usr/bin/env bash

set -euo pipefail

echo "============================================"
echo "Percobaan deployment dengan urutan dibalik"
echo "============================================"

echo "1. Menjalankan migration SEBELUM dependency..."

php artisan migrate --force

echo "2. Menginstal dependency production..."

composer install \
    --no-dev \
    --prefer-dist \
    --no-interaction \
    --optimize-autoloader

echo "============================================"
echo "Deployment selesai"
echo "============================================"