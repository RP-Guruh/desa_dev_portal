@extends('layouts.app')
@section('content')
@include('partials.navbar')

<section class="py-5 bg-white">
  <div class="container">
    <div class="row g-5 align-items-start">

      {{-- Galeri Gambar Produk --}}
      <div class="col-md-6">
        <div class="mb-3">
          @if ($produk->photos->count())
          <div id="produkCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
  <div class="carousel-inner rounded-4 shadow-sm">
    @foreach ($produk->photos as $index => $photo)
      <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
        <img src="{{ asset('storage/' . $photo->photo) }}" class="d-block w-100"
          style="object-fit: cover; height: 450px;" alt="Foto Produk {{ $index + 1 }}">
      </div>
    @endforeach
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#produkCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#produkCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>
          @else
            <img src="{{ asset('images/default-product.jpg') }}" class="img-fluid rounded-4 shadow-sm"
              style="object-fit: cover; height: 450px;" alt="Default Product">
          @endif
        </div>
      </div>

      {{-- Detail Produk --}}
      <div class="col-md-6">
        <h2 class="fw-bold text-dark">{{ $produk->nama }}</h2>
        <p class="text-success h4 fw-semibold mt-2 mb-3">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>

        <p class="text-muted mb-4">
          <i class="bi bi-person-circle me-1"></i> 
          <strong>Penjual:</strong> {{ $produk->penjual ?? 'Tidak diketahui' }}
        </p>

        <div class="mb-4">
          <h5 class="fw-semibold mb-2">Deskripsi Produk</h5>
          <p class="text-muted">{!! nl2br(e($produk->deskripsi)) !!}</p>
        </div>

        <div class="d-flex gap-3">
        <a href="https://wa.me/{{ $produk->nowa_hp }}?text={{ urlencode('Halo, saya tertarik dengan produk *' . $produk->nama . '* yang Anda jual di website desa.') }}"
            target="_blank"
            class="btn btn-success btn-lg mt-3 w-100">
            <i class="bi bi-whatsapp me-2"></i> Pesan via WhatsApp
            </a>
        </div>
      </div>
    </div>

    {{-- Produk Lainnya --}}
    @if($produkLainnya->count())
    <hr class="my-5">
    <div class="mt-4">
      <h4 class="fw-bold mb-4 text-dark">Produk Lainnya</h4>
      <div class="row g-4">
        @foreach($produkLainnya as $item)
        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="card h-100 border-0 shadow-sm rounded-4">
            <img src="{{ asset('storage/' . $item->thumbnail ?? 'images/default-product.jpg') }}"
              class="img-fluid rounded-top-4" alt="{{ $item->nama }}"
              style="height: 180px; object-fit: cover;">
            <div class="card-body d-flex flex-column">
              <h6 class="fw-semibold text-dark">{{ $item->nama }}</h6>
              <p class="text-success fw-bold mb-1">Rp {{ number_format($item->harga, 0, ',', '.') }}</p>
              <a href="{{ url('/produk/' . $item->id) }}" class="text-decoration-none mt-auto text-success small">Lihat Detail</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
    @endif

  </div>
</section>


@include('partials.footer')
@endsection