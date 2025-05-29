@extends('layouts.app')
@section('content')
@include('partials.navbar')

<section class="profil-section py-5 bg-light">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold text-dark">Profil Desa Nusantara</h2>
    </div>

    <!-- Card: Sejarah -->
    <div class="profil-card d-flex flex-column flex-md-row align-items-start gap-4 mb-4">
      <div class="profil-icon bg-primary text-white">
        <i class="fas fa-history"></i>
      </div>
      <div>
        <h4 class="fw-semibold text-dark mb-2">Sejarah</h4>
        <p class="" style="font-weight: bold; color: #333333;">
        {!! $tentangDesa->sejarah 
            ? $tentangDesa->sejarah 
            : '<span style="font-weight: bold; font-style: italic; color: rgba(0,0,0,0.5);">Data Belum Tersedia</span>' !!}

        </p>
      </div>
    </div>

    <!-- Card: Visi -->
    <div class="profil-card d-flex flex-column flex-md-row align-items-start gap-4 mb-4">
      <div class="profil-icon bg-success text-white">
        <i class="fas fa-eye"></i>
      </div>
      <div>
        <h4 class="fw-semibold text-dark mb-2">Visi</h4>
        <p class="" style="font-weight: bold; color: #333333;">
        {!! $tentangDesa->visi 
            ? $tentangDesa->visi 
            : '<span style="font-weight: bold; font-style: italic; color: rgba(0,0,0,0.5);">Data Belum Tersedia</span>' !!}
        </p>
      </div>
    </div>

    <!-- Card: Misi -->
    <div class="profil-card d-flex flex-column flex-md-row align-items-start gap-4">
      <div class="profil-icon bg-danger text-white">
        <i class="fas fa-bullseye"></i>
      </div>
      <div>
        <h4 class="fw-semibold text-dark mb-2">Misi</h4>
        <ul class="ps-3 mb-0" style="font-weight: bold; color: #333333;">
            @forelse($misiDesa as $data)
                <li>{{ $data->misi }}</li>
            @empty
                <li><span style="font-weight: bold; font-style: italic; color: rgba(0,0,0,0.5);">Data Belum Tersedia</span></li>
            @endforelse
        </ul>
      </div>
    </div>
  </div>
</section>


@include('partials.footer')
@endsection