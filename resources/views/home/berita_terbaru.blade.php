        <!-- Contact Start -->
        <div class="container-fluid contact overflow-hidden pb-5">
            <div class="container py-5">
                <div class="office pt-5">
                    <div class="section-title text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="sub-style">
                            <h5 class="sub-title text-primary px-3">Berita Desa</h5>
                        </div>
                        <h1 class="display-5 mb-4">Berita Terbaru dari Desa Kami</h1>
                        <p class="mb-0">Dapatkan informasi terkini seputar kegiatan, pengumuman, dan perkembangan terbaru di Desa [Nama Desa]. Kami selalu berkomitmen untuk menyampaikan berita secara transparan dan tepat waktu kepada seluruh warga.</p>
                    </div>

                    <div class="row g-4 justify-content-center">
                        @forelse($berita as $data)
                        <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="office-item p-4 h-100 d-flex flex-column justify-content-between">
                                <div>
                                    <div class="office-img mb-4">
                                        <img src="{{ asset('storage/' . $data->thumbnail) }}" class="img-fluid w-100 rounded" style="height: 200px; object-fit: cover;" alt="">
                                    </div>
                                    <div class="office-content d-flex flex-column">
                                        <h4 class="mb-2">{{ $data->judul }}</h4>
                                        @php
                                        $cleanText = strip_tags($data->isi);
                                        @endphp

                                        <p class="mb-3">
                                            @if (Str::length($cleanText) > 50)
                                            {{ Str::limit($cleanText, 50) }}
                                            <a href="#">Read more</a>
                                            @else
                                            {{ $cleanText }}
                                            @endif
                                        </p>
                                    </div>
                                </div>

                                <div style="
                                        display: flex; 
                                        justify-content: space-between; 
                                        align-items: center;
                                        background-color: #1a7a45; 
                                        color: white; 
                                        font-family: 'Poppins', sans-serif; 
                                        font-size: 0.875rem; 
                                        padding: 10px 15px; 
                                        border-radius: 0 0 8px 8px; 
                                        margin-top: auto;">
                                    <span><i class="bi bi-person-fill"></i> Admin</span>
                                    <span><i class="bi bi-clock-fill"></i> {{ \Carbon\Carbon::parse($data->created_at)->translatedFormat('d F Y') }}</span>
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