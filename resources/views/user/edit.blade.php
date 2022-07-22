<x-app-layout title="Edit user">
    <section class="section">
        <x-breadcrumb title="Edit user">
            @foreach ($breadcrumbs as $breadcrumb => $url)
                <div class="breadcrumb-item"><a class="text-decoration-none"
                        href="{{ $url }}">{{ $breadcrumb }}</a></div>
            @endforeach
        </x-breadcrumb>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('user.update', $user->id) }}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="form-group row mb-4">
                                <x-label for="name" class="col-form-label text-md-right col-12 col-md-3 col-lg-3"
                                    :value="__('Nama user')" />
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="name" class="form-control"
                                        value="{{ $user->name }}">
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
                                        value="{{ $user->email }}">
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
                                        @foreach ($roles as $role)
                                            @if ($role->id == $user->role_id)
                                                <option value="{{ $role->id }}" selected>{{ $role->name }}
                                                </option>
                                            @else
                                                <option value="{{ $role->id }}">{{ $role->name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </x-select>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <x-label for="no_hp" class="col-form-label text-md-right col-12 col-md-3 col-lg-3"
                                    :value="__('No HP')" />
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="no_hp" class="form-control"
                                        value="{{ $user->no_hp }}">
                                    @error('no_hp')
                                        <span class="text-danger">{{ $message }}</span>
                                    @else
                                        <span class="text-muted text-small">contoh : 08XXXXXXXX</span>
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
