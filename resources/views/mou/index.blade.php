<x-app-layout title="MOU">
    <section class="section">
        <x-breadcrumb title="MOU">
            @foreach ($breadcrumbs as $breadcrumb => $url)
                <div class="breadcrumb-item"><a class="text-decoration-none"
                        href="{{ $url }}">{{ $breadcrumb }}</a></div>
            @endforeach
        </x-breadcrumb>

        @if (session('success'))
            <div class="alert alert-primary text-center" role="alert">
                <span>
                    {{ session('success') }}
                </span>
            </div>
        @endif
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
                            {{-- <a href="" class="btn btn-primary">Tambah User</a> --}}
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
                                    @forelse ($mous as $mou)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $mou->user->name }}</td>
                                            <td>{{ $mou->logo }}</td>
                                            <td>{{ $mou->nama_perusahaan }}</td>
                                            <td><a href="{{ asset('storage/' . $mou->dokumen) }}" target="blank"
                                                    class="badge badge-success">lihat</a></td>
                                            <td>{{ $mou->created_at->format('d, M Y') }}</td>
                                            <td>{{ $mou->status }}</td>
                                            <td>

                                                @if ($mou->status !== 'acc' && Auth::user()->role_id != 2)
                                                    <a href="{{ route('mou.show', $mou->id) }}"
                                                        class="btn btn-info btn-sm">cek</a>
                                                @endif
                                                <x-action href="{{ route('mou.edit', $mou->id) }}"
                                                    action="{{ route('mou.destroy', $mou->id) }}" />
                                            </td>
                                        @empty

                                            <td colspan="8" class="mt-4">
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
