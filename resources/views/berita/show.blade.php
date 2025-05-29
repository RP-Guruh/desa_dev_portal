@extends('layouts.app')
@section('content')
@include('partials.navbar')

<section class="py-5 bg-light">
  <div class="container">
    <div class="row g-5">

      <!-- Konten Utama -->
      <div class="col-lg-8">
        <div class="bg-white p-4 rounded shadow-sm">
          <h2 class="fw-bold mb-3">{{ $berita->judul }}</h2>
          <div class="mb-3 text-muted small">
            <i class="bi bi-person-fill"></i> Admin &nbsp;|&nbsp;
            <i class="bi bi-clock-fill"></i> {{ \Carbon\Carbon::parse($berita->created_at)->translatedFormat('d F Y') }}
          </div>
          <img src="{{ asset('storage/' . $berita->thumbnail) }}" alt="{{ $berita->judul }}" class="img-fluid rounded mb-4" style="max-height: 400px; object-fit: cover;">
          <div class="berita-isi" style="line-height: 1.8; font-size: 1.1rem;">
            {!! $berita->isi !!}
          </div>
        </div>
      </div>

      <!-- Sidebar: Berita Lainnya -->
      <div class="col-lg-4">
        <div class="bg-white p-4 rounded shadow-sm">
          <h5 class="fw-bold mb-3 text-dark border-bottom pb-2">Berita Lainnya</h5>

          @forelse($beritaLain as $item)
            <div class="d-flex mb-3">
              <img src="{{ asset('storage/' . $item->thumbnail) }}" class="me-3 rounded" style="width: 80px; height: 60px; object-fit: cover;" alt="">
              <div>
                <a href="{{ route('berita.show', $item->id) }}" class="fw-semibold text-dark text-decoration-none">
                  {{ \Illuminate\Support\Str::limit($item->judul, 50) }}
                </a>
                <div class="text-muted small">
                  <i class="bi bi-clock"></i> {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d M Y') }}
                </div>
              </div>
            </div>
          @empty
            <p class="text-muted fst-italic">Tidak ada berita lainnya.</p>
          @endforelse

        </div>
      </div>

    </div>
  </div>
</section>

@include('partials.footer')
@endsection