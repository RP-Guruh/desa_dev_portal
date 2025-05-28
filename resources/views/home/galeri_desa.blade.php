<!-- Galeri Desa Start -->
<div class="container-fluid overflow-hidden py-5">
    <div class="container">
        <div class="section-title text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="sub-style">
                <h5 class="sub-title text-primary px-3">Galeri Desa</h5>
            </div>
            <h1 class="display-5 mb-4">Potret Kegiatan & Keindahan Desa Kami</h1>
            <p class="mb-0">
                Lihat berbagai momen dan pesona Desa Nusantara dalam bidikan terbaik. Setiap foto menyimpan cerita dan semangat warga.
            </p>
        </div>

        <div class="row g-3">
            @foreach($berita as $item)
            <div class="col-6 col-md-4 col-lg-3 wow fadeInUp" data-wow-delay="0.1s">
                <div style="
                    width: 100%;
                    aspect-ratio: 1 / 1;
                    overflow: hidden;
                    border-radius: 10px;
                    box-shadow: 0 4px 10px rgba(0,0,0,0.05);
                ">
                    <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="Galeri Desa" style="
                        width: 100%;
                        height: 100%;
                        object-fit: cover;
                        display: block;
                    ">
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Galeri Desa End -->
