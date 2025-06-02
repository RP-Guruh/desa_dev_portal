        <!-- Navbar & Hero Start -->
        <div class="container-fluid nav-bar p-0">
            <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0" style="background-color:#1a7a45">
                <a href="" class="navbar-brand p-0">

                    <h1 class="display-9 text-white m-0 d-flex align-items-center">
                        <img src="https://www.langkatkab.go.id/aset/images/logo.png" class="img-fluid me-3" alt="" style="max-height: 60px;">
                        <div class="d-flex flex-column">
                            <span class="fs-4 fw-bold">Desa Nusantara</span>
                            <span class="fs-6">Kabupaten Langkat</span>
                        </div>
                    </h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <a href="#!" class="floating-btn" title="Alarm">
                    <i class="fas fa-bell"></i>
                </a>
                <button class="navbar-toggler" type="button" id="menu-toggle">
                    <span class="fa fa-bars text-white"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href="/" class="nav-item nav-link {{ Request::is('/') ? 'active text-white fw-bold' : 'text-white' }}">Home</a>
                        <a href="{{ url('/profil') }}" class="nav-item nav-link {{ Request::is('profil') ? 'active text-white fw-bold' : 'text-white' }}">Profil Desa</a>
                        <!-- <a href="" class="nav-item nav-link text-white">PPID</a> -->
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link text-white" data-bs-toggle="dropdown">
                                <span class="dropdown-toggle">Infografis</span>
                            </a>
                            <div class="dropdown-menu m-0">
                                <a href="{{ url('infografis/penduduk') }}" class="dropdown-item {{ Request::is('infografis/penduduk') ? 'active text-white fw-bold' : 'text-white' }}">Kependudukan</a>
                                <!-- <a href="#" class="dropdown-item {{ Request::is('infografis/sdgs') ? 'active text-white fw-bold' : 'text-white' }}">SDGs</a> -->
                            </div>
                        </div>
                        <a href="{{ url('/peta') }}" class="nav-item nav-link {{ Request::is('peta') ? 'active text-white fw-bold' : 'text-white' }}">Peta Desa</a>
                        <a href="{{ url('/berita') }}" class="nav-item nav-link {{ Request::is('berita') ? 'active text-white fw-bold' : 'text-white' }}">Berita Desa</a>
                        <a href="{{ url('/produk') }}" class="nav-item nav-link {{ Request::is('produk') ? 'active text-white fw-bold' : 'text-white' }}">Produk Desa</a>
                        <a href="#" class="nav-item nav-link text-white">Wisata Desa</a>
                    </div>
                </div>

                <!-- KHUSUS MOBILE -->
                <nav class="mobile-bottom-nav d-none">
                    <div class="mobile-bottom-nav-wrapper">
                        <a href="{{ url('/') }}" class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                            <i class="fas fa-home"></i><span>Home</span>
                        </a>

                        <a href="{{ url('/profil') }}" class="nav-item {{ Request::is('profil') ? 'active' : '' }}">
                            <i class="fas fa-user"></i><span>Profil</span>
                        </a>
                        <a href="{{ url('infografis/penduduk') }}" class="nav-item {{ Request::is('infografis/penduduk') ? 'active' : '' }}"><i class="fas fa-chart-bar"></i><span>Kependudukan</span></a>
                        <!-- <a href="#" class="nav-item"><i class="fas fa-chart-bar"></i><span>PPID</span></a> -->
                        <a href="{{ url('/peta') }}" class="nav-item {{ Request::is('peta') ? 'active' : '' }}"><i class="fas fa-map"></i><span>Peta</span></a>
                        <a href="{{ url('/berita') }}" class="nav-item {{ Request::is('berita') ? 'active' : '' }}"><i class="fas fa-newspaper"></i><span>Berita</span></a>
                        <a href="{{ url('/produk') }}" class="nav-item {{ Request::is('produk') ? 'active' : '' }}"><i class="fas fa-thumbs-up"></i><span>Produk</span></a>
                        <a href="#" class="nav-item"><i class="fas fa-image"></i><span>Wisata</span></a>
                    </div>
                </nav>
            </nav>

        </div>
        <!-- Navbar & Hero End -->