<x-frondend-layout title="Tentang kami">

    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="img-border">
                        <img class="img-fluid" src="{{ asset('frondend/img/about-1.jpg') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="h-100">
                        <h6 class="section-title bg-white text-start text-primary pe-3">Tentang Kami</h6>
                        <h1 class="display-6 mb-4">#1 Solusi Digital untuk <span class="text-primary">Tour</span>
                            yang anda inginkan</h1>
                        <p>PT.Innes Arsen Wisata yang beralamat Jln. Tawes No 38. Iringmulyo, Metro Timur, Kota Metro.
                            Dengan ini kami menawarkan alternative paket wisata yang telah kami kemas secara menarik
                            dalam bentuk paket perjalanan.
                        </p>
                        <p class="mb-4">dalam hal ini kami membantu dalam pengelolaan transaportasi, penginapan,
                            pengurusan administrasi serta segala hal yang menunjang suksesnya acara tersebut.</p>
                        <div class="d-flex align-items-center mb-4 pb-2">
                            <img class="flex-shrink-0 rounded-circle" src="{{ asset('storage/' . $admin->image) }}"
                                alt="" style="width: 50px; height: 50px;">
                            <div class="ps-4">
                                <h6>{{ $admin->name }}</h6>
                                <small> {{ strtoupper($admin->role->name) }} - {{ config('app.name') }}</small>
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
