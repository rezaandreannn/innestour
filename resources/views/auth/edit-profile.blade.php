<x-app-layout title="Edit Profile">
    @push('css')
        <link rel="stylesheet" href="{{ asset('stisla/node_modules/summernote/dist/summernote-bs4.css') }}">
        <link rel="stylesheet" href="{{ asset('stisla/node_modules/codemirror/lib/codemirror.css') }}">
        <link rel="stylesheet" href="{{ asset('stisla/node_modules/codemirror/theme/duotone-dark.css') }}">
        <link rel="stylesheet" href="{{ asset('stisla/node_modules/selectric/public/selectric.css') }}">
    @endpush
    <section class="section">
        <x-breadcrumb title="Profile">
            @foreach ($breadcrumbs as $breadcrumb => $url)
                <div class="breadcrumb-item"><a class="text-decoration-none"
                        href="{{ $url }}">{{ $breadcrumb }}</a></div>
            @endforeach
        </x-breadcrumb>


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4></h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <div class="form-group row mb-4">
                                <x-label for="no_hp" class="col-form-label text-md-right col-12 col-md-3 col-lg-3"
                                    :value="__('No HP')" />
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="no_hp" class="form-control"
                                        value="{{ old('no_hp') ?? Auth::user()->no_hp }}">
                                    {{-- <x-input id="no_hp" class="" type="text" name="no_hp"
                                        :value="old('no_hp')" /> --}}
                                    @error('no_hp')
                                        <span class="text-danger">{{ $message }}</span>
                                    @else
                                        <span class="text-small d-block text-muted">Contoh : 08XXXXXXXXX</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <x-label for="jenis_kelamin" :value="__('Jenis Kelamin')"
                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3" />
                                <div class="col-sm-12 col-md-7">
                                    <x-select id="jenis_kelamin" class="" type="jenis_kelamin"
                                        name="jenis_kelamin" class="seletric">

                                        @if (Auth::user()->jenis_kelamin == 'laki-laki')
                                            <option value="laki-laki" selected>Laki Laki</option>
                                            <option value="perempuan">Perempuan</option>
                                        @elseif(Auth::user()->jenis_kelamin == 'perempuan')
                                            <option value="perempuan" selected>Perempuan</option>
                                            <option value="laki-laki">Laki Laki</option>
                                        @else
                                            <option>Pilih Jenis Kalamin</option>
                                            <option value="laki-laki">Laki Laki</option>
                                            <option value="perempuan">Perempuan</option>
                                        @endif
                                    </x-select>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <x-label for="image" :value="__('Gambar')"
                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3" />
                                <div class="col-sm-12 col-md-7">
                                    {{-- cek apakah gambar ada --}}
                                    @if (Auth::user()->image)
                                        <img src="{{ asset('storage/' . Auth::user()->image) }}"
                                            class="img-preview d-block" style="width: 300px">
                                    @else
                                        <img class="img-preview" style="width: 300px">
                                    @endif

                                    <input type="hidden" value="{{ Auth::user()->image }}" name="oldImage">
                                    <input class="mt-1 @error('image') is-invalid @enderror" name="image"
                                        id="image" type="file" onchange="Live()" />

                                    @error('image')
                                        <span class="text-danger d-block">{{ $message }}</span>
                                    @else
                                        <span class="text-small d-block text-muted">Maksimal 1 mb</span>
                                    @enderror
                                </div>
                            </div>

                            {{-- <div class="fallback">
                                <input name="file" type="file" multiple />
                            </div> --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    {{-- <button class="btn btn-secondary" type="reset">Reset</button> --}}
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
                const image = document.querySelector('#image');
                const imgPreview = document.querySelector('.img-preview');

                console.log(imgPreview)

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
