<x-app-layout title="Edit Paket">
    @push('css')
        <link rel="stylesheet" href="{{ asset('stisla/node_modules/summernote/dist/summernote-bs4.css') }}">
        <link rel="stylesheet" href="{{ asset('stisla/node_modules/codemirror/lib/codemirror.css') }}">
        <link rel="stylesheet" href="{{ asset('stisla/node_modules/codemirror/theme/duotone-dark.css') }}">
        <link rel="stylesheet" href="{{ asset('stisla/node_modules/selectric/public/selectric.css') }}">
    @endpush
    <section class="section">


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row mb-4">
                            <x-label for="nama_paket" class="col-form-label text-md-right col-12 col-md-3 col-lg-3"
                                :value="__('Nama User')" />
                            <div class="col-sm-12 col-md-7 mt-1">
                                <span>{{ $invoice->user->name }}</span>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <x-label for="nama_paket" class="col-form-label text-md-right col-12 col-md-3 col-lg-3"
                                :value="__('Paket')" />
                            <div class="col-sm-12 col-md-7 mt-1">
                                <span>{{ $invoice->user->name }}</span>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <x-label for="nama_paket" class="col-form-label text-md-right col-12 col-md-3 col-lg-3"
                                :value="__('Jumlah Kursi')" />
                            <div class="col-sm-12 col-md-7 mt-1">
                                <span>{{ $invoice->kursi }}</span>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <x-label for="nama_paket" class="col-form-label text-md-right col-12 col-md-3 col-lg-3"
                                :value="__('Total tagihan')" />
                            <div class="col-sm-12 col-md-7 mt-1">
                                <span>@currency($invoice->total_tagihan)</span>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <x-label for="nama_paket" class="col-form-label text-md-right col-12 col-md-3 col-lg-3"
                                :value="__('Status')" />
                            <div class="col-sm-12 col-md-7 mt-1">
                                <span>{{ $invoice->status }}</span>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <x-label for="nama_paket" class="col-form-label text-md-right col-12 col-md-3 col-lg-3"
                                :value="__('Bukti pembayaran')" />
                            <div class="col-sm-12 col-md-7 mt-1">
                                <img class="img-fluid" src="{{ asset('storage/' . $invoice->bukti) }}" alt=""
                                    width="500px">
                            </div>
                        </div>
                        <form action="{{ route('invoice.update', $invoice->id) }}" method="post">
                            @method('PATCH')
                            @csrf
                            <div class="form-group row mb-4">
                                <x-label for="status" class="col-form-label text-md-right col-12 col-md-3 col-lg-3"
                                    :value="__('Ubah status')" />
                                <div class="col-sm-12 col-md-7">
                                    <select name="status" id="status" class="form-control">
                                        <option value="pending">Pending</option>
                                        <option value="lunas">Lunas</option>
                                    </select>
                                    @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    <button class="btn btn-secondary" type="reset">Batal</button>
                                    <button class="btn btn-primary" type="submit">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @push('js-library')
        <script src="{{ asset('stisla/node_modules/summernote/dist/summernote-bs4.js') }}"></script>
        <script src="{{ asset('stisla/node_modules/codemirror/lib/codemirror.js') }}"></script>
        <script src="{{ asset('stisla/node_modules/codemirror/mode/javascript/javascript.js') }}"></script>
        <script src="{{ asset('stisla/node_modules/selectric/public/jquery.selectric.min.js') }}"></script>
        <script src="{{ asset('stisla/node_modules/dropzone/dist/min/dropzone.min.js') }}"></script>
    @endpush
</x-app-layout>
