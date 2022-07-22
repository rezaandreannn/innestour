<x-app-layout title="Tambah Mou">
    @push('css')
        <link rel="stylesheet" href="{{ asset('stisla/node_modules/summernote/dist/summernote-bs4.css') }}">
        <link rel="stylesheet" href="{{ asset('stisla/node_modules/codemirror/lib/codemirror.css') }}">
        <link rel="stylesheet" href="{{ asset('stisla/node_modules/codemirror/theme/duotone-dark.css') }}">
        <link rel="stylesheet" href="{{ asset('stisla/node_modules/selectric/public/selectric.css') }}">
    @endpush
    <section class="section">
        <x-breadcrumb title="Tambah MOU">
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
                        <form action="{{ route('mou.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row mb-4">
                                <x-label for="nama_perusahaan"
                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3" :value="__('Nama Perusahaan')" />
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="nama_perusahaan" class="form-control"
                                        value="{{ old('nama_perusahaan') }}" placeholder="UM Metro">
                                    @error('nama_perusahaan')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <x-label for="email_perusahaan"
                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3" :value="__('Email Perusahaan')" />
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="email_perusahaan" class="form-control"
                                        value="{{ old('email_perusahaan') }}" placeholder="ummetro@example.com">
                                    @error('email_perusahaan')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <x-label for="no_hp_perusahaan"
                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3" :value="__('No hp Perusahaan')" />
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="no_hp_perusahaan" class="form-control"
                                        value="{{ old('no_hp_perusahaan') }}" placeholder="08217694378">
                                    @error('no_hp_perusahaan')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <x-label for="dokumen" :value="__('Dokumen')"
                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3 mt-5" />
                                <div class="col-sm-12 col-md-7">
                                    {{-- cek apakah gambar ada --}}
                                    {{-- @if (Auth::user()->image)
                                        <img src="{{ asset('storage/' . Auth::user()->image) }}"
                                            class="img-preview d-block" style="width: 300px">
                                    @else
                                        <img class="img-preview" style="width: 300px">
                                    @endif --}}
                                    <iframe class="dokumen-preview" frameborder="0" scrolling="no"></iframe>
                                    {{-- <img class="dokumen-preview" style="width: 300px"> --}}

                                    {{-- <input type="hidden" value="{{ Auth::user()->image }}" name="oldImage"> --}}
                                    <input class="mt-1" name="dokumen" id="dokumen" type="file"
                                        onchange="Live()" />

                                    @error('dokumen')
                                        <span class="text-danger d-block">{{ $message }}</span>
                                    @else
                                        <span class="text-small d-block text-muted">Maksimal 1 mb <br>File harus pdf </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <x-label for="logo" :value="__('Logo')"
                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3" />
                                <div class="col-sm-12 col-md-7">
                                    {{-- cek apakah gambar ada --}}
                                    {{-- @if ($mou->logo)
                                        <img src="{{ asset('storage/' . $mou->logo) }}" class="logo-preview d-block"
                                            style="width: 300px">
                                    @else
                                        <img class="logo-preview" style="width: 300px">
                                        @endif --}}

                                    <img class="logo-preview" style="width: 300px">

                                    {{-- <input type="hidden" value="{{ $mou->logo }}" name="oldLogo"> --}}
                                    <input class="mt-1" name="logo" id="logo" type="file"
                                        onchange="LiveLogo()" />

                                    @error('logo')
                                        <span class="text-danger d-block">{{ $message }}</span>
                                    @else
                                        <span class="text-small d-block text-muted">Maksimal 1 mb</span>
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
        {{-- scrip menampilkan image form --}}
        <script>
            function Live() {
                const image = document.querySelector('#dokumen');
                const imgPreview = document.querySelector('.dokumen-preview');

                imgPreview.style.display = 'block';

                const oFReader = new FileReader();
                oFReader.readAsDataURL(image.files[0]);


                oFReader.onload = function(oFREvent) {
                    imgPreview.src = oFREvent.target.result;
                }
            }

            function LiveLogo() {
                const image = document.querySelector('#logo');
                const imgPreview = document.querySelector('.logo-preview');

                imgPreview.style.display = 'block';

                const oFReader = new FileReader();
                oFReader.readAsDataURL(image.files[0]);


                oFReader.onload = function(oFREvent) {
                    imgPreview.src = oFREvent.target.result;
                }
            }
        </script>
        <script src="{{ asset('stisla/node_modules/summernote/dist/summernote-bs4.js') }}"></script>
        <script src="{{ asset('stisla/node_modules/codemirror/lib/codemirror.js') }}"></script>
        <script src="{{ asset('stisla/node_modules/codemirror/mode/javascript/javascript.js') }}"></script>
        <script src="{{ asset('stisla/node_modules/selectric/public/jquery.selectric.min.js') }}"></script>
        <script src="{{ asset('stisla/node_modules/dropzone/dist/min/dropzone.min.js') }}"></script>
    @endpush
</x-app-layout>
