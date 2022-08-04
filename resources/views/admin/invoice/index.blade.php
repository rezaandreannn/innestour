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
                                    @forelse ($invoices as $invoice)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
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
                                            <td>{{ $invoice->updated_at }}</td>
                                            <td>
                                                <x-action href="{{ route('invoice.edit', $invoice->id) }}"
                                                    action="{{ route('invoice.destroy', $invoice->id) }}" />
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
                        <h5 class="modal-title" id="buktiModalLabel">Bukti Pembayaran {{ $invoice->user->name }}</h5>
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
