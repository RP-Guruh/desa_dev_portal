        <!-- Counter Facts Start -->
        <div class="container-fluid counter-facts py-5">
            <div class="container py-5">
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
                                    <h4 class="text-secondary mb-0" style="font-weight: 600; font-size: 25px;"></h4>
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
                                    <h4 class="text-secondary mb-0" style="font-weight: 600; font-size: 25px;"></h4>
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
            </div>
        </div>
        <!-- Counter Facts End -->