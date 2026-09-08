<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Catering</title>
</head>

<body>
    <h1>Menu Catering</h1>

    <form method="GET" action="{{ route('menu.index') }}">
        <input
            type="text"
            name="search"
            placeholder="Cari menu..."
            value="{{ request('search') }}"
        >

        <select name="category">
            <option value="">Semua Kategori</option>

            @foreach ($categories as $category)
                <option
                    value="{{ $category->id }}"
                    @selected(request('category') == $category->id)
                >
                    {{ $category->name }}
                </option>
            @endforeach
        </select>

        <button type="submit">Cari</button>
    </form>

    <hr>

    @forelse ($products as $product)
        <div>
            <h2>{{ $product->name }}</h2>

            <p>
                Kategori:
                {{ $product->category->name }}
            </p>

            <p>
                Rp{{ number_format($product->price, 0, ',', '.') }}
            </p>

            <a href="{{ route('menu.show', $product) }}">
                Lihat Detail
            </a>
        </div>

        <hr>
    @empty
        <p>Menu belum tersedia.</p>
    @endforelse
</body>
</html>