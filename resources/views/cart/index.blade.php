<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja</title>
</head>
<body>
    <h1>Keranjang Belanja</h1>

    <a href="{{ route('menu.index') }}">
        Kembali ke Menu
    </a>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <hr>

    @forelse ($cart as $id => $item)
        <div>
            <h2>{{ $item['name'] }}</h2>

            <p>
                Harga:
                Rp{{ number_format($item['price'], 0, ',', '.') }}
            </p>

            <form method="POST" action="{{ route('cart.update', $id) }}">
                @csrf
                @method('PUT')

                <input
                    type="number"
                    name="quantity"
                    value="{{ $item['quantity'] }}"
                    min="1"
                >

                <button type="submit">
                    Perbarui
                </button>
            </form>

            <p>
                Subtotal:
                Rp{{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}
            </p>

            <form method="POST" action="{{ route('cart.remove', $id) }}">
                @csrf
                @method('DELETE')

                <button type="submit">
                    Hapus
                </button>
            </form>
        </div>

        <hr>
    @empty
        <p>Keranjang masih kosong.</p>
    @endforelse

    @if (!empty($cart))
        <h2>
            Total:
            Rp{{ number_format(
                collect($cart)->sum(
                    fn ($item) => $item['price'] * $item['quantity']
                ),
                0,
                ',',
                '.'
            ) }}
        </h2>
    @endif
</body>
</html>