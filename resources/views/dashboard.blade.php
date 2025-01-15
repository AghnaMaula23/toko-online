<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Dashboard</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Dashboard</h1>
        <div class="row">
            <div class="col-md-6">
                <h2>Jumlah Produk</h2>
                <p>{{ \App\Models\Product::count() }}</p>
            </div>
            <div class="col-md-6">
                <h2>Jumlah Transaksi</h2>
                <p>{{ \App\Models\Transaction::count() }}</p>
            </div>
        </div>
        <a href="{{ route('products.index') }}" class="btn btn-primary">Kelola Produk</a>
        <a href="{{ route('transactions.index') }}" class="btn btn-primary">Kelola Transaksi</a>
    </div>
</body>
</html>