<x-app-layout>
    <section class="section">
        {{-- <div class="section-header">
            <h1>Dashboard</h1> --}}
        {{-- <div class="section-header-breadcrumb">
                <div class="main-content">
                    <section class="section"> --}}
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card card-statistic-2">
                    <div class="card-stats">
                        <div class="card-stats-title">Statistik pesanan
                            <div class="dropdown d-inline">
                                {{-- <a class="font-weight-600 dropdown-toggle" href="#" id="orders-month">August</a> --}}
                                <form action="" method="get">
                                    <div class="input-group">
                                        <select class="form-select form-control" id="bulan" name="bulan">
                                            <option value="">-- Pilih --</option>
                                            @foreach (App\Models\Invoice::MONTH as $key => $bulan)
                                                @if ($key == request('bulan'))
                                                    <option value="{{ $key }}" selected>{{ $bulan }}
                                                    </option>
                                                @else
                                                    <option value="{{ $key }}">{{ $bulan }}</option>
                                                @endif
                                            @endforeach

                                        </select>
                                        <button class="btn btn-outline-primary btn-sm" type="submit">Pilih</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-stats-items">
                            <div class="card-stats-item">
                                <div class="card-stats-item-count">{{ $pending }}</div>
                                <div class="card-stats-item-label">Pending</div>
                            </div>
                            <div class="card-stats-item">
                                <div class="card-stats-item-count">{{ $shipping->count() }}</div>
                                <div class="card-stats-item-label">belum acc</div>
                            </div>
                            <div class="card-stats-item">
                                <div class="card-stats-item-count">{{ $lunas->count() }}</div>
                                <div class="card-stats-item-label">acc</div>
                            </div>
                        </div>
                    </div>
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-archive"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Pesanan</h4>
                        </div>
                        <div class="card-body">
                            {{ $invoiceAll->count() }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card card-statistic-2">
                    <div class="card-chart">
                        <canvas id="balance-chart" height="80"></canvas>
                    </div>
                    <div class="card-icon shadow-primary bg-primary">

                        <i class="fas fa-hand-holding-usd"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Pemasukan Pending</h4>
                        </div>
                        <div class="card-body">
                            @currency($pen_pending)
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card card-statistic-2">
                    <div class="card-chart">
                        <canvas id="sales-chart" height="80"></canvas>
                    </div>
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Pemasukan Sukses</h4>
                        </div>
                        <div class="card-body">
                            @currency($pen_acc)
                        </div>
                    </div>
                </div>
            </div>
            {{-- </div> --}}
            {{-- </div>
        </div> --}}
            {{-- </div> --}}
        </div>
        @if (Auth::user()->no_hp == null)
            <div class="alert alert-info d-flex align-items-center" role="alert">
                <h5 class="text-danger text-decoration-none">Lengkapi profil anda !</h5>
                <a href="{{ route('profile.edit') }}" class="btn btn-primary ml-3">klik disini</a>
            </div>
        @endif


    </section>
</x-app-layout>
