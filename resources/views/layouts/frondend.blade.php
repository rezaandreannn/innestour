<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ $title ?? config('app.name') }}</title>
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
                    <h1 class="fw-bold m-0" style="color: #6777ef"><i
                            class="fa fa-bus-alt me-3"></i>{{ config('app.name') }}
                    </h1>
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
                    <div class="col-4">
                        <div class="d-flex align-items-center justify-content-end">
                            <div class="flex-shrink-0 btn-lg-square border rounded-circle" style="color: #6777ef">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="ps-3">
                                <p class="mb-2">Panggil kami</p>
                                <h6 class="mb-0">+012 345 6789</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="d-flex align-items-center justify-content-end">
                            <div class="flex-shrink-0 btn-lg-square border rounded-circle" style="color: #6777ef">
                                <i class="far fa-envelope"></i>
                            </div>
                            <div class="ps-3">
                                <p class="mb-2">Email kami</p>
                                <h6 class="mb-0">info@example.com</h6>
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
                <a href="index.html" class="nav-item nav-link active">Beranda</a>
                <a href="about.html" class="nav-item nav-link">Tentang kami</a>
                <a href="service.html" class="nav-item nav-link">Layanan</a>
                {{-- <a href="project.html" class="nav-item nav-link">Projects</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu border-0 rounded-0 rounded-bottom m-0">
                        <a href="feature.html" class="dropdown-item">Features</a>
                        <a href="team.html" class="dropdown-item">Our Team</a>
                        <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                        <a href="404.html" class="dropdown-item">404 Page</a>
                    </div>
                </div> --}}
                <a href="contact.html" class="nav-item nav-link">Kontak kami</a>
            </div>
            <a href="{{ route('login') }}"
                class="btn btn-sm btn-light rounded-pill me-1 py-2 px-4 d-none d-lg-block">Masuk</a>
            <a href="{{ route('register') }}"
                class="btn btn-sm btn-light rounded-pill py-2 px-4 d-none d-lg-block">Daftar</a>
        </div>
    </nav>
    <!-- Navbar End -->


    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1">
                    <img class="img-fluid" src="{{ asset('frondend/img/carousel-1.jpg') }}" alt="Image">
                </button>
                <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="1" aria-label="Slide 2">
                    <img class="img-fluid" src="{{ asset('frondend/img/carousel-2.jpg') }}" alt="Image">
                </button>
                <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="2" aria-label="Slide 3">
                    <img class="img-fluid" src="{{ asset('frondend/img/carousel-3.jpg') }}" alt="Image">
                </button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="{{ asset('frondend/img/carousel-1.jpg') }}" alt="Image">
                    <div class="carousel-caption">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-4 animated zoomIn">We Are Leader In</h4>
                            <h1 class="display-1 text-white mb-0 animated zoomIn">Creative & Innovative Digital
                                Solution</h1>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{ asset('frondend/img/carousel-2.jpg') }}" alt="Image">
                    <div class="carousel-caption">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-4 animated zoomIn">We Are Leader In</h4>
                            <h1 class="display-1 text-white mb-0 animated zoomIn">Creative & Innovative Digital
                                Solution</h1>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{ asset('frondend/img/carousel-3.jpg') }}" alt="Image">
                    <div class="carousel-caption">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-4 animated zoomIn">We Are Leader In</h4>
                            <h1 class="display-1 text-white mb-0 animated zoomIn">Creative & Innovative Digital
                                Solution</h1>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->

    {{ $slot }}


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-body footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Address</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-outline-secondary rounded-circle me-1" href=""><i
                                class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-outline-secondary rounded-circle me-1" href=""><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-outline-secondary rounded-circle me-1" href=""><i
                                class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-outline-secondary rounded-circle me-0" href=""><i
                                class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Quick Links</h5>
                    <a class="btn btn-link" href="">About Us</a>
                    <a class="btn btn-link" href="">Contact Us</a>
                    <a class="btn btn-link" href="">Our Services</a>
                    <a class="btn btn-link" href="">Terms & Condition</a>
                    <a class="btn btn-link" href="">Support</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Gallery</h5>
                    <div class="row g-2">
                        <div class="col-4">
                            <img class="img-fluid rounded" src="img/project-1.jpg" alt="Image">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid rounded" src="img/project-2.jpg" alt="Image">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid rounded" src="img/project-3.jpg" alt="Image">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid rounded" src="img/project-4.jpg" alt="Image">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid rounded" src="img/project-5.jpg" alt="Image">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid rounded" src="img/project-6.jpg" alt="Image">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Newsletter</h5>
                    <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control bg-transparent border-secondary w-100 py-3 ps-4 pe-5"
                            type="text" placeholder="Your email">
                        <button type="button"
                            class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a href="#">Your Site Name</a>, All Right Reserved.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                        <br>Distributed By: <a class="border-bottom" href="https://themewagon.com"
                            target="_blank">ThemeWagon</a>
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

    <!-- Template Javascript -->
    <script src="{{ asset('frondend/js/main.js') }}"></script>
</body>

</html>
