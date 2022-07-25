<x-app-layout title="Tambah Paket">
    @push('css')
        <link rel="stylesheet" href="{{ asset('stisla/node_modules/summernote/dist/summernote-bs4.css') }}">
        <link rel="stylesheet" href="{{ asset('stisla/node_modules/codemirror/lib/codemirror.css') }}">
        <link rel="stylesheet" href="{{ asset('stisla/node_modules/codemirror/theme/duotone-dark.css') }}">
        <link rel="stylesheet" href="{{ asset('stisla/node_modules/selectric/public/selectric.css') }}">
    @endpush
    <section class="section">
        <x-breadcrumb title="Tambah Paket">
            @foreach ($breadcrumbs as $breadcrumb => $url)
                <div class="breadcrumb-item"><a class="text-decoration-none"
                        href="{{ $url }}">{{ $breadcrumb }}</a></div>
            @endforeach
        </x-breadcrumb>

        @if (session('message'))
            <div class="alert alert-primary text-center" role="alert">
                <span>
                    {{ session('message') }}
                </span>
            </div>
        @endif

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('detail.store') }}" method="post">
                            @csrf
                            <div class="form-group row mb-4">
                                <x-label for="paket_id" class="col-form-label text-md-right col-12 col-md-3 col-lg-3"
                                    :value="__('Nama Paket')" />
                                <div class="col-sm-12 col-md-7">
                                    <select name="paket_id" id="paket_id" class="form-control">
                                        <option value="">Pilih</option>
                                        @foreach ($pakets as $nama_paket => $id)
                                            <option value="{{ $id }}">{{ $nama_paket }}</option>
                                        @endforeach
                                    </select>
                                    @error('paket_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <x-label for="wisata_id" class="col-form-label text-md-right col-12 col-md-3 col-lg-3"
                                    :value="__('Nama obyek wisata')" />
                                <div class="col-sm-12 col-md-7">
                                    <select name="wisata_id" id="wisata_id" class="form-control">
                                        <option value="">Pilih</option>
                                        @foreach ($wisatas as $wisata)
                                            <option value="{{ $wisata->id }}">
                                                {{ $wisata->nama_obyek_wisata }} - <span
                                                    style="font-weight: bold">{{ $wisata->wilayah }}</span></option>
                                        @endforeach
                                    </select>
                                    @error('wisata_id')
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
