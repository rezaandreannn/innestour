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
                        <div class="form-group row mb-4">
                            <x-label for="nama_perusahaan" class="col-form-label text-md-right col-12 col-md-3 col-lg-3"
                                :value="__('Nama Perusahaan')" />
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" value="{{ $mou->user->name }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <x-label for="nama_perusahaan" class="col-form-label text-md-right col-12 col-md-3 col-lg-3"
                                :value="__('Nama Perusahaan')" />
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" value="{{ $mou->nama_perusahaan }}"
                                    disabled>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <x-label for="email_perusahaan"
                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3" :value="__('Email Perusahaan')" />
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" value="{{ $mou->email_perusahaan }}"
                                    disabled>

                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <x-label for="no_hp_perusahaan"
                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3" :value="__('No hp Perusahaan')" />
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" value="{{ $mou->no_hp_perusahaan }}"
                                    disabled>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <x-label for="dokumen" :value="__('Dokumen')"
                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3 mt-5" />
                            <div class="col-sm-12 col-md-7">
                                <iframe src="{{ asset('storage/' . $mou->dokumen) }}" class="dokumen-preview d-block"
                                    frameborder="0" scrolling="no"></iframe>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <x-label for="balasan" class="col-form-label text-md-right col-12 col-md-3 col-lg-3 mt-3"
                                :value="__('Balasan')" />
                            <div class="col-sm-12 col-md-7">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{ route('mou.approve') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @method('PATCH')
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $mou->id }}">
                                            <input type="hidden" name="nama_perusahaan"
                                                value="{{ $mou->nama_perusahaan }}">
                                            <div class="mb-2">
                                                <label for="deskripsi" class="form-label">deskripsi</label>
                                                <textarea name="deskripsi" id="deskripsi" class="summernote-simple"></textarea>
                                            </div>
                                            <div class="mb-2 form-group">
                                                <label for="dokumen" class="form-label">Dokumen Acc</label>
                                                <input type="file" class="form-control" name="dokumen"
                                                    id="dokumen">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
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
        </script>
        <script src="{{ asset('stisla/node_modules/summernote/dist/summernote-bs4.js') }}"></script>
        <script src="{{ asset('stisla/node_modules/codemirror/lib/codemirror.js') }}"></script>
        <script src="{{ asset('stisla/node_modules/codemirror/mode/javascript/javascript.js') }}"></script>
        <script src="{{ asset('stisla/node_modules/selectric/public/jquery.selectric.min.js') }}"></script>
        <script src="{{ asset('stisla/node_modules/dropzone/dist/min/dropzone.min.js') }}"></script>
    @endpush
</x-app-layout>
