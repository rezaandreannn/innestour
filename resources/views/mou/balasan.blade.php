<x-app-layout title="Balasan">
    <section class="section">
        <x-breadcrumb title="Balasan">
            @foreach ($breadcrumbs as $breadcrumb => $url)
                <div class="breadcrumb-item"><a class="text-decoration-none"
                        href="{{ $url }}">{{ $breadcrumb }}</a></div>
            @endforeach
        </x-breadcrumb>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-sm-12 col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Nama Perusahaan : {{ $balasan->nama_perusahaan }}</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled list-unstyled-border list-unstyled-noborder">
                                <li class="media">
                                    {{-- <img alt="image" class="mr-3 rounded-circle" width="70"
                                    src="{{  asset('storage/' . $mou->logo) }}"> --}}
                                    <div class="media-body">
                                        <div class="media-right">
                                            <div class="text-primary">{{ $balasan->status }}</div>
                                        </div>
                                        <div class="media-title mb-1">{!! $balasan->deskripsi !!}</div>
                                        <div class="media-title mb-1">
                                            <iframe src="{{ asset('storage/'. $balasan->dokumen) }}" frameborder="0"></iframe>
                                            <a class="d-block text-primary" target="blink" href=" {{ asset('storage/'. $balasan->dokumen) }} ">Download</a>
                                        </div>
                                        {{-- <div class="text-time">Di buat, {{ $user->created_at->format('d M Y') }}</div>
                                        <div class="text-time">di edit, {{ $user->updated_at->format('d M Y') }}</div>
                                        <div class="media-description text-muted">{{ $user->email }}</div>
                                        <div class="media-description text-muted">
                                            {{ $user->no_hp ?? 'belum menambahkan no hp' }}</div> --}}
                                        {{-- <div class="media-links">
                                            <a href="{{ route('user.index') }}">Kembali</a>
                                            <div class="bullet"></div>
                                            <a href="{{ route('user.edit', $user->id) }}">Edit</a>
                                            <div class="bullet"></div>
                                            <form action="{{ route('user.destroy', $user->id) }}" method="post"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        </div> --}}
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
