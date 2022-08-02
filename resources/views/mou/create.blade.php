<x-frondend-layout title="Tambah Mou">
    <div class="container-xxl py-5">
        <div class="container">
            <section class="section">

                @if (session('message'))
                    <div class="alert alert-primary text-center" role="alert">
                        <span>
                            {{ session('message') }}
                        </span>
                    </div>
                @endif

                <div class="row">
                    <div class="col-12">
                        <div class="card mb-5 col-10">
                            <div class="card-body">
                                panduan mou
                                <ul>
                                    <li>are unaffected by this style</li>
                                    <li>will still show a bullet</li>
                                    <li>and have appropriate left margin</li>
                                </ul>
                            </div>
                        </div>

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
                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3" />
                                <div class="col-sm-12 col-md-7">
                                    {{-- <iframe class="dokumen-preview" frameborder="0" scrolling="no"></iframe> --}}
                                    <input class="mt-1 form-control" name="dokumen" id="dokumen" type="file"
                                        onchange="Live()" />

                                    @error('dokumen')
                                        <span class="text-danger d-block">{{ $message }}</span>
                                    @else
                                        <span class="text-small d-block text-muted">Maksimal 1 mb <br>File harus pdf
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <x-label for="logo" :value="__('Logo')"
                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3" />
                                <div class="col-sm-12 col-md-7">
                                    {{-- <img class="logo-preview" style="width: 300px"> --}}
                                    {{-- <input type="hidden" value="{{ $mou->logo }}" name="oldLogo"> --}}
                                    <input class="mt-1 form-control" name="logo" id="logo" type="file"
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
                                    <button class="btn btn-primary border-0" type="submit"
                                        style="background-color: #6777ef">Ajukan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
</x-frondend-layout>
