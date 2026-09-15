<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Menu Catering</title>

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
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 28px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        input[type="text"],
        input[type="number"],
        select,
        textarea {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 14px;
            outline: none;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #15803d;
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        .checkbox {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .checkbox label {
            margin: 0;
            font-weight: 400;
        }

        .error {
            background: #fee2e2;
            color: #991b1b;
            padding: 14px 18px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .error ul {
            margin: 8px 0 0 20px;
        }

        .actions {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        .btn-save {
            background: #15803d;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
        }

        .btn-save:hover {
            background: #166534;
        }

        .btn-back {
            background: #f3f4f6;
            color: #374151;
            padding: 12px 20px;
            border-radius: 8px;
            font-size: 14px;
            text-decoration: none;
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
        <h1>Edit Menu</h1>
        <p>Perbarui informasi menu catering.</p>
    </div>

    @if ($errors->any())
        <div class="error">
            <strong>Data belum dapat diperbarui.</strong>

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">

        <form
            action="{{ route('products.update', $product) }}"
            method="POST"
        >
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="category_id">Kategori Menu</label>

                <select
                    name="category_id"
                    id="category_id"
                    required
                >
                    @foreach ($categories as $category)
                        <option
                            value="{{ $category->id }}"
                            @selected(
                                old('category_id', $product->category_id)
                                == $category->id
                            )
                        >
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="name">Nama Menu</label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name', $product->name) }}"
                    required
                >
            </div>

            <div class="form-group">
                <label for="description">Deskripsi</label>

                <textarea
                    id="description"
                    name="description"
                >{{ old('description', $product->description) }}</textarea>
            </div>

            <div class="form-group">
                <label for="price">Harga</label>

                <input
                    type="number"
                    id="price"
                    name="price"
                    value="{{ old('price', $product->price) }}"
                    min="0"
                    required
                >
            </div>

            <div class="checkbox">
                <input
                    type="checkbox"
                    id="is_available"
                    name="is_available"
                    value="1"
                    @checked(old('is_available', $product->is_available))
                >

                <label for="is_available">
                    Menu tersedia
                </label>
            </div>

            <div class="actions">

                <button type="submit" class="btn-save">
                    Simpan Perubahan
                </button>

                <a
                    href="{{ route('products.index') }}"
                    class="btn-back"
                >
                    Batal
                </a>

            </div>

        </form>

    </div>

</main>

</body>
</html>