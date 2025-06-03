<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Website Resmi Desa Nusantara - Informasi Resmi dan Terpercaya</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- SEO Meta Tags -->
    <meta name="keywords" content="Desa Nusantara, Pemerintahan Desa, Informasi Desa, Profil Desa, Berita Desa, Pelayanan Publik">
    <meta name="description" content="Website resmi Desa Nusantara yang menyajikan informasi terkini seputar pemerintahan desa, profil desa, layanan masyarakat, berita desa, dan statistik penduduk.">
    <meta name="author" content="Desa Nusantara">
    <link rel="canonical" href="https://www.desa.susut.ink/"> <!-- Ganti dengan URL kamu -->

    <!-- Open Graph / Facebook -->
    <meta property="og:title" content="Website Resmi Desa Nusantara - Informasi Resmi dan Terpercaya">
    <meta property="og:description" content="Dapatkan informasi resmi dan terpercaya seputar Desa Nusantara, termasuk berita, layanan publik, dan data statistik penduduk.">
    <meta property="og:image" content="{{ asset('img/og-image.png') }}"> <!-- Tambahkan gambar jika ada -->
    <meta property="og:url" content="https://www.desa.susut.ink/">
    <meta property="og:type" content="website">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Website Resmi Desa Nusantara - Informasi Resmi dan Terpercaya">
    <meta name="twitter:description" content="Informasi terkini dari Desa Nusantara mengenai layanan publik, profil desa, berita desa, dan data statistik.">
    <meta name="twitter:image" content="{{ asset('img/og-image.png') }}"> <!-- Sesuaikan -->

    <link rel="icon" type="image/x-icon" href="{{ asset('img/logo_langkat.ico') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Fonts -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheets -->
    <link href="{{ asset('js/animate/animate.min.css') }}?v={{ filemtime(public_path('js/animate/animate.min.css')) }}" rel="stylesheet">
    <link href="{{ asset('js/owlcarousel/assets/owl.carousel.min.css') }}?v={{ filemtime(public_path('js/owlcarousel/assets/owl.carousel.min.css')) }}" rel="stylesheet">

    <!-- Main Stylesheets -->
    <link href="{{ asset('css/bootstrap.min.css') }}?v={{ filemtime(public_path('css/bootstrap.min.css')) }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}?v={{ filemtime(public_path('css/style.css')) }}" rel="stylesheet">
    <link href="{{ asset('css/style_infografis.css') }}?v={{ filemtime(public_path('css/style_infografis.css')) }}" rel="stylesheet">
</head>


    <body>
        
        @yield('content')
       
    </body>


    <!-- jQuery dulu -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <!-- CanvasJS setelah jQuery -->
    <script src="https://cdn.canvasjs.com/jquery.canvasjs.min.js"></script>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin lainnya -->
    <script src="{{ asset('js/wow/wow.min.js') }}?v={{ filemtime(public_path('js/wow/wow.min.js')) }}"></script>
    <script src="{{ asset('js/easing/easing.min.js') }}?v={{ filemtime(public_path('js/easing/easing.min.js')) }}"></script>
    <script src="{{ asset('js/waypoints/waypoints.min.js') }}?v={{ filemtime(public_path('js/waypoints/waypoints.min.js')) }}"></script>
    <script src="{{ asset('js/counterup/counterup.min.js') }}?v={{ filemtime(public_path('js/counterup/counterup.min.js')) }}"></script>
    <script src="{{ asset('js/owlcarousel/owl.carousel.min.js') }}?v={{ filemtime(public_path('js/owlcarousel/owl.carousel.min.js')) }}"></script>

    <!-- Script utama -->
    <script src="{{ asset('js/main.js') }}?v={{ filemtime(public_path('js/main.js')) }}"></script>
    <script src="{{ asset('js/infografis.js') }}?v={{ filemtime(public_path('js/infografis.js')) }}"></script>


    <script>
        $(document).ready(function () {
            $('#tahunSelect').on('change', function () {
            const tahun = $(this).val();
            $('.chart-placeholder').each(function () {
                const label = $(this).parent().find('h2').text();
                const grafikLabel = label.replace('Jumlah ', '').replace('Distribusi ', '');
                $(this).text(`Grafik ${grafikLabel} (${tahun})`);
            });
            });
        });
    </script>

</html>