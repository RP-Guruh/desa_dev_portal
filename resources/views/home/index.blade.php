@extends('layouts.app')
@section('content')
@include('partials.header')

<!-- Kata Pengantar -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-xl-5 wow fadeInLeft" data-wow-delay="0.1s">
                <div class="rounded">
                    <img src="{{ asset('img/pak_kades_hd.jpg') }}" class="img-fluid w-100 border-bottom" style="border-top-right-radius: 300px; border-top-left-radius: 300px;" alt="Image">

                </div>
            </div>
            <div class="col-xl-7 wow fadeInRight" data-wow-delay="0.3s">
                <h5 class="sub-title pe-3">Sambutan Kepala Desa</h5>
                <h1 class="display-5 mb-4">Terus Melaju Untuk Indonesia Maju</h1>
                <p class="mb-4">
                    {!! $tentangDesa->kata_sambutan ?? '' !!}
                </p>
            </div>
        </div>
    </div>
</div>
<!-- Kata Pengantar End -->

<!-- Stats jumlah penduduk -->
@include('home.stats_home')
<!-- Status jumlah penduduk End -->

<!-- Struktur Organisasi Desa -->

<div class="container-fluid training overflow-hidden bg-light py-5">
    <div class="container py-5">
        <div class="section-title text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="sub-style">
                <h3 class="sub-title text-primary px-3">Struktur Organisasi dan Tata Kerja Desa Nusantara</h3>
            </div>

            <p class="mb-0">
                Melayani dengan Ketulusan, Berkarya dengan Tanggung Jawab demi Kemajuan Desa
            </p>
        </div>

        <div class="row g-4">
            @forelse($sotk as $data)
            <div class="col-lg-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                <div class="training-item">
                    <div class="training-inner">
                        <img src="{{ asset('storage/' . $data->photo) }}" class="img-fluid w-100 rounded" alt="Image">

                        <div class="training-title-name">
                            <a href="#" class="h4 text-white mb-0">{{ $data->sotkPosition->name }}</a>
                        </div>
                    </div>
                    <div class="training-content rounded-bottom p-4" style="background-color: #1a7a45;">
                        <a href="#">
                            <h4 class="text-white">{{ $data->fullname }}</h4>
                        </a>
                    </div>
                </div>
            </div>

            @empty

            @endforelse
            @if($sotk->count() > 5)
            <div class="col-12 text-center">
                <a style="background-color: #1a7a45; color:white;" class="btn rounded-pill py-3 px-5 wow fadeInUp" data-wow-delay="0.1s" href="#">Lihat lainnya</a>
            </div>
            @endif

        </div>
    </div>
</div>
<!-- Struktur Organisasi Desa -->

@include('home.berita_terbaru')
@include('home.umkm_desa')
@include('home.galeri_desa')
@include('partials.footer')

@endsection