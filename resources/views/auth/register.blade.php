<x-guest-layout title="Register">
    <x-auth-card>
        <x-slot name="logo">
            <a href="/" class="d-flex justify-content-center mb-4">
                <x-application-logo width=64 height=64 />
            </a>
        </x-slot>

        <div class="card-header justify-content-center">
            <h4>Daftar</h4>
        </div>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="" type="text" name="name" :value="old('name')" required
                    autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="" type="password" name="password" required
                    autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="" type="password" name="password_confirmation"
                    required />
            </div>

            <div class="d-flex justify-content-end mt-4">
                <x-button>
                    {{ __('Daftar') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>

    <div class="mt-5 text-muted text-center">
        Sudah punya akun ? <a href="{{ route('login') }}">Masuk</a>
    </div>
</x-guest-layout>
