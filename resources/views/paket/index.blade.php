<x-app-layout title="Paket">
    <section class="section">
        <x-breadcrumb title="Paket">
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
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('paket.create') }}" class="btn btn-primary">Tambah Paket</a>
                            <h4></h4>
                            <div class="card-header-form">
                                <form>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search">
                                        <div class="input-group-btn">
                                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        @foreach ($theads as $thead)
                                            <th>{{ $thead }}</th>
                                        @endforeach
                                    </tr>
                                    @forelse ($pakets as $paket)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $paket->nama_paket }}</td>
                                            <td>{{ $paket->nama_program }}</td>

                                            <td>{{ $paket->tempat_duduk }}</td>
                                            <td>@currency($paket->harga) </td>
                                            <td style="max-width: 200px">{{ $paket->fasilitas }}</td>
                                            <td>
                                                <x-action href="{{ route('paket.edit', $paket->id) }}"
                                                    action="{{ route('paket.destroy', $paket->id) }}" />
                                            </td>
                                        @empty
                                            <td colspan="6" class="mt-4">
                                                <div class="alert alert-warning text-center" role="alert">
                                                    <h5>
                                                        Tidak ada data .
                                                    </h5>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>