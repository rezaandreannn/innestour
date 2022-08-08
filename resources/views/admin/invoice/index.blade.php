<x-app-layout title="Pemesanan">
    <section class="section">
        <x-breadcrumb title="Pemesanan">
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

                            <h4></h4>
                            <div class="card-header-form">
                                <form method="get">
                                    <div class="input-group">
                                        <input type="text" name="searchInvoice"
                                            value="{{ Request('searchInvoice') }}" class="form-control"
                                            placeholder="Cari kode pesan">
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
                                    @forelse ($invoices as $key => $invoice)
                                        <tr>
                                            <td>{{ $invoices->firstItem() + $key }}</td>
                                            <td>{{ $invoice->kode }}</td>
                                            <td>{{ $invoice->user->name }}</td>
                                            <td style="max-width: 200px">
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#exampleModal{{ $invoice->id }}">
                                                    lihat
                                                </button>
                                            </td>
                                            <td>{{ $invoice->kursi }}</td>
                                            <td>@currency($invoice->total_tagihan) </td>
                                            <td>{{ $invoice->status }}</td>
                                            @if ($invoice->bukti)
                                                <td style="max-width: 200px">
                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#buktiModal{{ $invoice->id }}">
                                                        lihat
                                                    </button>
                                                </td>
                                            @else
                                                <td></td>
                                            @endif
                                            <td>{{ date('d/m/Y', strtotime($invoice->updated_at)) }}</td>
                                            <td>
                                                @if ($invoice->status == 'lunas')
                                                    <a href="{{ route('generate.invoice', $invoice->id) }}"><i
                                                            class="fas fa-download"></i></a>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($invoice->status == 'pending' && $invoice->bukti != null)
                                                    <a href="{{ route('invoice.edit', $invoice->id) }}"
                                                        class="btn btn-warning btn-sm mb-1 mt-1">Cek</a>
                                                @endif
                                                <form action="{{ route('invoice.destroy', $invoice->id) }}"
                                                    method="post" class="d-inline">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                                </form>

                                            </td>
                                        @empty
                                            <td colspan="11" class="mt-4">
                                                <div class="alert alert-warning text-center" role="alert">
                                                    <h5>
                                                        Tidak ada data .
                                                    </h5>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </table>
                                <div class="d-flex justify-content-end">
                                    {{ $invoices->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Modal -->
    @foreach ($invoices as $invoice)
        <div class="modal fade" id="exampleModal{{ $invoice->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Paket {{ $invoice->paket->nama_paket }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5>Fasilitas</h5>
                        {!! $invoice->paket->fasilitas !!}
                        <hr>
                        <h5>Wisata</h5>
                        {!! $invoice->paket->wisata !!}
                    </div>

                </div>
            </div>
        </div>
    @endforeach
    @foreach ($invoices as $invoice)
        <div class="modal fade" id="buktiModal{{ $invoice->id }}" tabindex="-1" aria-labelledby="buktiModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="buktiModalLabel">Bukti Pembayaran {{ $invoice->user->name }}
                            <br>
                            Jenis Paket : {{ $invoice->paket->nama_paket }} / ({{ $invoice->paket->nama_program }})
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img class="img-thumbnail" src="{{ asset('storage/' . $invoice->bukti) }}" alt="Bukti bayar">
                    </div>

                </div>
            </div>
        </div>
    @endforeach

</x-app-layout>
