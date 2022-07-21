<x-app-layout>
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
            <div class="section-header-breadcrumb">

            </div>
        </div>
        @if (Auth::user()->no_hp == null)
            <div class="alert alert-info d-flex align-items-center" role="alert">
                <h5 class="text-danger text-decoration-none">Lengkapi profil anda !</h5>
                <a href="{{ route('profile.edit') }}" class="btn btn-primary ml-3">klik disini</a>
            </div>
        @endif


    </section>
</x-app-layout>
