<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
</head>

<body class="bg-light">
    <main class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <h1 class="h3 mb-4">Tambah Produk</h1>

                        <form action="{{ url('produk/tambah') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="nama_produk">Nama produk</label>
                                <input class="form-control" id="nama_produk" name="nama_produk" type="text" required>
                            </div>

                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input class="form-control" id="harga" name="harga" type="number" min="0" required>
                            </div>

                            <div class="form-group">
                                <label for="jumlah_produk">Jumlah produk</label>
                                <input class="form-control" id="jumlah_produk" name="jumlah_produk" type="number"
                                    min="0" required>
                            </div>

                            <div class="form-group">
                                <label for="image">Gambar produk</label>
                                <input class="form-control-file" id="image" name="image" type="file" accept="image/*">
                            </div>

                            <button class="btn btn-primary" type="submit">Simpan Produk</button>
                            <a class="btn btn-secondary" href="{{ url('produk') }}">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
