<x-frondend-layout title="Tentang kami">

    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="img-border">
                        <img class="img-fluid" src="img/about.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="h-100">
                        <h6 class="section-title bg-white text-start text-primary pe-3">Tentang Kami</h6>
                        <h1 class="display-6 mb-4">#1 Solusi Digital dengan <span class="text-primary">10 Tahun</span>
                            Pengalaman</h1>
                        <p>Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos.
                            Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet
                        </p>
                        <p class="mb-4">Stet no et lorem dolor et diam, amet duo ut dolore vero eos. No stet est diam
                            rebum amet diam ipsum. Clita clita labore, dolor duo nonumy clita sit at, sed sit sanctus
                            dolor eos.</p>
                        <div class="d-flex align-items-center mb-4 pb-2">
                            <img class="flex-shrink-0 rounded-circle" src="{{ asset('storage/' . $admin->image) }}"
                                alt="" style="width: 50px; height: 50px;">
                            <div class="ps-4">
                                <h6>{{ $admin->name }}</h6>
                                <small> {{ strtoupper($admin->role->name) }}</small>
                            </div>
                        </div>
                        {{-- <a class="btn btn-primary rounded-pill py-3 px-5" href="">Read More</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
</x-frondend-layout>