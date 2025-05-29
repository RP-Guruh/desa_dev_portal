<!-- Counter Facts Start -->
<div class="container-fluid counter-facts py-5">
    <div class="container py-5">

        <!-- Judul Administrasi Penduduk -->
        <div class="text-center mb-5">
            <h1 style="
                font-family: 'Poppins', sans-serif;
                font-weight: 700;
                font-size: 2rem;
                background-color: #dc3545;
                color: #fff;
                display: inline-block;
                padding: 12px 24px;
                border-radius: 10px;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            " class="text-uppercase">
                Administrasi Penduduk
            </h1>
        </div>

        <!-- Data Penduduk -->
        <div class="row g-4">
            <div class="col-12 col-sm-6 col-md-6 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                <div class="counter">
                    <div class="counter-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="counter-content">
                        <h3>Jumlah Penduduk</h3>
                        <div class="d-flex align-items-center justify-content-center">
                            <span class="counter-value" data-toggle="counter-up">{{ $penduduk->jumlah_penduduk }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-xl-3 wow fadeInUp" data-wow-delay="0.3s">
                <div class="counter">
                    <div class="counter-icon">
                        <i class="fas fa-mars"></i>
                    </div>
                    <div class="counter-content">
                        <h3>Laki-laki</h3>
                        <div class="d-flex align-items-center justify-content-center">
                            <span class="counter-value" data-toggle="counter-up">{{ $penduduk->jumlah_lakilaki }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-xl-3 wow fadeInUp" data-wow-delay="0.5s">
                <div class="counter">
                    <div class="counter-icon">
                        <i class="fas fa-venus"></i>
                    </div>
                    <div class="counter-content">
                        <h3>Perempuan</h3>
                        <div class="d-flex align-items-center justify-content-center">
                            <span class="counter-value" data-toggle="counter-up">{{ $penduduk->jumlah_perempuan }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-xl-3 wow fadeInUp" data-wow-delay="0.7s">
                <div class="counter">
                    <div class="counter-icon">
                        <i class="fas fa-male"></i>
                    </div>
                    <div class="counter-content">
                        <h3>Kepala Keluarga</h3>
                        <div class="d-flex align-items-center justify-content-center">
                            <span class="counter-value" data-toggle="counter-up">{{ $penduduk->jumlah_kk }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Spacer antara dua bagian -->
        <div class="my-5"></div>

        <!-- Judul APB Desa -->
        <div class="text-center mb-5">
            <h1 style="
                font-family: 'Poppins', sans-serif;
                font-weight: 700;
                font-size: 2rem;
                background-color: #dc3545;
                color: #fff;
                display: inline-block;
                padding: 12px 24px;
                border-radius: 10px;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            " class="text-uppercase">
                Anggaran Pendapatan & Belanja Desa Tahun 2025
            </h1>
        </div>

        <!-- Card APB Desa -->
        <div class="row g-4 justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card border-0 shadow-lg p-4 h-100 text-center bg-white">
                    <div class="card-body">
                        <div class="mb-3 text-success fs-2">
                            <i class="fas fa-coins"></i>
                        </div>
                        <h4 class="card-title fw-bold">Pendapatan Desa</h4>
                        <p class="card-text text-muted fs-5">Rp 1.200.000.000</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-5">
                <div class="card border-0 shadow-lg p-4 h-100 text-center bg-white">
                    <div class="card-body">
                        <div class="mb-3 text-danger fs-2">
                            <i class="fas fa-wallet"></i>
                        </div>
                        <h4 class="card-title fw-bold">Belanja Desa</h4>
                        <p class="card-text text-muted fs-5">Rp 950.000.000</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- Counter Facts End -->
