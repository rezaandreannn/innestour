<x-app-layout title="Tambah Role">
    <section class="section">
        <x-breadcrumb title="Tambah Role">
            @foreach ($breadcrumbs as $breadcrumb => $url)
                <div class="breadcrumb-item"><a class="text-decoration-none"
                        href="{{ $url }}">{{ $breadcrumb }}</a></div>
            @endforeach
        </x-breadcrumb>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('user.store') }}" method="post">
                            @csrf
                            <div class="form-group row mb-4">
                                <x-label for="name" class="col-form-label text-md-right col-12 col-md-3 col-lg-3"
                                    :value="__('Nama')" />
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="name" class="form-control"
                                        value="{{ old('name') }}" placeholder="{{ config('app.name') }}">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <x-label for="email" class="col-form-label text-md-right col-12 col-md-3 col-lg-3"
                                    :value="__('Email')" />
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="email" class="form-control"
                                        value="{{ old('email') }}" placeholder="admin@contoh.com">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <x-label for="role_id" :value="__('Role')"
                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3" />
                                <div class="col-sm-12 col-md-7">
                                    <x-select id="role_id" class="" type="role_id" name="role_id"
                                        class="seletric">
                                        <option>Pilih role</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </x-select>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <x-label for="password" class="col-form-label text-md-right col-12 col-md-3 col-lg-3"
                                    :value="__('Password')" />
                                <div class="col-sm-12 col-md-7">
                                    <input type="password" name="password" class="form-control" value="">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <x-label for="password_confirmation"
                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3" :value="__('Konfirmasi password')" />
                                <div class="col-sm-12 col-md-7">
                                    <input type="password" name="password_confirmation" class="form-control"
                                        value="">
                                    @error('password_confirmation')
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
</x-app-layout>
