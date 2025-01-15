<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Tambah Produk</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Tambah Produk</h1>
        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="category">Kategori</label>
                <input type="text" class="form-control" id="category" name="category" required>
            </div>
            <div class="form-group">
                <label for="stock">Stok</label>
                <input type="number" class="form-control" id="stock" name="stock" required>
            </div>
            <div class="form-group">
                <label for="price">Harga</label>
                <input type="number" class="form-control" id="price" name="price" step="0.01" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Kembali</a>
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