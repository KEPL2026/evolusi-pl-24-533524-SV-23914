# Aplikasi Web Catering dan Pre-Order

Aplikasi Web Catering dan Pre-Order merupakan project berbasis Laravel yang dikembangkan untuk menyediakan layanan pemesanan makanan secara online. Pengguna dapat melihat katalog menu berdasarkan kategori, menambahkan menu ke keranjang, serta melakukan checkout dan menentukan tanggal pre-order.

Project ini juga menerapkan penggunaan Git dan GitHub dalam proses pengembangan, mulai dari penggunaan branch, Conventional Commits, Pull Request, hingga Continuous Integration menggunakan GitHub Actions.

## Identitas Mahasiswa

- Nama: [Isi Nama Lengkap]
- NIM: 24/533524/SV/23914
- Repository: `evolusi-pl-24-533524-SV-23914`

## Fitur Aplikasi

Fitur yang dikembangkan pada aplikasi ini meliputi:

- Menampilkan katalog menu catering.
- Mengelompokkan menu berdasarkan kategori.
- Melakukan pencarian menu.
- Menampilkan detail menu.
- Menambahkan menu ke keranjang belanja.
- Mengubah jumlah menu dalam keranjang.
- Menghapus menu dari keranjang.
- Melakukan checkout pesanan.
- Menentukan tanggal pre-order.
- Menyimpan data pesanan dan detail pesanan.

## Teknologi yang Digunakan

Project ini dikembangkan menggunakan:

- Laravel 12
- PHP 8.2
- MySQL
- Blade Template
- Git
- GitHub
- GitHub Actions
- Laravel Pint

## Struktur Database

Aplikasi menggunakan beberapa tabel utama:

| Tabel | Keterangan |
| --- | --- |
| `users` | Menyimpan data pengguna dan role |
| `categories` | Menyimpan kategori menu |
| `products` | Menyimpan data menu catering |
| `orders` | Menyimpan data pesanan |
| `order_items` | Menyimpan detail produk pada setiap pesanan |

Relasi utama pada database:

- Satu kategori dapat memiliki banyak produk.
- Satu produk berada pada satu kategori.
- Satu pesanan dapat memiliki banyak detail pesanan.
- Setiap detail pesanan terhubung dengan produk.

## Alur Branch

Project menggunakan tiga branch dalam proses pengembangan:

- `main` sebagai branch utama yang menyimpan versi akhir aplikasi.
- `dev` sebagai branch untuk proses pengembangan.
- `feature/catering-order` sebagai branch untuk mengembangkan fitur aplikasi catering.

Alur pengembangan yang digunakan:

```text
main
  ↓
dev
  ↓
feature/catering-order
  ↓
Pull Request
dev
  ↓
Pull Request
main
```

Setelah pengembangan fitur selesai, branch `feature/catering-order` digabungkan ke branch `dev` melalui Pull Request. Setelah seluruh fitur dan pengujian berhasil, branch `dev` digabungkan ke branch `main` melalui Pull Request.

## Conventional Commits

Penulisan pesan commit pada project mengikuti format Conventional Commits.

Beberapa commit utama dalam pengembangan project:

```text
chore: inisialisasi aplikasi web catering berbasis Laravel
ci: tambahkan workflow pengujian otomatis Laravel
feat: tambahkan struktur database catering
feat: tambahkan katalog dan kategori menu
feat: tambahkan keranjang belanja berbasis session
feat: tambahkan fitur checkout dan pre-order
```

Penggunaan `chore`, `ci`, dan `feat` membantu menjelaskan jenis perubahan yang dilakukan pada setiap commit.

## Continuous Integration

Project menggunakan GitHub Actions untuk melakukan pemeriksaan project secara otomatis ketika terjadi `push` atau `pull request` pada branch yang telah ditentukan.

Workflow berada pada:

```text
.github/workflows/ci.yml
```

Workflow menjalankan dua job utama:

1. Pengujian Laravel
   - Mengambil source code.
   - Menyiapkan PHP.
   - Menginstal dependency Composer.
   - Menyiapkan environment.
   - Menjalankan migration.
   - Menjalankan pengujian dengan `php artisan test`.

2. Pemeriksaan Gaya Kode
   - Mengambil source code.
   - Menyiapkan PHP.
   - Menginstal dependency Composer.
   - Memeriksa gaya penulisan kode menggunakan Laravel Pint.

Workflow dinyatakan berhasil apabila seluruh job dapat dijalankan tanpa error dan menghasilkan status hijau pada GitHub Actions.

## Instalasi dan Menjalankan Project

Clone repository:

```bash
git clone https://github.com/KEPL2026/evolusi-pl-24-533524-SV-23914.git
```

Masuk ke folder project:

```bash
cd evolusi-pl-24-533524-SV-23914
```

Install dependency Laravel:

```bash
composer install
```

Salin file `.env.example` menjadi `.env`:

```bash
copy .env.example .env
```

Buat application key:

```bash
php artisan key:generate
```

Buat database MySQL dengan nama:

```text
catering_db
```

Kemudian sesuaikan konfigurasi database pada file `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=catering_db
DB_USERNAME=root
DB_PASSWORD=
```

Jalankan migration:

```bash
php artisan migrate
```

Jalankan aplikasi:

```bash
php artisan serve
```

Kemudian buka aplikasi melalui:

```text
http://127.0.0.1:8000
```

## Pengujian

Untuk menjalankan pengujian Laravel:

```bash
php artisan test
```

Untuk merapikan format kode menggunakan Laravel Pint:

```bash
.\vendor\bin\pint
```

Untuk memeriksa gaya kode:

```bash
.\vendor\bin\pint --test
```

## Status Project

Project telah dikembangkan sampai fitur checkout dan pre-order. Seluruh perubahan dikembangkan melalui branch dan akan digabungkan menggunakan Pull Request setelah proses pengujian berhasil.
