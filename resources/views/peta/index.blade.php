@extends('layouts.app')
@section('content')
@include('partials.navbar')

<section class="profil-section py-5 bg-light">
    <div class="container">

        <div class="text-center mb-5">
            <div class="title" style="font-size: 2.5rem; font-weight: 700; color: #1a7a45;">
                Peta Desa Nusantara
            </div>
        </div>

        <!-- Google Maps Responsive Wrapper -->
        <div style="position:relative; padding-bottom:56.25%; height:0; overflow:hidden;">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1019195.0611962322!2d97.57227273244325!3d3.7598906906253022!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3037346e87b49ee7%3A0x3039d80b220cfc0!2sKabupaten%20Langkat%2C%20Sumatera%20Utara!5e0!3m2!1sid!2sid!4v1748870471007!5m2!1sid!2sid" 
                width="100%" 
                height="100%" 
                style="position:absolute; top:0; left:0; border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>

    </div>
</section>



@include('partials.footer')
@endsection