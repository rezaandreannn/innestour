<x-app-layout title="Detail">
    <section class="section">
        <x-breadcrumb title="Detail Paket : {{ $paket->nama_paket }}">
            @foreach ($breadcrumbs as $breadcrumb => $url)
                <div class="breadcrumb-item"><a class="text-decoration-none"
                        href="{{ $url }}">{{ $breadcrumb }}</a></div>
            @endforeach
        </x-breadcrumb>

        <div class="section-body">
            <div class="row">
                @foreach ($details as $detail)
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h4>Nama Wisata : {{ $detail->wisata->nama_obyek_wisata }}</h4>
                            </div>
                            <div class="card-body">
                                <div class="mb-2 text-muted">Wilayah : {{ $detail->wisata->wilayah }} </div>
                                <div class="chocolat-parent">
                                    <a href="{{ asset('storage/' . $detail->wisata->image) }}" class="chocolat-image"
                                        title="Just an example">
                                        <div data-crop-image="">
                                            <img alt="image" src="{{ asset('storage/' . $detail->wisata->image) }}"
                                                class="img-fluid">
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</x-app-layout>
