<x-frondend-layout title="Pembayaran">
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 order-md-2 mb-4">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">{{ $invoice->paket->nama_paket }}</span>
                        <span class="badge badge-secondary badge-pill">3</span>
                    </h4>
                    <ul class="list-group mb-3">
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">Program</h6>
                                <small class="text-muted">{{ $invoice->paket->nama_program }}</small>
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">Fasilitas</h6>
                                <small class="text-muted">{!! $invoice->paket->fasilitas !!}</small>
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">Wisata</h6>
                                <small class="text-muted">{!! $invoice->paket->wisata !!}</small>
                            </div>
                        </li>

                        {{-- <li class="list-group-item d-flex justify-content-between">
                            <span>Harga/<span class="text-muted">orang</span></span>
                            <strong>@currency($paket_r->harga ?? $paket->harga)</strong>
                        </li> --}}
                    </ul>

                </div>
                <div class="col-md-8 order-md-1">
                    <h5 class="mb-3">Total Tagihan : @currency($invoice->total_tagihan)</h5>
                    <form method="post" action="{{ route('invoice.update', $invoice->id) }}" class="mt-3"
                        enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        {{-- <input type="hidden" name="harga" value="{{ $paket_r->harga ?? $paket->harga }}"> --}}
                        <div class="form-group row mb-4">
                            <x-label for="bank" class="col-form-label text-md-right col-12 col-md-3 col-lg-3"
                                :value="__('Pilih Bank')" />
                            <div class="col-sm-12 col-md-7">
                                <select class="form-control" id="bank" name="bank">
                                    <option value="" selected>Pilihan </option>
                                    @foreach (App\Models\Invoice::BANK as $bank)
                                        <option value="{{ $bank }}">{{ $bank }}</option>
                                    @endforeach
                                </select>
                                @error('bank')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <x-label for="image" :value="__('Bukti Bayar')"
                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3" />
                            <div class="col-sm-12 col-md-7">
                                <img class="image-preview" style="width: 300px">

                                <input class="mt-1" name="bukti" id="image" type="file"
                                    onchange="Preview()" />
                                @error('image')
                                    <span class="text-danger d-block">{{ $message }}</span>
                                @else
                                    <span class="text-small d-block text-muted">file jpg|jpeg</span>
                                @enderror
                            </div>
                        </div>
                        <hr class="mb-4">
                        <button class="btn btn-primary btn-lg btn-block border-0" type="submit"
                            style="background-color: #6777ef">Bayar</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

</x-frondend-layout>
