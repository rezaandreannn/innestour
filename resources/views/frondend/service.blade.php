<x-frondend-layout title="Layanan kami">
    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h6 class="section-title bg-white text-center text-primary px-3">Layanan</h6>
                <h1 class="display-6 mb-4">Pilih Paket Terbaik Anda</h1>
            </div>
            <div class="row g-4">
                @foreach ($pakets as $paket)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="card mb-4 rounded-3 shadow-sm">
                            <div class="card-header py-3">
                                <h4 class="my-0 fw-normal">{{ $paket->nama_paket }}</h4>
                                <small class="text-center">program {{ $paket->nama_program }}</small>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title pricing-card-title"> @currency($paket->harga) <small
                                        class="text-muted fw-light">/orang</small>
                                </h5>
                                <ul class="list-unstyled mt-3 mb-4">
                                    <h5>Fasilitas</h5>
                                    <li>{!! $paket->fasilitas !!}</li>
                                </ul>
                                <ul class="list-unstyled mt-3 mb-4">
                                    <h5>Wisata</h5>
                                    <li>{!! $paket->wisata !!}</li>
                                </ul>
                                @if ($mous_user_id)
                                    <a href="{{ route('negosiasi.create', $paket->id) }}"
                                        class="btn btn-lg btn-success">Tawar</a>
                                @endif
                                <a href="{{ route('invoice.detail', $paket->id) }}" class="btn btn-lg btn-primary"
                                    style="background-color: #6777ef">Pesan
                                    Sekarang</a>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Service End -->
</x-frondend-layout>
