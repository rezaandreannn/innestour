<x-app-layout title="Tambah Wisata">
    @push('css')
        <link rel="stylesheet" href="{{ asset('stisla/node_modules/summernote/dist/summernote-bs4.css') }}">
        <link rel="stylesheet" href="{{ asset('stisla/node_modules/codemirror/lib/codemirror.css') }}">
        <link rel="stylesheet" href="{{ asset('stisla/node_modules/codemirror/theme/duotone-dark.css') }}">
        <link rel="stylesheet" href="{{ asset('stisla/node_modules/selectric/public/selectric.css') }}">
    @endpush
    <section class="section">
        <x-breadcrumb title="Tambah Wisata">
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
                        <form action="{{ route('wisata.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row mb-4">
                                <x-label for="nama_obyek_wisata"
                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3" :value="__('Nama Obyek wisata')" />
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="nama_obyek_wisata" class="form-control"
                                        value="{{ old('nama_obyek_wisata') }}" placeholder="Monas">
                                    @error('nama_obyek_wisata')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <x-label for="wilayah" class="col-form-label text-md-right col-12 col-md-3 col-lg-3"
                                    :value="__('Wilayah')" />
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="wilayah" class="form-control"
                                        value="{{ old('wilayah') }}" placeholder="Jakarta">
                                    @error('wilayah')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <x-label for="durasi" class="col-form-label text-md-right col-12 col-md-3 col-lg-3"
                                    :value="__('Durasi')" />
                                <div class="col-sm-12 col-md-7">
                                    <input type="time" name="durasi" class="form-control"
                                        value="{{ old('durasi') }}" placeholder="Jakarta">
                                    @error('durasi')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <x-label for="image" :value="__('Gambar')"
                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3" />
                                <div class="col-sm-12 col-md-7">
                                    <img class="image-preview" style="width: 300px">

                                    <input class="mt-1" name="image" id="image" type="file"
                                        onchange="Preview()" />

                                    @error('image')
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
            function Preview() {
                const image = document.querySelector('#image');
                const imgPreview = document.querySelector('.image-preview');

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