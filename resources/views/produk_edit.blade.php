<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
</head>

<body class="bg-light">
    <main class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <h1 class="h3 mb-4">Edit Produk</h1>

                        <form action="{{ url('produk/edit/' . $product->kode_produk) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="nama_produk">Nama produk</label>
                                <input class="form-control" id="nama_produk" name="nama_produk" type="text"
                                    value="{{ old('nama_produk', $product->nama_produk) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi"
                                    rows="3">{{ old('deskripsi', $product->deskripsi) }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input class="form-control" id="harga" name="harga" type="number" min="0"
                                    value="{{ old('harga', $product->harga) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="jumlah_produk">Jumlah produk</label>
                                <input class="form-control" id="jumlah_produk" name="jumlah_produk" type="number"
                                    min="0" value="{{ old('jumlah_produk', $product->jumlah_produk) }}" required>
                            </div>

                            @if ($product->image)
                                <div class="form-group">
                                    <p>Gambar saat ini</p>
                                    <img src="{{ asset('storage/images/' . $product->image) }}"
                                        alt="{{ $product->nama_produk }}" style="max-height: 150px; max-width: 100%;">
                                </div>
                            @endif

                            <div class="form-group">
                                <label for="image">Ganti gambar produk (opsional)</label>
                                <input class="form-control-file" id="image" name="image" type="file"
                                    accept="image/*">
                            </div>

                            <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
                            <a class="btn btn-secondary" href="{{ url('produk') }}">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
