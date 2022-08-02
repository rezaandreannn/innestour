<x-frondend-layout title="Beranda">
    <div class="container-xxl py-5">
        <div class="container">

            @if (session('message'))
                <div class="alert alert-primary text-center" role="alert">
                    <span>
                        {{ session('message') }}
                    </span>
                </div>
            @endif

            <table class="table">
                <thead style="background-color: #6777ef" class="text-white">
                    <tr>
                        @foreach ($theads as $thead)
                            <th scope="col">{{ $thead }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @forelse ($mous as $mou)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $mou->user->name }}</td>
                            <td>{{ $mou->logo ?? 'belum ada logo' }}</td>
                            <td>{{ $mou->nama_perusahaan }}</td>
                            <td><a href="{{ asset('storage/' . $mou->dokumen) }}" target="blank"
                                    class="btn btn-success btn-sm btn-rounded">lihat</a></td>
                            <td>{{ $mou->created_at->format('d, M Y') }}</td>
                            <td>{{ $mou->status }}</td>
                            <td>
                                @if ($mou->status == 'acc')
                                    <form action="{{ route('mou.destroy', $mou->id) }}" method="post" class="d-inline">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus kerjasama</button>
                                    </form>
                                @else
                                    <x-action href="{{ route('mou.edit', $mou->id) }}"
                                        action="{{ route('mou.destroy', $mou->id) }}" />
                                @endif
                            </td>
                        @empty

                            <td colspan="8" class="mt-4">
                                <p class="text-center">Data masih kosong</p>
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>

            @if ($balasan)
                <div class="row">
                    <div class="col-5 col-sm-12 col-md-6">
                        <div class="card">
                            <div class="card-header" style="background-color: #6777ef">
                                <h5 class="text-white">Nama Perusahaan : {{ $balasan->nama_perusahaan }}</h5>
                            </div>
                            <div class="card-body">
                                <ul class="list-unstyled list-unstyled-border list-unstyled-noborder">
                                    <li class="media">
                                        <div class="media-body">
                                            <table class="table">
                                                <thead class="">
                                                    <tr>
                                                        <th>Status</th>
                                                        <th>Keterangan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><span class="btn btn-success btn-sm rounded-circle"><i
                                                                    class="fas fa-check-circle"></i></span></td>
                                                        <td>{!! $balasan->deskripsi !!}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="media-title mb-1">
                                                <iframe src="{{ asset('storage/' . $balasan->dokumen) }}"
                                                    frameborder="0"></iframe>
                                                <a class="d-block text-primary" target="blink"
                                                    href=" {{ asset('storage/' . $balasan->dokumen) }} "><span
                                                        class="text-secondary">dokumen
                                                        balasan</span> Download</a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>

</x-frondend-layout>
