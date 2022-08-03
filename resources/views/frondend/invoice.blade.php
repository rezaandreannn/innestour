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
                            <strong>@currency($paket_r->harga ?? $paket->harga)</strong>
                        </li>
                    </ul>

                </div>
                <div class="col-md-8 order-md-1">
                    <h4 class="mb-3">{{ Auth::user()->name }}</h4>
                    <form method="post" action="{{ route('invoice.store') }}">
                        @csrf
                        <input type="hidden" name="paket_id" value="{{ $paket->id }}">

                        <input type="hidden" name="harga" value="{{ $paket_r->harga ?? $paket->harga }}">
                        <div class="form-group row mb-4">
                            <x-label for="kursi" class="col-form-label text-md-right col-12 col-md-3 col-lg-3"
                                :value="__('Pilih tempat duduk')" />
                            <div class="col-sm-12 col-md-7">
                                <select class="form-control" id="kursi" name="kursi">
                                    <option value="" selected>Pilihan </option>
                                    <option value="40">40</option>
                                    <option value="44">44</option>
                                    <option value="48">48</option>
                                    <option value="50">48</option>
                                </select>
                                @error('kursi')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <x-label for="tgl_berangkat" class="col-form-label text-md-right col-12 col-md-3 col-lg-3"
                                :value="__('Tgl Keberangkatan')" />
                            <div class="col-sm-8 col-md-5">
                                <input type="date" name="tanggal" class="form-control">
                                @error('tanggal')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-4 col-md-2">
                                <input type="time" name="waktu" class="form-control">
                                @error('waktu')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <hr class="mb-4">
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Pesan</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

</x-frondend-layout>
