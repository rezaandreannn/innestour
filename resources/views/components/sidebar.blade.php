<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">{{ config('app.name') }}</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">Hd</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li><a class="nav-link" href="/dashboard"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
            <li class="menu-header">Menu</li>
            @if (Auth::user()->role_id == 1)
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                            class="fas fa-columns"></i>
                        <span>Menu</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('mou.index') }}">MOU</a></li>
                        <li><a class="nav-link" href="{{ route('wisata.index') }}">Wisata</a></li>
                        <li><a class="nav-link" href="{{ route('paket.index') }}">Paket</a></li>
                        <li><a class="nav-link" href="{{ route('negosiasi.index') }}">Negosiasi</a></li>
                        <li><a class="nav-link" href="{{ route('invoice.index') }}">Pembayaran</a></li>
                        <li><a class="nav-link" href="{{ route('contact.index') }}">Kotak masuk</a></li>
                    </ul>
                </li>
            @endif


            @if (Auth::user()->role_id == 1)
                <li class="menu-header">Setting</li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i>
                        <span>Setting</span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('user.index') }}">User</a></li>
                        <li><a href="{{ route('role.index') }}">Role</a></li>
                    </ul>
                </li>
            @endif
        </ul>
    </aside>
</div>
