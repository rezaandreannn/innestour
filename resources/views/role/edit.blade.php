<x-app-layout title="Edit Role">
    <section class="section">
        <x-breadcrumb title="Edit Role">
            @foreach ($breadcrumbs as $breadcrumb => $url)
                <div class="breadcrumb-item"><a class="text-decoration-none"
                        href="{{ $url }}">{{ $breadcrumb }}</a></div>
            @endforeach
        </x-breadcrumb>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('role.update', $role->id) }}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="form-group row mb-4">
                                <x-label for="name" class="col-form-label text-md-right col-12 col-md-3 col-lg-3"
                                    :value="__('Nama Role')" />
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="name" class="form-control"
                                        value="{{ $role->name }}">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <x-label for="deskripsi" class="col-form-label text-md-right col-12 col-md-3 col-lg-3"
                                    :value="__('Deskripsi')" />
                                <div class="col-sm-12 col-md-7">
                                    {{-- textare --}}
                                    <textarea class="form-control" placeholder="Kelola semua fitur" id="deskripsi" name="deskripsi" style="height: 100px">{{ $role->deskripsi }}</textarea>
                                    @error('deskripsi')
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
