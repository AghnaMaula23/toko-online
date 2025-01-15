<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Tambah Transaksi</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Tambah Transaksi</h1>
        <form action="{{ route('transactions.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="product_id">Produk</label>
                <select class="form-control" id="product_id" name="product_id" required>
                    <option value="">Pilih Produk</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }} (Stok: {{ $product->stock }})</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="quantity">Jumlah</label>
                <input type="number" class="form-control" id="quantity" name="quantity" required min="1">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('transactions.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" class="form-control" id="name" name="name" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <!-- Tambahkan pesan kesalahan untuk kategori, stok, dan harga dengan cara yang sama -->
    </form>
</body>
</html>