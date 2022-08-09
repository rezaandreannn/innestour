<x-app-layout title="kotak-masuk">
    <section class="section">
        <x-breadcrumb title="Kotak masuk">
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
                                {{-- <form method="get">
                                    <div class="input-group">
                                        <input type="text" name="searchInvoice"
                                            value="{{ Request('searchInvoice') }}" class="form-control"
                                            placeholder="Cari kode pesan">
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
                                    @forelse ($contacts as $key => $contact)
                                        <tr>
                                            <td>{{ $contacts->firstItem() + $key }}</td>
                                            <td>{{ $contact->nama }}</td>
                                            <td>{{ $contact->email }}</td>
                                            <td>{{ $contact->subyek }}</td>
                                            <td>{{ $contact->pesan }}</td>

                                        @empty
                                            <td colspan="5" class="mt-4">
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
                                    {{ $contacts->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>





</x-app-layout>
