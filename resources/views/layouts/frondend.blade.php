<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ $title ?? config('app.name') }} | {{ config('app.name') }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('frondend/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('frondend/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frondend/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frondend/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('frondend/css/bootstrap.min.css') }}" rel="stylesheet">

    @stack('css')

    <!-- Template Stylesheet -->
    <link href="{{ asset('frondend/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border position-relative " style="width: 6rem; height: 6rem; color:#6777ef;" role="status">
        </div>
        <i class="fa fa-bus-alt fa-2x position-absolute top-50 start-50 translate-middle" style="color: #6777ef"></i>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div id="top" class="container-fluid bg-light px-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="row gx-0 align-items-center d-none d-lg-flex">
            <div class="col-lg-6 px-5 text-start">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="small text-secondary" href="#">Beranda</a></li>
                    <li class="breadcrumb-item"><a class="small text-secondary" href="#">Pembawa</a></li>
                    <li class="breadcrumb-item"><a class="small text-secondary" href="#">Ketentuan</a></li>
                    <li class="breadcrumb-item"><a class="small text-secondary" href="#">Pribadi</a></li>
                </ol>
            </div>
            <div class="col-lg-6 px-5 text-end">
                <small>Ikuti kami:</small>
                <div class="h-100 d-inline-flex align-items-center">
                    <a class="btn-square  border-end rounded-0" href="" style="color: #6777ef"><i
                            class="fab fa-facebook-f"></i></a>
                    <a class="btn-square  border-end rounded-0" href="" style="color: #6777ef"><i
                            class="fab fa-twitter"></i></a>
                    <a class="btn-square  border-end rounded-0" href="" style="color: #6777ef"><i
                            class="fab fa-linkedin-in"></i></a>
                    <a class="btn-square  pe-0" href="" style="color: #6777ef"><i
                            class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Brand & Contact Start -->
    <div class="container-fluid py-4 px-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="row align-items-center top-bar">
            <div class="col-lg-4 col-md-12 text-center text-lg-start">
                <a href="" class="navbar-brand m-0 p-0">
                    <h3 class="fw-bold m-0" style="color: #6777ef">
                        <img alt="image" src="{{ asset('frondend/img/asita.png') }}" class="rounded-circle mr-1"
                            width="70px">
                        {{ config('app.name') }}
                    </h3>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
            </div>
            <div class="col-lg-8 col-md-7 d-none d-lg-block">
                <div class="row">
                    <div class="col-4">
                        <div class="d-flex align-items-center justify-content-end">
                            <div class="flex-shrink-0 btn-lg-square border rounded-circle" style="color: #6777ef">
                                <i class="far fa-clock"></i>
                            </div>
                            <div class="ps-3">
                                <p class="mb-2">Jam Buka</p>
                                <h6 class="mb-0">Sen - Sab, 8:00 - 14:00</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="d-flex align-items-center justify-content-end">
                            <div class="flex-shrink-0 btn-lg-square border rounded-circle" style="color: #6777ef">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="ps-3">
                                <p class="mb-2">Panggil kami</p>
                                <h6 class="mb-0">081379879199</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="d-flex align-items-center justify-content-end">
                            <div class="flex-shrink-0 btn-lg-square border rounded-circle" style="color: #6777ef">
                                <i class="far fa-envelope"></i>
                            </div>
                            <div class="ps-3">
                                <p class="mb-2">Email kami</p>
                                <a href="mailto:ptinnesarsenwisata@gmail.com">
                                    <h6 class="mb-0">ptinnesarsenwisata@gmail.com</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Brand & Contact End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s"
        style="background-color: #6777ef">
        <a href="#" class="navbar-brand ms-3 d-lg-none">MENU</a>
        <button type="button" class="navbar-toggler me-3" data-bs-toggle="collapse"
            data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav me-auto p-3 p-lg-0">
                <a href="{{ route('home.index') }}"
                    class="nav-item nav-link {{ Request::is('/') ? 'active' : '' }}">Beranda</a>
                <a href="{{ route('about.index') }}"
                    class="nav-item nav-link {{ Request::is('tentang-kami') ? 'active' : '' }}">Tentang kami</a>
                <a href="{{ route('service.index') }}"
                    class="nav-item nav-link {{ Request::is('layanan-kami') ? 'active' : '' }}">Layanan</a>
                <a href="{{ route('contact.index') }}"
                    class="nav-item nav-link {{ Request::is('kontak-kami') ? 'active' : '' }}">Kontak kami</a>
                @auth
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle {{ Request::is('mou*') ? 'active' : '' }}"
                            data-bs-toggle="dropdown">MOU</a>
                        <div class="dropdown-menu border-1 rounded-0 rounded-bottom m-0">
                            <a href="{{ route('mou.create') }}" class="dropdown-item">Ajukan Mou</a>
                            <a href="{{ route('mou.index') }}" class="dropdown-item">Detail Mou</a>
                        </div>
                    </div>
                @endauth
            </div>
            @auth
                <div class="dropdown nav-item"><a href="#" data-toggle="dropdown"
                        class="nav-link dropdown-toggle nav-link-lg nav-link-user text-white">
                        <img alt="image"
                            src="{{ Auth::user()->image ? asset('storage/' . Auth::user()->image) : asset('storage/default.png') }}"
                            class="rounded-circle mr-1" width="50px">
                        <div class="d-sm-none d-lg-inline-block text-white">Hi, {{ Auth::user()->name ?? '' }}</div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="{{ route('profile.show') }}" class="dropdown-item has-icon">
                            <i class="far fa-user"></i> Profile
                        </a>
                        <a href="{{ route('invoice.index') }}" class="dropdown-item has-icon">
                            <i class="fas fa-history"></i> Histori Pemesanan
                        </a>
                        <div class="dropdown-divider border-1"></div>
                        <div class="logout">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">
                                    <i class="fas fa-sign-out-alt mr-2"></i>Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}"
                    class="btn btn-sm btn-light rounded-pill me-1 py-2 px-4 d-none d-lg-block">Masuk</a>
                <a href="{{ route('register') }}"
                    class="btn btn-sm btn-light rounded-pill py-2 px-4 d-none d-lg-block">Daftar</a>
            @endauth
        </div>
    </nav>
    <!-- Navbar End -->




    {{ $slot }}


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-body footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-4 col-md-6">
                    <h5 class="text-light mb-4">Alamat</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Jln. Tawes No 38. Iringmulyo, Metro
                        Timur</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>081379879199</p>
                    <a href="mailto:ptinnesarsenwisata@gmail.com">
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>ptinnesarsenwisata@gmail.com</p>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Link Cepat</h5>
                    <a href="{{ route('home.index') }}"
                        class="btn btn-link {{ Request::is('/') ? 'active' : '' }}">Beranda</a>
                    <a href="{{ route('about.index') }}"
                        class="btn btn-link {{ Request::is('tentang-kami') ? 'active' : '' }}">Tentang kami</a>
                    <a href="{{ route('service.index') }}"
                        class="btn btn-link {{ Request::is('layanan-kami') ? 'active' : '' }}">Layanan</a>
                    <a href="{{ route('contact.index') }}"
                        class="btn btn-link {{ Request::is('kontak-kami') ? 'active' : '' }}">Kontak kami</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Wisata</h5>
                    <div class="row g-2">
                        @foreach (App\Models\Wisata::orderBy('wilayah', 'desc')->get() as $wisata)
                            <div class="col-4">
                                <img class="img-fluid rounded" src="{{ asset('storage/' . $wisata->image) }}"
                                    alt="Image">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a href="#">{{ config('app.name') }}</a>, {{ date('Y') }}.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#top" class="btn btn-lg btn-lg-square text-white rounded-circle back-to-top"
        style="background-color: #6777ef"><i class="bi bi-arrow-up"></i></a>



    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('frondend/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('frondend/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('frondend/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('frondend/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('frondend/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frondend/lib/lightbox/js/lightbox.min.js') }}"></script>
    <script>
        function Preview() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.image-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);


            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>

    @stack('js=library')

    <!-- Template Javascript -->
    <script src="{{ asset('frondend/js/main.js') }}"></script>
</body>

</html>
