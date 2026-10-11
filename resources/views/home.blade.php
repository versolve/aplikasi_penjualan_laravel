<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Penjualan</title>

    <!-- Bootstrap 4.3.1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">

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
                        <a href="{{ url('home') }}" class="nav-link text-white">
                            Home
                        </a>
                    </li>

                    <li class="nav-item mb-2">
                        <a href="{{ url('produk') }}" class="nav-link text-white">
                            Produk
                        </a>
                    </li>

                    <li class="nav-item mb-2">
                        <a href="{{ url('penjualan') }}" class="nav-link text-white">
                            Penjualan
                        </a>
                    </li>

                    <li class="nav-item mb-2">
                        <a href="{{ url('laporan') }}" class="nav-link text-white">
                            Laporan
                        </a>
                    </li>

                    <li class="nav-item mb-2">
                        <a href="{{ url('pengaturan') }}" class="nav-link text-white">
                            Pengaturan
                        </a>
                    </li>

                </ul>

            </div>


            <!-- MAIN CONTENT -->
            <div class="col-md-9 col-lg-10 p-4">

                <!-- HEADER -->
                <header class="mb-4">

                    <h2 class="font-weight-bold text-dark">
                        Selamat Datang di Dashboard Penjualan
                    </h2>

                    <p class="text-muted">
                        Ringkasan informasi penjualan
                    </p>

                </header>


                <!-- STATS CARDS -->
                <div class="row">

                    <!-- TOTAL PRODUK -->
                    <div class="col-md-6 col-lg-3 mb-4">

                        <div class="card border-0 shadow-sm h-100">

                            <div class="card-body text-center">

                                <h6 class="text-muted">
                                    Total Produk
                                </h6>

                                <h2 class="font-weight-bold text-primary" id="total-products">
                                    320
                                </h2>

                            </div>

                        </div>

                    </div>


                    <!-- PENJUALAN HARI INI -->
                    <div class="col-md-6 col-lg-3 mb-4">

                        <div class="card border-0 shadow-sm h-100">

                            <div class="card-body text-center">

                                <h6 class="text-muted">
                                    Penjualan Hari Ini
                                </h6>

                                <h2 class="font-weight-bold text-warning" id="sales-today">
                                    100
                                </h2>

                            </div>

                        </div>

                    </div>


                    <!-- TOTAL PENDAPATAN -->
                    <div class="col-md-6 col-lg-3 mb-4">

                        <div class="card border-0 shadow-sm h-100">

                            <div class="card-body text-center">

                                <h6 class="text-muted">
                                    Total Pendapatan
                                </h6>

                                <h2 class="font-weight-bold text-success" id="total-revenue">
                                    Rp 50.000.000
                                </h2>

                            </div>

                        </div>

                    </div>


                    <!-- PENGGUNA -->
                    <div class="col-md-6 col-lg-3 mb-4">

                        <div class="card border-0 shadow-sm h-100">

                            <div class="card-body text-center">

                                <h6 class="text-muted">
                                    Pengguna Terdaftar
                                </h6>

                                <h2 class="font-weight-bold text-info" id="registered-users">
                                    350
                                </h2>

                            </div>

                        </div>

                    </div>

                </div>


                <!-- ALERT -->
                <div class="alert alert-primary shadow-sm" role="alert">

                    <strong>Informasi!</strong>
                    Selamat datang di Dashboard Penjualan.

                </div>


                <!-- INFO PANEL -->
                <div class="card border-0 shadow-sm">

                    <div class="card-body">

                        <h4 class="card-title font-weight-bold">
                            Grafik Penjualan Bulanan
                        </h4>

                        <p class="text-muted mb-0">
                            (Chart belum ditampilkan)
                        </p>

                    </div>

                </div>


                <!-- FOOTER -->
                <footer class="text-center text-muted mt-4 py-3">

                    <p class="mb-0">
                        &copy; 2026 Aplikasi Penjualan.
                        All rights reserved.
                    </p>

                </footer>

            </div>

        </div>

    </div>


    <!-- Bootstrap JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>

</body>

</html>

