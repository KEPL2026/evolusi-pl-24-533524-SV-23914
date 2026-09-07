<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }}</title>
</head>

<body>
    <a href="{{ route('menu.index') }}">
        ← Kembali ke Menu
    </a>

    <h1>{{ $product->name }}</h1>

    <p>
        Kategori: {{ $product->category->name }}
    </p>

    <p>
        {{ $product->description ?? 'Tidak ada deskripsi.' }}
    </p>

    <h2>
        Rp{{ number_format($product->price, 0, ',', '.') }}
    </h2>
</body>
</html>