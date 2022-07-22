<x-app-layout title="Profile">
    <section class="section">
        <x-breadcrumb title="Profile">
            @foreach ($breadcrumbs as $breadcrumb => $url)
                <div class="breadcrumb-item"><a class="text-decoration-none"
                        href="{{ $url }}">{{ $breadcrumb }}</a></div>
            @endforeach
        </x-breadcrumb>
        <div class="section-body">
            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-5">
                    <div class="card profile-widget">
                        <div class="profile-widget-header">
                            <img alt="image"
                                src="{{ Auth::user()->image ? asset('storage/' . Auth::user()->image) : asset('storage/default.png') }}"
                                class="rounded-circle profile-widget-picture">
                        </div>
                        <div class="profile-widget-description">
                            <div class="profile-widget-name">
                                <div class="row">
                                    <div class="col-3">Nama</div>
                                    <div class="col-8">: {{ Auth::user()->name }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-3">Email</div>
                                    <div class="col-8">: {{ Auth::user()->email }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-3">No HP</div>
                                    <div class="col-8">: @if (Auth::user()->no_hp != null)
                                            {{ Auth::user()->no_hp }}
                                        @else
                                            <a href="{{ route('profile.update') }}" class="text-danger">Tambahkan no
                                                hp</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('profile.edit') }}" class="btn btn-primary">Ubah Profile</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-7">
                    @if (session('message'))
                        <div class="alert alert-primary text-center" role="alert">
                            <span>
                                {{ session('message') }}
                            </span>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <h4>Ubah Password</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('profile.ubahpassword') }}" method="post">
                                @method('PATCH')
                                @csrf

                                <!--old  Password -->
                                <div class="form-group">
                                    <x-label for="old_password" :value="__('Password Lama')" />
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-lock"></i>
                                            </div>
                                        </div>
                                        <x-input id="old_password" class="" type="password" name="old_password"
                                            autocomplete="old-password" />
                                    </div>
                                    @error('old_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- password --}}
                                <div class="form-group">
                                    <x-label for="password" :value="__('Password Baru')" />
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-lock"></i>
                                            </div>
                                        </div>
                                        <x-input id="password" class="" type="password" name="password"
                                            autocomplete="new-password" />
                                    </div>
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- confirm password --}}
                                <div class="form-group">
                                    <x-label for="password_confirmation" :value="__('Konfirmasi Password Baru')" />

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-lock"></i>
                                            </div>
                                        </div>
                                        <x-input id="password_confirmation" class="" type="password"
                                            name="password_confirmation" />
                                    </div>
                                    @error('password_confirmation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Simpan</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
