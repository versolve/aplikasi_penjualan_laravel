<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Penjualan</title>

    <!-- Bootstrap 4.3.1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-light">

    <div class="container-fluid">

        <div class="row">

            <!-- SIDEBAR -->
            <div class="col-md-3 col-lg-2 bg-dark text-white min-vh-100 p-4">

                <h4 class="text-center mb-4">
                    Dashboard Penjualan
                </h4>

                <ul class="nav flex-column">

                    <li class="nav-item mb-2">
                        <a class="nav-link text-white" href="{{ url('home') }}">
                            Home
                        </a>
                    </li>

                    <li class="nav-item mb-2">
                        <a class="nav-link text-white" href="{{ url('produk') }}">
                            Produk
                        </a>
                    </li>

                    <li class="nav-item mb-2">
                        <a class="nav-link text-white" href="{{ url('penjualan') }}">
                            Penjualan
                        </a>
                    </li>

                    <li class="nav-item mb-2">
                        <a class="nav-link text-white" href="{{ url('laporan') }}">
                            Laporan
                        </a>
                    </li>

                    <li class="nav-item mb-2">
                        <a class="nav-link text-white" href="{{ url('pengaturan') }}">
                            Pengaturan
                        </a>
                    </li>

                </ul>

            </div>

            <!-- MAIN CONTENT -->
            <div class="col-md-9 col-lg-10 p-4">

                <!-- HEADER -->
                <div class="mb-4">

                    <h2 class="font-weight-bold text-dark">
                        Selamat Datang di Dashboard Penjualan
                    </h2>

                    <p class="text-muted">
                        Daftar produk yang tersedia
                    </p>

                </div>

                <!-- PRODUCT SECTION -->
                <div>

                    <div class="d-flex justify-content-between align-items-center mb-4">

                        <h4 class="font-weight-bold mb-0">
                            Daftar Produk
                        </h4>

                        <a href="{{ url('produk/tambah') }}" class="btn btn-primary">
                            + Tambah Produk
                        </a>

                    </div>

                    <!-- PRODUCT CONTAINER -->
                    <div class="row">

                        @foreach ($products as $item)
                            <!-- PRODUCT CARD -->
                            <div class="col-md-6 col-lg-3 mb-4">

                                <div class="card h-100 border-0 shadow-sm">

                                    <!-- IMAGE -->
                                    <div class="text-center p-3">

                                        <img src="{{ asset('storage/images/' . $item->image) }}"
                                            alt="{{ $item->nama_produk }}" class="card-img-top"
                                            style="height: 150px; object-fit: contain;">

                                    </div>

                                    <!-- CARD BODY -->
                                    <div class="card-body text-center">

                                        <h5 class="card-title font-weight-bold">
                                            {{ $item->nama_produk }}
                                        </h5>

                                        <h5 class="text-success font-weight-bold">
                                            Rp {{ number_format($item->harga, 0, ',', '.') }}
                                        </h5>


                                        <h5 class="text-success font-weight-bold">
                                            Jumlah : {{ number_format($item->jumlah_produk, 0, ',', '.') }}
                                        </h5>
                                        <p class="card-text text-muted">
                                            {{ $item->deskripsi }}
                                        </p>

                                    </div>

                                    <!-- CARD FOOTER -->
                                    <div class="card-footer bg-white border-0 text-center pb-4">

                                        <a href="{{ url('produk/edit/' . $item->kode_produk) }}"
                                            class="btn btn-primary btn-sm mr-1">
                                            Edit
                                        </a>

                                        <form action="{{ url('produk/delete/' . $item->kode_produk) }}" method="POST"
                                            class="d-inline delete-form">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger btn-sm">
                                                Delete
                                            </button>

                                        </form>

                                    </div>

                                </div>

                            </div>
                        @endforeach

                    </div>

                </div>

                <!-- FOOTER -->
                <footer class="text-center text-muted mt-4 py-3">

                    <p class="mb-0">
                        &copy; 2026 Aplikasi Penjualan. All rights reserved.
                    </p>

                </footer>

            </div>

        </div>

    </div>

    <!-- Bootstrap JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>



    <script>
        document.querySelectorAll('.delete-form').forEach(function(form) {

            form.addEventListener('submit', function(e) {

                e.preventDefault();

                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: 'Data produk akan dihapus!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then(function(result) {

                    if (result.isConfirmed) {
                        form.submit();
                    }

                });

            });

        });
    </script>



</body>

</html>
