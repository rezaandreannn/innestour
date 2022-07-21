<x-guest-layout title="Login">
    <x-auth-card>
        <x-slot name="logo">
            <a href="/" class="d-flex justify-content-center mb-4">
                <x-application-logo width=64 height=64 />
            </a>
        </x-slot>

        <div class="card-header justify-content-center">
            <h4>Masuk</h4>
        </div>


        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />


                <x-input id="email" class="" type="email" name="email" :value="old('email')" required
                    autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="" type="password" name="password" required
                    autocomplete="current-password" />
                <div class="float-right">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-small">
                            Lupa Password?
                        </a>
                    @endif
                </div>
            </div>

            <!-- Remember Me -->
            <div class="mt-3 form-check">
                <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                <label for="remember_me" class="form-check-label text-sm">
                    {{ __('Ingat Saya') }}
                </label>
            </div>

            <div class="d-flex justify-content-end mt-4">
                <x-button>
                    {{ __('Masuk') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
    <div class="mt-5 text-muted text-center">
        Belum punya akun ? <a href="{{ route('register') }}">Buat akun</a>
    </div>
</x-guest-layout>
