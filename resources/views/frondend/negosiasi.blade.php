<x-frondend-layout title="Penawaran">
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row">
                <h5 class="mb-2 text-center">Histori Penawaran</h5>
                @if (session('message'))
                    <div class="alert alert-primary text-center text-white" role="alert"
                        style="background-color: #6777ef">
                        <span>
                            {{ session('message') }}
                        </span>
                    </div>
                @endif

                {{-- <div class="col-md-5 d-flex justify-content-center">
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                        <form action="" method="get">
                            <input type="submit" class="btn-check" name="bayar" id="btnradio1" autocomplete="off"
                                value="pending" checked>
                            <label
                                class="btn {{ Request('bayar') == 'pending' ? 'btn-primary' : 'btn-outline-primary' }}"
                                for="btnradio1">Pending</label>

                            <input type="submit" class="btn-check" name="bayar" id="btnradio2" autocomplete="off"
                                value="lunas" checked>
                            <label class="btn {{ Request('bayar') == 'lunas' ? 'btn-primary' : 'btn-outline-primary' }}"
                                for="btnradio2">Lunas</label>
                        </form>
                    </div>
                </div> --}}



                <table class="table mt-3">
                    <thead style="background-color: #6777ef" class="text-white">
                        <tr>
                            <th>No</th>
                            <th>Paket</th>
                            <th>Harga</th>
                            <th>Status</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($negosiasis as $negosiasi)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $negosiasi->paket->nama_paket }}</td>
                                <td>@currency($negosiasi->harga)</td>
                                <td>{{ $negosiasi->status }}</td>
                                <td>{{ $negosiasi->keterangan }}</td>
                                <td>
                                    <form action="{{ route('negosiasi.destroy', $negosiasi->id) }}" method="post"
                                        class="d-inline">
                                        @method('DELETE')
                                        @csrf

                                        <button type="submit" class="btn btn-danger btn-sm d-inline">Hapus</button>
                                    </form>
                                </td>
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>
    </div>

</x-frondend-layout>
