<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Website Resmi Desa Nusantara</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        
        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="{{ asset('js/animate/animate.min.css') }}?v={{ filemtime(public_path('js/animate/animate.min.css')) }}" rel="stylesheet">
        <link href="{{ asset('js/owlcarousel/assets/owl.carousel.min.css') }}?v={{ filemtime(public_path('js/owlcarousel/assets/owl.carousel.min.css')) }}" rel="stylesheet">
        <link href="{{ asset('css/bootstrap.min.css') }}?v={{ filemtime(public_path('css/bootstrap.min.css')) }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}?v={{ filemtime(public_path('css/style.css')) }}" rel="stylesheet">

    </head>

    <body>
        
        @yield('content')
       
    </body>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('js/wow/wow.min.js') }}?v={{ filemtime(public_path('js/wow/wow.min.js')) }}"></script>
    <script src="{{ asset('js/easing/easing.min.js') }}?v={{ filemtime(public_path('js/easing/easing.min.js')) }}"></script>
    <script src="{{ asset('js/waypoints/waypoints.min.js') }}?v={{ filemtime(public_path('js/waypoints/waypoints.min.js')) }}"></script>
    <script src="{{ asset('js/counterup/counterup.min.js') }}?v={{ filemtime(public_path('js/counterup/counterup.min.js')) }}"></script>
    <script src="{{ asset('js/owlcarousel/owl.carousel.min.js') }}?v={{ filemtime(public_path('js/owlcarousel/owl.carousel.min.js')) }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}?v={{ filemtime(public_path('js/main.js')) }}"></script>


</html>