<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Menu Catering</title>

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
            align-items: center;
            justify-content: space-between;
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
            width: 84%;
            max-width: 1100px;
            margin: 45px auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 28px;
        }

        .header h1 {
            font-size: 28px;
            margin-bottom: 7px;
        }

        .header p {
            color: #6b7280;
            font-size: 14px;
        }

        .btn-add {
            display: inline-block;
            padding: 12px 18px;
            background: #15803d;
            color: white;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
        }

        .btn-add:hover {
            background: #166534;
        }

        .alert {
            padding: 14px 16px;
            background: #dcfce7;
            color: #166534;
            border: 1px solid #bbf7d0;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            overflow: hidden;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #f9fafb;
            text-align: left;
            padding: 16px;
            font-size: 13px;
            color: #6b7280;
        }

        td {
            padding: 16px;
            border-top: 1px solid #e5e7eb;
            font-size: 14px;
        }

        .product-name {
            font-weight: 600;
            color: #111827;
        }

        .status {
            display: inline-block;
            padding: 5px 10px;
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
            align-items: center;
            gap: 7px;
        }

        .actions a,
        .actions button {
            padding: 7px 11px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 12px;
            cursor: pointer;
        }

        .detail {
            background: #e0f2fe;
            color: #0369a1;
        }

        .edit {
            background: #fef3c7;
            color: #92400e;
        }

        .delete {
            background: #fee2e2;
            color: #b91c1c;
            border: none;
        }

        .empty {
            padding: 50px 20px;
            text-align: center;
            color: #6b7280;
        }

        @media (max-width: 768px) {
            .container {
                width: 92%;
            }

            .header {
                align-items: flex-start;
                flex-direction: column;
                gap: 18px;
            }

            .card {
                overflow-x: auto;
            }

            table {
                min-width: 750px;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar">
        <div class="brand">CateringKu</div>

        <a href="{{ route('menu.index') }}">
            Kembali ke Menu
        </a>
    </nav>

    <main class="container">

        <div class="header">
            <div>
                <h1>Kelola Menu Catering</h1>
                <p>Tambah, lihat, edit, dan hapus menu catering.</p>
            </div>

            <a href="{{ route('products.create') }}" class="btn-add">
                + Tambah Menu
            </a>
        </div>

        @if (session('success'))
            <div class="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="card">

            @if ($products->isEmpty())

                <div class="empty">
                    Belum ada menu catering.
                </div>

            @else

                <table>
                    <thead>
                        <tr>
                            <th>Nama Menu</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td class="product-name">
                                    {{ $product->name }}
                                </td>

                                <td>
                                    {{ $product->category?->name ?? '-' }}
                                </td>

                                <td>
                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                </td>

                                <td>
                                    @if ($product->is_available)
                                        <span class="status available">
                                            Tersedia
                                        </span>
                                    @else
                                        <span class="status unavailable">
                                            Tidak Tersedia
                                        </span>
                                    @endif
                                </td>

                                <td>
                                    <div class="actions">

                                        <a
                                            href="{{ route('products.show', $product) }}"
                                            class="detail"
                                        >
                                            Detail
                                        </a>

                                        <a
                                            href="{{ route('products.edit', $product) }}"
                                            class="edit"
                                        >
                                            Edit
                                        </a>

                                        <form
                                            action="{{ route('products.destroy', $product) }}"
                                            method="POST"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="delete"
                                                onclick="return confirm('Yakin ingin menghapus menu ini?')"
                                            >
                                                Hapus
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            @endif

        </div>

    </main>

</body>
</html>