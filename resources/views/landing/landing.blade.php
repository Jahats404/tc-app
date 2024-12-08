<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>Classy Photography</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('dashboard/images/logowhite.svg') }}" type="image/x-icon">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Playfair+Display:wght@500;600;700&display=swap"
        rel="stylesheet">
    <!-- Icon Font Stylesheet -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Libraries Stylesheet -->
    <link href="{{ asset('landing/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('landing/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('landing/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('landing/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Template Stylesheet -->
    <link href="{{ asset('landing/css/style.css') }}" rel="stylesheet">
    <link href='https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.5/main.min.css' rel='stylesheet' />
    <link href='https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@6.1.5/main.min.css' rel='stylesheet' />


    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" rel="stylesheet">

    {{-- Foto Profil Karyawan --}}
    <style>
        .team-img {
            width: 100%;
            height: 100%;
            max-width: 100%;
            max-height: 100%;
            object-fit: cover;
        }

        .aspect-ratio {
            position: relative;
            width: 100%;
        }

        .aspect-ratio-4x5 {
            padding-top: 125%;
            /* Aspect ratio 4:5 (height / width * 100) */
        }

        .aspect-ratio img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>

    <style>
        .whatsapp-button {
            position: fixed;
            bottom: 15%;
            /* Adjust this value to move the button towards the center */
            right: 20px;
            z-index: 1000;
            background-color: #25d366;
            color: white;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .whatsapp-button:hover {
            background-color: #1ebd58;
        }

        .whatsapp-icon {
            font-size: 30px;
        }
    </style>


    <style>
        .fc-event {
            background-color: #003366 !important;
            /* Warna background */
            color: white !important;
            /* Warna teks */
            border: none !important;
            border-radius: 4px !important;
            /* Membuat sudut membulat */
            padding: 5px !important;
            /* Menambahkan padding */
            font-size: 12px !important;
            /* Ukuran font */
            white-space: nowrap;
            /* Menghindari teks terpotong */
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .fc-event:hover {
            background-color: #005599 !important;
            /* Warna background saat hover */
        }
    </style>



</head>


<body>



    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->

    <div class="whatsapp-button" onclick="openWhatsApp()">
        <i class="fab fa-whatsapp whatsapp-icon"></i>
    </div>

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg sticky-top shadow-sm"
        style="z-index: 1000; background: linear-gradient(90deg, #cec1b0, #fcf5ec); font-family: 'Montserrat', sans-serif; color: white;">
        <div class="container-fluid">
            <a href="/" class="navbar-brand d-flex align-items-center" style="color: white;">
                <img id="logo" src="landing/img/logo.svg" alt="Classy Photography" height="40"
                    class="d-inline-block align-text-top me-2">
                <span class="d-inline-block align-middle">Classy Photography</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="/" style="color: white;">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#aboutus" style="color: white;">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#ourServices" style="color: white;">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="" style="color: white;">Become a
                            Freelancer</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    @if (Auth()->check())
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false" style="color: white;">
                                {{ Auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                @if (Auth::user()->role_id == 1)
                                    <li><a class="dropdown-item" href="">Dashboard</a></li>
                                @elseif(Auth::user()->role_id == 2)
                                    <li><a class="dropdown-item" href="">Dashboard</a></li>
                                @elseif(Auth::user()->role_id == 3)
                                    <li><a class="dropdown-item"
                                            href="">Dashboard</a>
                                    </li>
                                @elseif(Auth::user()->role_id == 4)
                                    <li><a class="dropdown-item"
                                            href="">Dashboard</a></li>
                                @endif
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="btn btn-outline-primary me-2"
                                style="color: white; border-color: white;">Login</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="btn btn-primary"
                                style="color: white; background-color: black; border-color: white;">Sign Up</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    {{-- Navbar End --}}






    {{-- <div class="container-fluid hero-header bg-light py-5 mb-5 position-relative"> --}}
    <div class="video-background" style="position: relative; width: 100%; height: 100%; overflow: hidden;">
        <!-- Video Background -->
        <video autoplay loop muted playsinline
            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover;">
            <source src="landing/img/vidio-2.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <!-- Overlay Hitam dengan Opacity -->
        <div class="overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
        </div>
        <!-- Konten Hero -->
        <div class="container py-5 position-relative" style="z-index: 1;">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <p class="text-primary text-uppercase mb-2 animated slideInDown">Selamat datang di Classy
                        Photography</p>
                    <h1 class="text-bawah display-4 mb-3 animated slideInDown">Wedding Photography services based in
                        Cilacap</h1>
                    <p class="text-bawahnya-lagi animated slideInDown">Jaga Setiap Momen Berharga: Rasakan Keajaiban
                        Fotografi
                        Pernikahan
                        di Cilacap, Menciptakan Kenangan Abadi yang Menerangi Perjalanan Cinta Anda.</p>
                </div>
                <div class="col-lg-6 animated fadeIn">
                    <div class="row g-3">
                        <div class="col-6 text-end">
                            <img class="img-fluid bg-white p-3 w-100 mb-3" src="landing/img/hero-1.jpg"
                                alt="">
                            <img class="img-fluid bg-white p-3 w-50" src="landing/img/hero-3.jpg" alt="">
                        </div>
                        <div class="col-6">
                            <img class="img-fluid bg-white p-3 w-50 mb-3" src="landing/img/hero-4.jpg"
                                alt="">
                            <img class="img-fluid bg-white p-3 w-100" src="landing/img/hero-2.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- </div> --}}





    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="row g-3 img-twice position-relative h-100">
                        <div class="col-6">
                            <img class="img-fluid bg-light p-3" src="landing/img/about-1.jpg" alt="">
                        </div>
                        <div class="col-6 align-self-end">
                            <img class="img-fluid bg-light p-3" src="landing/img/about-2.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="h-100">
                        <p class="text-primary text-uppercase mb-2" id="aboutus">About Us</p>
                        <h1 class="display-6 mb-4">Kami adalah Fotografer Kreatif dan Profesional</h1>
                        <p>Kami percaya bahwa setiap foto adalah karya seni yang harus mencerminkan kepribadian dan
                            cerita di baliknya. Tim kami terdiri dari fotografer yang penuh imajinasi dan inovasi,
                            selalu mencari sudut pandang baru dan ide-ide segar. Baik itu untuk fotografi pernikahan,
                            potret keluarga, fashion, atau komersial, kami siap menghadirkan hasil yang unik dan
                            memukau.
                        </p>

                        <div class="row g-2 mb-4">
                            <div class="col-sm-6">
                                <i class="fa fa-check text-primary me-3"></i>Quality Products
                            </div>
                            <div class="col-sm-6">
                                <i class="fa fa-check text-primary me-3"></i>Custom Products
                            </div>
                            <div class="col-sm-6">
                                <i class="fa fa-check text-primary me-3"></i>Online Order
                            </div>
                            <div class="col-sm-6">
                                <i class="fa fa-check text-primary me-3"></i>Home Delivery
                            </div>
                        </div>
                        {{-- <a class="btn btn-primary py-3 px-5" href="">Read More</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <div class="container-xxl py-5">
        <div id="carouselExampleCaptions" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="landing/img/porto-1.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="landing/img/porto-2.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="landing/img/porto-3.png" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>


    <!-- Facts Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                {{-- <p class="text-primary text-uppercase mb-2">Dengan Penawaran Paket yang menarik!</p> --}}
                <h1 class="display-6 mb-5">Dengan Penawaran Paket yang menarik!</h1>
            </div>
            <div class="row g-3">
                {{-- @foreach ($paket as $item)
                    <div class="col-lg-4 col-md-6 pt-lg-5 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="fact-item bg-light text-center h-100 p-5">
                            <h1 class="display-2 text-primary mb-3">{{ $item->nama_paket }}</h1>
                            <h2 class="mb-3">Rp.{{ number_format($item->harga_paket, 0, ',', '.') }}</h2>
                            <div class="row g-2 mb-4">
                                <div class="col-sm-6 d-flex align-items-center justify-content-center">
                                    <i
                                        class="fa fa-check {{ is_array($item->service) && in_array('Fotografi', $item->service) ? 'text-warning' : 'text-dark' }} me-2"></i>
                                    <span>Fotografi</span>
                                </div>
                                <div class="col-sm-6 d-flex align-items-center justify-content-center">
                                    <i
                                        class="fa fa-check {{ is_array($item->service) && in_array('Vidiografi', $item->service) ? 'text-warning' : 'text-dark' }} me-2"></i>
                                    <span>Vidiografi</span>
                                </div>
                            </div>
                            <div class="row g-2 mb-4">
                                <div class="col-sm-6 d-flex align-items-center justify-content-center">
                                    <i
                                        class="fa fa-check {{ is_array($item->service) && in_array('Album Foto', $item->service) ? 'text-warning' : 'text-dark' }} me-2"></i>
                                    <span>Album Foto</span>
                                </div>
                                <div class="col-sm-6 d-flex align-items-center justify-content-center">
                                    <i
                                        class="fa fa-check {{ is_array($item->service) && in_array('Flashdisk', $item->service) ? 'text-warning' : 'text-dark' }} me-2"></i>
                                    <span>Flashdisk</span>
                                </div>
                            </div>

                            @if (Auth::check())
                                @if (in_array(Auth::user()->role_id, [1, 2, 4]))
                                    <button type="button" class="btn btn-warning" disabled>Reservasi
                                        Sekarang!</button>
                                @else
                                    <a data-bs-toggle="modal" data-bs-target="#tambahModal"
                                        data-nama_paket="{{ $item->nama_paket }}">
                                        <button type="button" class="btn btn-warning">Reservasi Sekarang!</button>
                                    </a>
                                @endif
                            @else
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#loginAlertModal">Reservasi Sekarang!</button>
                            @endif


                            <!-- Modal untuk alert login -->
                            <div class="modal fade" id="loginAlertModal" tabindex="-1"
                                aria-labelledby="loginAlertModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="loginAlertModalLabel">Peringatan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Kamu belum Login, silahkan login terlebih dahulu.
                                        </div>
                                        <div class="modal-footer">
                                            <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach --}}

            </div>
        </div>
    </div>
    <!-- Facts End -->


    <!-- Service Start -->
    <div class="container-xxl bg-light py-5 my-5">
        <div class="container py-5">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="text-primary text-uppercase mb-2" id="ourServices">Our Services</p>
                <h1 class="display-6 mb-4">Kami Menyediakan Layanan Profesional Terbaik</h1>
            </div>
            <div class="row g-3">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item d-flex flex-column bg-white p-3 pb-0">
                        <div class="position-relative">
                            <iframe src="https://www.instagram.com/p/C52LfLKyzm5/embed" width="400" height="480"
                                frameborder="0" scrolling="no" allowtransparency="true"></iframe>

                            <div class="service-overlay">
                                <a class="btn btn-lg-square btn-outline-light rounded-circle"
                                    href="https://www.instagram.com/p/C52LfLKyzm5"><i
                                        class="fa fa-link text-primary"></i></a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-3 col-md-6 pt-lg-5 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item d-flex flex-column bg-white p-3 pb-0">
                        <div class="position-relative">
                            <iframe src="https://www.instagram.com/p/CzX071_y7SP/embed" width="400" height="480"
                                frameborder="0" scrolling="no" allowtransparency="true"></iframe>
                            <div class="service-overlay">
                                <a class="btn btn-lg-square btn-outline-light rounded-circle"
                                    href="https://www.instagram.com/p/CzX071_y7SP"><i
                                        class="fa fa-link text-primary"></i></a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item d-flex flex-column bg-white p-3 pb-0">
                        <div class="position-relative">
                            <iframe src="https://www.instagram.com/p/CxsHtnsS2jF/embed" width="400" height="480"
                                frameborder="0" scrolling="no" allowtransparency="true"></iframe>
                            <div class="service-overlay">
                                <a class="btn btn-lg-square btn-outline-light rounded-circle"
                                    href="https://www.instagram.com/p/CxsHtnsS2jF"><i
                                        class="fa fa-link text-primary"></i></a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-3 col-md-6 pt-lg-5 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="service-item d-flex flex-column bg-white p-3 pb-0">
                        <div class="position-relative">
                            <iframe src="https://www.instagram.com/p/CtN0BTayR0C/embed" width="400" height="480"
                                frameborder="0" scrolling="no" allowtransparency="true"></iframe>
                            <div class="service-overlay">
                                <a class="btn btn-lg-square btn-outline-light rounded-circle"
                                    href="https://www.instagram.com/p/CtN0BTayR0C"><i
                                        class="fa fa-link text-primary"></i></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Service End -->



    <!-- Team Start -->
    <div class="container-xxl px-0 py-5">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <p class="text-primary text-uppercase mb-2">Our Team</p>
            <h1 class="display-6 mb-0">Creative Photograher And Videographer</h1>
        </div>
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-3">
                {{-- @foreach ($user2 as $item)
                    <div class="col">
                        <div class="row g-0">
                            <div class="col-lg-12 wow fadeIn" data-wow-delay="0.1s">
                                <div class="row g-0 flex-sm-row flex-wrap">
                                    <div class="col-sm-6">
                                        <div class="team-img position-relative aspect-ratio aspect-ratio-4x5">
                                            <img class="img-fluid"
                                                src="{{ asset('storage/foto-profil/' . $item->foto_profil) }}"
                                                alt="{{ $item->username }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="h-100 p-4 d-flex flex-column justify-content-between">
                                            <div class="mb-3">
                                                <h4>{{ $item->nama }}</h4>
                                                <span>{{ $item->skill }}</span>
                                            </div>
                                            <div class="d-flex">
                                                <a class="btn btn-square btn-outline-primary rounded-circle me-2"
                                                    href=""><i class="fab fa-facebook-f"></i></a>
                                                <a class="btn btn-square btn-outline-primary rounded-circle me-2"
                                                    href=""><i class="fab fa-twitter"></i></a>
                                                <a class="btn btn-square btn-outline-primary rounded-circle me-2"
                                                    href=""><i class="fab fa-instagram"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach --}}
            </div>
        </div>
    </div>
    </div>
    <!-- Team End -->



    <!-- Footer Start -->
    <div class="container-fluid footer position-relative bg-dark text-white-50 mt-5 py-5 px-4 px-lg-5 wow fadeIn"
        data-wow-delay="0.1s">
        <div class="row g-5 py-5">
            <div class="col-lg-6 pe-lg-5">
                <a href="index.html" class="navbar-brand">
                    <h1 class="display-5 text-primary">Classy Photography</h1>
                </a>

                <div class="d-flex justify-content-start mt-4">
                    <a class="btn btn-square btn-outline-primary rounded-circle me-2" href="#navbar"><i
                            class="fab fa-twitter"></i></a>
                    <a class="btn btn-square btn-outline-primary rounded-circle me-2" href="#"><i
                            class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-square btn-outline-primary rounded-circle me-2" href="#"><i
                            class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-square btn-outline-primary rounded-circle me-2" href="#"><i
                            class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-6 ps-lg-5">
                <div class="row g-5">

                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Copyright Start -->
    <div class="container-fluid bg-dark text-white border-top border-secondary px-0">
        <div class="d-flex flex-column flex-md-row justify-content-between">
            <div class="py-4 px-5 text-center text-md-start">
                <p class="mb-0">&copy; <a class="text-primary" href="#">Classy Photography</a>. All Rights
                    Reserved.</p>
            </div>
        </div>
    </div>
    <!-- Copyright End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
            class="bi bi-arrow-up"></i></a>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var tambahModal = document.getElementById('tambahModal');
            tambahModal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget; // Button that triggered the modal
                var namaPaket = button.getAttribute(
                    'data-nama_paket'); // Extract info from data-* attribute
                // Update the modal's content
                var modalNamaPaket = tambahModal.querySelector('#nama_paket');

                modalNamaPaket.value = namaPaket;

            });
        });
    </script>

    <!-- JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="landing/lib/wow/wow.min.js"></script>
    <script src="landing/lib/easing/easing.min.js"></script>
    <script src="landing/lib/waypoints/waypoints.min.js"></script>
    <script src="landing/lib/counterup/counterup.min.js"></script>
    <script src="landing/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="landing/lib/lightbox/js/lightbox.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <!-- Template Javascript -->
    <script src="landing/js/main.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.5/main.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@6.1.5/main.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/interaction@6.1.5/main.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>

    <script>
        function updateNavbarColors() {
            var navbar = document.querySelector('.navbar');
            var scrollY = window.scrollY;
            var navLinks = navbar.querySelectorAll('.nav-link');
            var brand = navbar.querySelector('.navbar-brand');
            var buttons = navbar.querySelectorAll('.btn');

            if (scrollY > 50) { // Adjust the threshold as needed
                navLinks.forEach(link => link.style.color = '#000'); // Dark text
                brand.style.color = '#000';
                buttons.forEach(button => {
                    button.classList.remove('btn-outline-primary');
                    button.classList.add('btn-primary');
                });
            } else {
                navLinks.forEach(link => link.style.color = '#000'); // Dark text
                brand.style.color = '#000';
                buttons.forEach(button => {
                    button.classList.remove('btn-primary');
                    button.classList.add('btn-outline-primary');
                });
            }
        }

        window.addEventListener('scroll', updateNavbarColors);
        document.addEventListener('DOMContentLoaded', updateNavbarColors);
    </script>

    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendarModal');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: ['dayGrid'],
                events: [
                    @foreach ($reservasi as $reservation)
                        {
                            title: '{{ $reservation->nama_reservasi }}',
                            start: '{{ $reservation->tanggal_reservasi }}',
                        },
                    @endforeach
                ],
                dateClick: function(info) {
                    // Handle the date click event
                    $('#tanggal_reservasi').val(info.dateStr);
                }
            });

            // Render calendar when modal is shown
            $('#tambahModal').on('shown.bs.modal', function() {
                calendar.render();
            });
        });
    </script> --}}
</body>


<!-- Modal Tambah Reservasi -->
<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="tambahReservasiForm" action="" method="POST"
                novalidate>
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Reservasi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div id='calendarModal'></div>

                    <div class="form-group mt-3">
                        <label class="form-label">Nama Reservasi</label>
                        <input type="text" class="form-control @error('nama_reservasi') is-invalid @enderror"
                            name="nama_reservasi" id="nama_reservasi">
                        @error('nama_reservasi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">Paket</label>
                        <select class="form-control @error('id_paket') is-invalid @enderror" name="id_paket"
                            id="id_paket">
                            <option value="">-- Pilih Paket --</option>
                            {{-- @foreach ($paket as $item)
                                <option value="{{ $item->id_paket }}">{{ $item->nama_paket }} -
                                    {{ $item->harga_paket }}</option>
                            @endforeach --}}
                        </select>
                        @error('id_paket')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">Tanggal Reservasi</label>
                        <input type="datetime-local"
                            class="form-control @error('tanggal_reservasi') is-invalid @enderror"
                            name="tanggal_reservasi" id="tanggal_reservasi">
                        @error('tanggal_reservasi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">Selesai Reservasi</label>
                        <input type="datetime-local" class="form-control" name="selesai_reservasi"
                            id="selesai_reservasi" readonly>
                    </div>


                    <div class="form-group">
                        <label class="form-label">Lokasi Wedding</label>
                        <input type="text" class="form-control @error('lokasi') is-invalid @enderror"
                            name="lokasi" id="lokasi">
                        @error('lokasi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">Jenis Bayar</label>
                        <select class="form-control @error('jenis_bayar') is-invalid @enderror" name="jenis_bayar"
                            id="jenis_bayar">
                            <option value="">-- Pilih Jenis Bayar --</option>
                            <option value="DP">DP</option>
                            <option value="Lunas">Lunas</option>
                        </select>
                        @error('jenis_bayar')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label class="form-label">Nominal Bayar</label>
                        <input type="text" class="form-control @error('nominal_bayar') is-invalid @enderror"
                            name="nominal_bayar" id="nominal_bayar">
                        @error('nominal_bayar')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    {{-- <script>
                        // Data paket diambil dari backend dan dimasukkan ke dalam JavaScript
                        const paketData = @json($paket->keyBy('id_paket'));

                        let harga_paket = 0;

                        document.getElementById('id_paket').addEventListener('change', function() {
                            const id_paket = this.value;
                            if (id_paket) {
                                harga_paket = paketData[id_paket].harga_paket;
                            } else {
                                harga_paket = 0;
                            }
                            updateNominalBayar();
                        });

                        document.getElementById('jenis_bayar').addEventListener('change', updateNominalBayar);

                        function updateNominalBayar() {
                            const jenis_bayar = document.getElementById('jenis_bayar').value;
                            const nominal_bayar_input = document.getElementById('nominal_bayar');

                            if (jenis_bayar === 'DP' && harga_paket > 0) {
                                const dp_amount = harga_paket * 0.3;
                                nominal_bayar_input.value = dp_amount;
                            } else if (jenis_bayar === 'Lunas' && harga_paket > 0) {
                                nominal_bayar_input.value = harga_paket;
                            } else {
                                nominal_bayar_input.value = '';
                            }
                        }
                    </script> --}}
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>




</html>
