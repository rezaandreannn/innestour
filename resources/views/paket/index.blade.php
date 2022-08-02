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
                            <a href="{{ route('detail.create') }}" class="btn btn-info ml-1">Tambah Detail wisata</a>
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
                                            <td><a href="{{ route('paket.show', $paket->id) }}"
                                                    class="badge badge-success">{{ $paket->nama_paket }}</a></td>
                                            <td>{{ $paket->nama_program }}</td>
                                            <td>{{ $paket->tempat_duduk }} Kursi</td>
                                            <td>@currency($paket->harga) </td>
                                            <td style="max-width: 200px">

                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#exampleModal{{ $paket->id }}">
                                                    lihat
                                                </button>
                                            </td>
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



    <!-- Modal -->
    @foreach ($pakets as $paket)
        <div class="modal fade" id="exampleModal{{ $paket->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Fasilitas {{ $paket->nama_paket }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {!! $paket->fasilitas !!}
                    </div>

                </div>
            </div>
        </div>
    @endforeach

</x-app-layout>
