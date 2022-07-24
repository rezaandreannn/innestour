<x-app-layout title="Detail">
    <section class="section">
        <x-breadcrumb title="Detail Wisata : {{ $wisata->obyek_wisata }}">
            @foreach ($breadcrumbs as $breadcrumb => $url)
                <div class="breadcrumb-item"><a class="text-decoration-none"
                        href="{{ $url }}">{{ $breadcrumb }}</a></div>
            @endforeach
        </x-breadcrumb>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-sm-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Gambar</h4>
                            {{-- <div class="card-header-action">
                                <a href="#" class="btn btn-primary">View All</a>
                            </div> --}}
                        </div>
                        <div class="card-body">
                            <div class="mb-2 text-muted">Klik untuk lihat lebih besar gambar</div>
                            <div class="chocolat-parent">
                                <a href="{{ asset('storage/' . $wisata->image) }}" class="chocolat-image"
                                    title="Just an example">
                                    <div data-crop-image="">
                                        <img alt="image" src="{{ asset('storage/' . $wisata->image) }}"
                                            class="img-fluid">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-6">
                    <div class="card" id="mycard-dimiss">
                        <div class="card-header">
                            <h4>Dismiss</h4>
                            <div class="card-header-action">
                                <a data-dismiss="#mycard-dimiss" class="btn btn-icon btn-danger" href="#"><i
                                        class="fas fa-times"></i></a>
                            </div>
                        </div>
                        <div class="card-body">
                            You can dimiss this card.
                        </div>
                        <div class="card-footer">
                            Card Footer
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>
</x-app-layout>
