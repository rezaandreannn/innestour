<x-frondend-layout title="Pembayaran">
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 order-md-2 mb-4">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">{{ $paket->nama_paket }}</span>
                        <span class="badge badge-secondary badge-pill">3</span>
                    </h4>
                    <ul class="list-group mb-3">
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">Program</h6>
                                <small class="text-muted">{{ $paket->nama_program }}</small>
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">Fasilitas</h6>
                                <small class="text-muted">{!! $paket->fasilitas !!}</small>
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">Wisata</h6>
                                <small class="text-muted">{!! $paket->wisata !!}</small>
                            </div>
                        </li>

                        <li class="list-group-item d-flex justify-content-between">
                            <span>Harga/<span class="text-muted">orang</span></span>
                            <strong>@currency($paket->harga)</strong>
                        </li>
                    </ul>

                </div>
                <div class="col-md-8 order-md-1">

                    @if (session('message'))
                        <div class="alert alert-primary text-center" role="alert">
                            <span>
                                {{ session('message') }}
                            </span>
                        </div>
                    @else
                        <div class="alert alert-warning" role="alert">
                            <span>Harga/<span class="text-muted">orang</span></span>
                            <strong>@currency($paket->harga)</strong>
                            <hr>
                            <p>anda bisa melakukan penawaran hanya <strong class="text-danger">5%</strong> dari harga
                                yang
                                kami tentukan. <br>
                                Mohon masukan nominal yang sesuai 👌</p>
                        </div>
                    @endif



                    <form method="post" action="{{ route('negosiasi.store') }}">
                        @csrf
                        <input type="hidden" name="paket_id" value="{{ $paket->id }}">
                        <div class="form-group row mb-4">
                            <x-label for="harga" class="col-form-label text-md-right col-12 col-md-3 col-lg-3"
                                :value="__('Harga')" />
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" id="harga" name="harga"
                                    placeholder="{{ $paket->harga - 2000 }}">
                                @error('harga')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <hr class="mb-4">
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Ajukan Tawar</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

</x-frondend-layout>
