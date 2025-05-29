@extends('layouts.app')
@section('content')
@include('partials.navbar')


<section class="py-5 bg-light">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold text-dark">Produk Desa Nusantara</h2>
      <p class="text-muted">Belanja produk lokal terbaik yang dibuat dengan kualitas dan cinta oleh masyarakat desa.</p>
    </div>

    <div class="row g-4">
      @forelse($produk as $item)
      <div class="col-12 col-sm-6 col-md-4 col-lg-3">
        <div class="card border-0 shadow-sm rounded-4 h-100 d-flex flex-column">
          
          {{-- Gambar --}}
          <div class="position-relative overflow-hidden rounded-top-4">
            <img src="{{ asset('storage/' . $item->thumbnail) }}" class="img-fluid w-100" alt="{{ $item->nama }}"
              style="height: 200px; object-fit: cover; transition: transform 0.3s ease;">
          </div>

          {{-- Konten --}}
          <div class="card-body d-flex flex-column">
            <h6 class="fw-semibold text-dark mb-1">{{ $item->nama }}</h6>
            <p class="text-success fw-bold mb-1">Rp {{ number_format($item->harga, 0, ',', '.') }}</p>

            {{-- Penjual --}}
            <p class="text-muted small mb-2">
              <i class="bi bi-person-circle me-1"></i>
              {{ $item->penjual ?? 'Penjual Tidak Diketahui' }}
            </p>

            {{-- Deskripsi --}}
            <p class="text-muted small flex-grow-1">
              {{ Str::limit(strip_tags($item->deskripsi), 60) }}
            </p>

            {{-- Tombol --}}
            <a href="{{ url('/produk/' . $item->id) }}" class="btn btn-sm btn-outline-success mt-2 w-100 rounded-pill">
              Lihat Detail
            </a>
          </div>
        </div>
      </div>
      @empty
      <div class="col-12 text-center">
        <p class="fst-italic text-muted">Belum ada produk tersedia.</p>
      </div>
      @endforelse
    </div>

    {{-- Pagination --}}
    <div class="mt-5 d-flex justify-content-center">
      {{ $produk->links() }}
    </div>
  </div>
</section>



@include('partials.footer')
@endsection