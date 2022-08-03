<x-frondend-layout title="Pemesanan">
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row">
                <h5 class="mb-2 text-center">Histori pemesanan</h5>
                @if (session('message'))
                    <div class="alert alert-primary text-center text-white" role="alert"
                        style="background-color: #6777ef">
                        <span>
                            {{ session('message') }}
                        </span>
                    </div>
                @endif

                <div class="col-md-5 d-flex justify-content-center">
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                        <form action="" method="get">
                            <input type="submit" class="btn-check" name="bayar" id="btnradio1" autocomplete="off"
                                value="pending" checked>
                            <label
                                class="btn {{ Request('bayar') == 'pending' ? 'btn-primary' : 'btn-outline-primary' }}"
                                for="btnradio1">Belum bayar</label>

                            <input type="submit" class="btn-check" name="bayar" id="btnradio2" autocomplete="off"
                                value="lunas" checked>
                            <label class="btn {{ Request('bayar') == 'lunas' ? 'btn-primary' : 'btn-outline-primary' }}"
                                for="btnradio2">sudah bayar</label>
                        </form>
                    </div>
                </div>



                <table class="table mt-3">
                    <thead style="background-color: #6777ef" class="text-white">
                        <tr>
                            <th>No</th>
                            {{-- <th>Nama</th> --}}
                            <th>Paket</th>
                            <th>Kursi</th>
                            <th>total tagihan</th>
                            <th>Tgl Berangkat</th>
                            {{-- <th>Waktu</th> --}}
                            {{-- <th>Hari</th> --}}
                            <th>Tgl Pesan</th>
                            @if (Request('bayar') != 'lunas')
                                <th>aksi</th>
                            @else
                                <th>Kuitansi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($invoices as $invoice)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                {{-- <td>{{ $invoice->user_id }}</td> --}}
                                <td>{{ $invoice->paket->nama_paket }}</td>
                                <td>{{ $invoice->kursi }}</td>
                                <td>@currency($invoice->total_tagihan)</td>
                                <td>
                                    {{ date('d-m-Y', strtotime($invoice->tgl_berangkat)) }},
                                    {{ date('H:i', strtotime($invoice->tgl_berangkat)) }} Wib
                                </td>
                                {{-- <td>{{ $invoice->user_id }} </td> --}}
                                <td>{{ date('d-m-Y', strtotime($invoice->created_at)) }}</td>
                                @if (Request('bayar') != 'lunas')
                                    <td>
                                        <a href="{{ route('invoice.edit', $invoice->id) }}"
                                            class="btn btn-success btn-sm">Bayar</a>
                                        <form action="{{ route('invoice.destroy', $invoice->id) }}" method="post"
                                            class="d-inline">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>
    </div>

</x-frondend-layout>
