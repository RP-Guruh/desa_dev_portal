@extends('layouts.app')
@section('content')
@include('partials.navbar')


<section class="py-5 bg-light">
  <div class="container">
    <div class="text-center mb-5">
      <div class="title" style="font-size: 2.5rem; font-weight: 700; color: #1a7a45;">
        Produk Desa Nusantara
      </div>
      <p class="text-muted">
        Belanja produk lokal terbaik yang dibuat dengan kualitas dan cinta oleh masyarakat desa.
      </p>
    </div>

    <div class="row g-4">
      @forelse($produk as $item)
      <div class="col-12 col-sm-6 col-md-4 col-lg-3">
        <div class="produk-card">
          <div class="produk-img-wrapper">
            <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="{{ $item->nama }}" />
            <div class="produk-overlay">
              <a href="{{ url('/produk/' . $item->id) }}">Lihat Detail</a>
            </div>
          </div>
          <div class="produk-content">
            <h6 class="produk-title">{{ $item->nama }}</h6>
            <p class="produk-price">Rp {{ number_format($item->harga, 0, ',', '.') }}</p>
            <p class="produk-seller"><i class="bi bi-person-circle"></i> {{ $item->penjual ?? 'Penjual Tidak Diketahui' }}</p>
            <p class="produk-description">{{ Str::limit(strip_tags($item->deskripsi), 60) }}</p>
          </div>
        </div>
      </div>
      @empty
      <div class="col-12 text-center">
        <p class="fst-italic text-muted">Belum ada produk tersedia.</p>
      </div>
      @endforelse
    </div>

    <div class="mt-5 d-flex justify-content-center">
      {{ $produk->links() }}
    </div>
  </div>
</section>


@include('partials.footer')
@endsection