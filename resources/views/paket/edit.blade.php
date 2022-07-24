<x-app-layout title="Edit Paket">
    @push('css')
        <link rel="stylesheet" href="{{ asset('stisla/node_modules/summernote/dist/summernote-bs4.css') }}">
        <link rel="stylesheet" href="{{ asset('stisla/node_modules/codemirror/lib/codemirror.css') }}">
        <link rel="stylesheet" href="{{ asset('stisla/node_modules/codemirror/theme/duotone-dark.css') }}">
        <link rel="stylesheet" href="{{ asset('stisla/node_modules/selectric/public/selectric.css') }}">
    @endpush
    <section class="section">
        <x-breadcrumb title="Edit Paket">
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
                        <form action="{{ route('paket.update', $paket->id) }}" method="post">
                            @method('PATCH')
                            @csrf
                            <div class="form-group row mb-4">
                                <x-label for="nama_paket" class="col-form-label text-md-right col-12 col-md-3 col-lg-3"
                                    :value="__('Nama Paket')" />
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="nama_paket" class="form-control"
                                        value="{{ $paket->nama_paket }}">
                                    @error('nama_paket')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <x-label for="nama_program"
                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3" :value="__('Nama program')" />
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="nama_program" class="form-control"
                                        value="{{ $paket->nama_program }}" placeholder="Candi Borobudor">
                                    @error('nama_program')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <x-label for="fasilitas" class="col-form-label text-md-right col-12 col-md-3 col-lg-3"
                                    :value="__('Fasilitas')" />
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="fasilitas" class="form-control"
                                        value="{{ $paket->fasilitas }}" placeholder="Snack">
                                    @error('fasilitas')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <x-label for="tempat_duduk"
                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3" :value="__('Tempat Duduk')" />
                                <div class="col-sm-12 col-md-7">
                                    <input type="number" name="tempat_duduk" class="form-control"
                                        value="{{ $paket->tempat_duduk }}" placeholder="50" min="1"
                                        minlength="3">
                                    @error('tempat_duduk')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <x-label for="harga" class="col-form-label text-md-right col-12 col-md-3 col-lg-3"
                                    :value="__('Harga/Orang')" />
                                <div class="col-sm-12 col-md-7">
                                    <input type="number" name="harga" class="form-control"
                                        value="{{ $paket->harga }}" placeholder="50000" min="1">
                                    @error('harga')
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
