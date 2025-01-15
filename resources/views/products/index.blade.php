<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Daftar Produk</title>
</head>
<body>
    <form action="{{ route('products.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <select class="form-control" name="category">
                <option value="">Semua Kategori</option>
                <option value="kategori1">Kategori 1</option>
                <option value="kategori2">Kategori 2</option>
                
            </select>
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">Filter</button>
            </div>
        </div>
    </form>
    <div class="container mt-5">
        <h1>Daftar Produk</h1>
        <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Tambah Produk</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Stok</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>{{ $product->price }}</td>
                        <td>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <form action="{{ route('products.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" class="form-control" name="search" placeholder="Cari produk...">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">Cari</button>
            </div>
        </div>
    </form>
</body>
</html>