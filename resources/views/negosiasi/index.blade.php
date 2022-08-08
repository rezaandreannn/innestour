<x-app-layout title="Negosiasi">
    <section class="section">
        <x-breadcrumb title="Negosiasi">
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
                            {{-- <a href="{{ route('paket.create') }}" class="btn btn-primary">Tambah Paket</a>
                            <a href="{{ route('detail.create') }}" class="btn btn-info ml-1">Tambah Detail wisata</a> --}}
                            <h4></h4>
                            <div class="card-header-form">
                                {{-- <form>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search">
                                        <div class="input-group-btn">
                                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form> --}}
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
                                    @forelse ($negosiasis as $negosiasi)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $negosiasi->user->name }}</td>
                                            <td style="max-width: 200px">
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#exampleModal{{ $negosiasi->id }}">
                                                    lihat
                                                </button>
                                            </td>
                                            <td>@currency($negosiasi->harga)</td>
                                            <td>{{ $negosiasi->status }}</td>
                                            <td>
                                                @if ($negosiasi->status != 'acc')
                                                    <button type="button" class="btn btn-success btn-sm"
                                                        data-toggle="modal" data-target="#accModal{{ $negosiasi->id }}">
                                                        Acc/Tolak
                                                    </button>
                                                @endif
                                                <form action="{{ route('negosiasi.destroy', $negosiasi->id) }}"
                                                    method="post" class="d-inline">
                                                    @method('DELETE')
                                                    @csrf

                                                    <button type="submit"
                                                        class="btn btn-danger btn-sm d-inline">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
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
    @foreach ($negosiasis as $negosiasi)
        <div class="modal fade" id="exampleModal{{ $negosiasi->id }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Paket {{ $negosiasi->paket->nama_paket }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <ul class="list-group">
                            <li class="list-group-item"><span class="text-primary">Fasilitas</span> <br>
                                {!! $negosiasi->paket->fasilitas !!}</li>
                            <li class="list-group-item"><span class="text-primary">Wisata</span> <br>
                                {!! $negosiasi->paket->wisata !!}</li>
                            <li class="list-group-item"><span class="text-primary">Harga</span> <br>
                                @currency($negosiasi->paket->harga)</li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    @endforeach

    {{-- acc modal --}}
    @foreach ($negosiasis as $negosiasi)
        <div class="modal fade" id="accModal{{ $negosiasi->id }}" tabindex="-1" aria-labelledby="accModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="accModalLabel">Paket {{ $negosiasi->paket->nama_paket }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-success" role="alert">
                            <div class="row">
                                <div class="col-md-5">
                                    <p>Harga Paket Normal</p>
                                </div>
                                <div class="col-md-7">: @currency($negosiasi->paket->harga)</div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <p>Harga yang diajukan</p>
                                </div>
                                <div class="col-md-7">: @currency($negosiasi->harga)</div>
                            </div>

                        </div>
                        <form action="{{ route('negosiasi.update', $negosiasi->id) }}" method="post">
                            @method('PATCH')
                            @csrf
                            <div class="form-group">
                                <label for="status">Pilih status</label>
                                <select class="form-control" name="status" id="status">
                                    <option value="acc">Acc</option>
                                    <option value="tolak">Tolak</option>
                                </select>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    @endforeach

</x-app-layout>
