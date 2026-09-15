<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Menu Catering</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f5f7f5;
            color: #1f2937;
        }

        .navbar {
            background: #ffffff;
            border-bottom: 1px solid #e5e7eb;
            padding: 18px 8%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .brand {
            font-size: 22px;
            font-weight: 700;
            color: #166534;
        }

        .navbar a {
            color: #4b5563;
            text-decoration: none;
            font-size: 14px;
        }

        .container {
            width: 90%;
            max-width: 700px;
            margin: 45px auto;
        }

        .page-title {
            margin-bottom: 25px;
        }

        .page-title h1 {
            font-size: 28px;
            margin-bottom: 7px;
        }

        .page-title p {
            color: #6b7280;
            font-size: 14px;
        }

        .card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            overflow: hidden;
        }

        .card-header {
            background: #f0fdf4;
            padding: 25px;
            border-bottom: 1px solid #dcfce7;
        }

        .card-header h2 {
            color: #166534;
            margin-bottom: 7px;
        }

        .card-header p {
            color: #6b7280;
            font-size: 14px;
        }

        .card-body {
            padding: 25px;
        }

        .detail-row {
            padding: 15px 0;
            border-bottom: 1px solid #e5e7eb;
        }

        .detail-row:last-child {
            border-bottom: none;
        }

        .label {
            display: block;
            color: #6b7280;
            font-size: 13px;
            margin-bottom: 6px;
        }

        .value {
            font-size: 15px;
            font-weight: 600;
        }

        .status {
            display: inline-block;
            padding: 6px 11px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .available {
            background: #dcfce7;
            color: #166534;
        }

        .unavailable {
            background: #fee2e2;
            color: #991b1b;
        }

        .actions {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        .btn-edit,
        .btn-back {
            padding: 11px 18px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
        }

        .btn-edit {
            background: #15803d;
            color: white;
        }

        .btn-back {
            background: #e5e7eb;
            color: #374151;
        }
    </style>
</head>

<body>

<nav class="navbar">
    <div class="brand">CateringKu</div>
    <a href="{{ route('products.index') }}">Kelola Menu</a>
</nav>

<main class="container">

    <div class="page-title">
        <h1>Detail Menu</h1>
        <p>Informasi lengkap menu catering.</p>
    </div>

    <div class="card">

        <div class="card-header">
            <h2>{{ $product->name }}</h2>
            <p>{{ $product->category?->name ?? 'Tidak ada kategori' }}</p>
        </div>

        <div class="card-body">

            <div class="detail-row">
                <span class="label">Nama Menu</span>
                <span class="value">{{ $product->name }}</span>
            </div>

            <div class="detail-row">
                <span class="label">Kategori</span>
                <span class="value">
                    {{ $product->category?->name ?? '-' }}
                </span>
            </div>

            <div class="detail-row">
                <span class="label">Deskripsi</span>
                <span class="value">
                    {{ $product->description ?? '-' }}
                </span>
            </div>

            <div class="detail-row">
                <span class="label">Harga</span>
                <span class="value">
                    Rp {{ number_format($product->price, 0, ',', '.') }}
                </span>
            </div>

            <div class="detail-row">
                <span class="label">Status</span>

                @if ($product->is_available)
                    <span class="status available">Tersedia</span>
                @else
                    <span class="status unavailable">Tidak Tersedia</span>
                @endif
            </div>

        </div>
    </div>

    <div class="actions">
        <a
            href="{{ route('products.edit', $product) }}"
            class="btn-edit"
        >
            Edit Menu
        </a>

        <a
            href="{{ route('products.index') }}"
            class="btn-back"
        >
            Kembali
        </a>
    </div>

</main>

</body>
</html>