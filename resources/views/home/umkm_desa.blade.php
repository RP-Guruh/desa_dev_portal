        <!-- Contact Start -->
        <div class="container-fluid contact bg-light overflow-hidden pb-5">
            <div class="container py-5">
                <div class="office pt-5">
                    <div class="section-title text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="sub-style">
                            <h5 class="sub-title text-primary px-3">Produk Desa</h5>
                        </div>
                        <h1 class="display-5 mb-4">Temukan Produk Unggulan dari Desa Kami</h1>
                        <p class="mb-0">
                            Jelajahi beragam produk berkualitas hasil karya warga Desa Nusantara. Kami berkomitmen untuk menghadirkan produk lokal yang autentik dan mendukung perekonomian masyarakat desa.
                        </p>
                    </div>


                    <div class="row g-4 justify-content-center">
                        @forelse($berita as $data)
                        <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
  <div style="
      display: flex;
      flex-direction: column;
      height: 100%;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 4px 12px rgba(0,0,0,0.08);
      background-color: #fff;
      font-family: 'Poppins', sans-serif;
  ">
    <div style="height: 220px; overflow: hidden;">
      <img src="{{ asset('storage/' . $data->thumbnail) }}" alt="Kerajinan Bambu"
        style="width: 100%; height: 100%; object-fit: cover;">
    </div>

    <div style="padding: 16px; flex: 1; display: flex; flex-direction: column;">
      <h5 style="font-size: 1.1rem; font-weight: 600; margin-bottom: 10px;">Kerajinan Anyaman Bambu</h5>

      <p style="flex: 1; font-size: 0.9rem; color: #555; margin-bottom: 14px;">
        Anyaman bambu kuat dan elegan untuk dekorasi dan kebutuhan sehari-hari.
        <a href="#" style="color: #1a7a45; text-decoration: none;">Read more</a>
      </p>

      <div style="font-weight: bold; font-size: 1.25rem; color: #1a7a45; margin-bottom: 12px;">
        Rp 150.000
      </div>
    </div>

    <div style="
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #1a7a45;
        color: white;
        font-size: 0.85rem;
        padding: 10px 16px;
    ">
      <span><i class="bi bi-person-fill"></i> Admin</span>
      <span><i class="bi bi-clock-fill"></i> 28 Mei 2025</span>
    </div>
  </div>
</div>


                        @empty

                        @endforelse

                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->