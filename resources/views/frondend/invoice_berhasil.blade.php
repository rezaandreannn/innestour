<x-frondend-layout title="Pemesanan-sukses">
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row">
                <h5 class="mb-2 text-center">Detail pemesanan</h5>
                @if (!empty($message))
                    <div class="alert alert-primary text-center" role="alert">
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    </div>
                @endif

                <table class="table">
                    <thead style="background-color: #6777ef" class="text-white">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Paket</th>
                            <th>Kursi</th>
                            <th>Tgl Berangkat</th>
                            <th>Waktu</th>
                            <th>Hari</th>
                            <th>Total Tagihan</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>{{ Auth::user()->name }}</td>
                            <td>{{ $nama_paket }}</td>
                            <td>{{ $data['kursi'] }}</td>
                            <td>{{ $tanggal }}</td>
                            <td>{{ $waktu }} Wib</td>
                            <td>{{ $hari }}</td>
                            <td>@currency($total)</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-frondend-layout>
