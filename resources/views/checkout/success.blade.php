<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Berhasil</title>
</head>

<body>
    <h1>Pesanan Berhasil</h1>

    <p>
        Nomor Pesanan: #{{ $order->id }}
    </p>

    <p>
        Nama: {{ $order->customer_name }}
    </p>

    <p>
        Nomor WhatsApp: {{ $order->phone }}
    </p>

    <p>
        Tanggal Pesanan: {{ $order->order_date }}
    </p>

    <h2>Detail Pesanan</h2>

    @foreach ($order->items as $item)
        <p>
            {{ $item->product->name }}
            × {{ $item->quantity }}
            =
            Rp{{ number_format($item->subtotal, 0, ',', '.') }}
        </p>
    @endforeach

    <h2>
        Total:
        Rp{{ number_format($order->total_price, 0, ',', '.') }}
    </h2>

    <p>
        Status Pesanan: {{ $order->order_status }}
    </p>

    <p>
        Status Pembayaran: {{ $order->payment_status }}
    </p>

    <a href="{{ route('menu.index') }}">
        Kembali ke Menu
    </a>
</body>
</html>