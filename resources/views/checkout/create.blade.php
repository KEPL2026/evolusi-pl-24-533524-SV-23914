<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
</head>

<body>
    <h1>Checkout / Pre-Order</h1>

    <a href="{{ route('cart.index') }}">
        ← Kembali ke Keranjang
    </a>

    <hr>

    <h2>Ringkasan Pesanan</h2>

    @foreach ($cart as $item)
        <p>
            {{ $item['name'] }}
            × {{ $item['quantity'] }}
            =
            Rp{{ number_format(
                $item['price'] * $item['quantity'],
                0,
                ',',
                '.'
            ) }}
        </p>
    @endforeach

    <h3>
        Total: Rp{{ number_format($total, 0, ',', '.') }}
    </h3>

    <hr>

    <form method="POST" action="{{ route('checkout.store') }}">
        @csrf

        <div>
            <label>Nama Pemesan</label><br>

            <input
                type="text"
                name="customer_name"
                value="{{ old('customer_name') }}"
                required
            >

            @error('customer_name')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <br>

        <div>
            <label>Nomor WhatsApp</label><br>

            <input
                type="text"
                name="phone"
                value="{{ old('phone') }}"
                required
            >

            @error('phone')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <br>

        <div>
            <label>Alamat</label><br>

            <textarea
                name="address"
                required
            >{{ old('address') }}</textarea>

            @error('address')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <br>

        <div>
            <label>Tanggal Pesanan</label><br>

            <input
                type="date"
                name="order_date"
                value="{{ old('order_date') }}"
                min="{{ date('Y-m-d') }}"
                required
            >

            @error('order_date')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <br>

        <div>
            <label>Catatan</label><br>

            <textarea name="notes">{{ old('notes') }}</textarea>
        </div>

        <br>

        <button type="submit">
            Buat Pesanan
        </button>
    </form>
</body>
</html>