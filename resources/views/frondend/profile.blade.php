<x-frondend-layout title="Tentang kami">

    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                {{-- <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="img-border">
                        <img class="img-fluid" src="{{ asset('frondend/img/about-1.jpg') }}" alt="">
                    </div>
                </div> --}}
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="h-100">
                        <div class="card" style="width: 18rem;">

                            <div class="card-body">
                                <h5 class="card-text">Nama : {{ Auth::user()->name }}</h5>
                                <h5 class="card-text">Email : {{ Auth::user()->email }}</h5>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    Kerjasama MOU
                                    @if ($mous_user_id)
                                        <button class="btn btn-primary btn-sm">
                                            <i class="fas fa-check-circle"></i>
                                        </button>
                                    @else
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fas fa-times-circle"></i>
                                        </button>
                                        <a href="{{ route('mou.create') }}"
                                            class="btn btn-success mt-3 btn-sm d-block">Gabung</a>
                                    @endif
                                </li>
                            </ul>
                            <div class="card-body">
                                <div class="d-flex justify-content-end">
                                    <a href="/" class="card-link">Kembali</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
</x-frondend-layout>
