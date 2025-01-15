<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Riwayat Transaksi</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Riwayat Transaksi</h1>
        <a href="{{ route('transactions.create') }}" class="btn btn-primary mb-3">Tambah Transaksi</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Produk</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->id }}</td>
                        <td>{{ $transaction->product->name }}</td>
                        <td>{{ $transaction->quantity }}</td>
                        <td>{{ $transaction->total_price }}</td>
                        <td>{{ $transaction->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>