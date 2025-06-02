@extends('layouts.app')
@section('content')
@include('partials.navbar')

<section class="profil-section py-5 bg-light">
  <div class="container">

    <div class="text-center mb-5">
      <div class="title" style="font-size: 2.5rem; font-weight: 700; color: #1a7a45;">
        Berita Desa Nusantara
      </div>
      <p class="text-muted">
      Dapatkan informasi terkini seputar kegiatan, pengumuman, dan perkembangan terbaru di Desa Nusantara.
      </p>
    </div>

    <div class="row g-4">
      @forelse($berita as $data)
      <div class="col-md-6 col-lg-4">
        <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden position-relative">

          {{-- Gambar Thumbnail --}}
          <div class="overflow-hidden">
            <img src="{{ asset('storage/' . $data->thumbnail) }}" class="img-fluid w-100" alt="{{ $data->judul }}"
              style="height: 220px; object-fit: cover; transition: 0.3s ease;">
          </div>

          {{-- Isi Konten --}}
          <div class="p-4 d-flex flex-column">
            <h5 class="fw-bold text-dark mb-2">{{ $data->judul }}</h5>

            @php $cleanText = strip_tags($data->isi); @endphp
            <p class="text-muted flex-grow-1">
              {{ Str::limit($cleanText, 100) }}
              @if (Str::length($cleanText) > 100)
                <a href="{{ url('/berita/'.$data->id) }}" class="text-success text-decoration-none">Selengkapnya</a>
              @endif
            </p>

            {{-- Footer Info --}}
            <div class="d-flex justify-content-between align-items-center mt-3 pt-3 border-top text-muted small">
              <span><i class="bi bi-person-fill me-1"></i>Admin</span>
              <span><i class="bi bi-clock me-1"></i>{{ \Carbon\Carbon::parse($data->created_at)->translatedFormat('d F Y') }}</span>
            </div>
          </div>

        </div>
      </div>
      @empty
      <div class="col-12 text-center">
        <p class="fst-italic text-muted">Belum ada berita tersedia.</p>
      </div>
      @endforelse
      <div class="mt-5 d-flex justify-content-center">
            {{ $berita->links() }}
      </div>

    </div>
  </div>
</section>


@include('partials.footer')
@endsection