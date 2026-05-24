<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>SULTRA Explore</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>

        .wisata-card{
            transition: 0.3s ease;
        }

        .wisata-card:hover{
            transform: translateY(-10px);
        }

        @media(max-width: 991px){

            .navbar-collapse{

                margin-top: 15px;

                padding-top: 10px;

            }

            .navbar-nav .nav-item{

                margin-bottom: 10px;

            }

        }

    </style>

</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg bg-white shadow-sm py-3">

    <div class="container">

        <!-- Logo -->
        <a class="navbar-brand d-flex align-items-center"
           href="/">

            <img src="{{ asset('logo.jpeg') }}"
                 alt="Logo"
                 width="180">

        </a>

        <!-- Button Mobile -->
        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">

            <span class="navbar-toggler-icon"></span>

        </button>

        <!-- Menu -->
        <div class="collapse navbar-collapse"
            id="navbarNav">

            <ul class="navbar-nav ms-auto align-items-lg-center">

                <li class="nav-item me-3">

                    <a class="nav-link fw-semibold"
                    href="/">

                        Home

                    </a>

                </li>

                <li class="nav-item me-3">

                    <a class="nav-link fw-semibold"
                    href="#wisata">

                        Destination

                    </a>

                </li>

                <li class="nav-item me-3">

                    <a class="nav-link fw-semibold"
                    href="#contact">

                        Contact

                    </a>

                </li>

                <li class="nav-item">

                    <a href="/login"
                    class="btn btn-success rounded-pill px-4">

                        Login

                    </a>

                </li>

            </ul>

        </div>

    </div>

</nav>

<!-- HERO SECTION -->
<section class="py-5">

    <div class="container">

        <div class="row align-items-center">

            <!-- Text -->
            <div class="col-lg-6">

                <span class="badge bg-success mb-3 px-3 py-2">
                    Explore Sulawesi Tenggara
                </span>

                <h1 class="display-3 fw-bold mb-4">

                    Jelajahi Keindahan
                    <span class="text-success">
                        Sulawesi Tenggara
                    </span>

                </h1>

                <p class="lead text-muted mb-4">

                    Temukan destinasi wisata terbaik,
                    budaya lokal, dan keindahan alam
                    Sulawesi Tenggara bersama
                    SULTRA Explore.

                </p>

                <div class="d-flex gap-3">

                    <a href="#wisata"
                       class="btn btn-success btn-lg rounded-pill px-4">

                        Jelajahi Sekarang

                    </a>

                </div>

            </div>

            <!-- Image -->
            <div class="col-lg-6 text-center mt-5 mt-lg-0">

                <img src="{{ asset('kamali.jpeg') }}"
                     class="img-fluid shadow-lg rounded-4"
                     style="
                        height: 500px;
                        width: 100%;
                        object-fit: cover;
                     ">

            </div>

        </div>

    </div>

</section>

<!-- SECTION WISATA -->
<div class="container py-5"
     id="wisata">

    <!-- Judul -->
    <div class="text-center mb-5">

        <h2 class="fw-bold">

            Destinasi Wisata Populer

        </h2>

        <p class="text-muted">

            Jelajahi tempat wisata terbaik
            di Sulawesi Tenggara

        </p>

    </div>

    <div class="row">

        <!-- Card 1 -->
        <div class="col-md-4 mb-4">

            <div class="card border-0 shadow-lg rounded-4 overflow-hidden h-100 wisata-card">

                <img src="nirwana.jpeg"
                     class="card-img-top"
                     style="
                        height: 300px;
                        object-fit: cover;
                     ">

                <div class="card-body">

                    <h4 class="fw-bold">

                        Pantai Nirwana

                    </h4>

                    <p class="text-muted">

                        Wisata pantai indah dengan
                        pasir putih dan laut biru
                        di Kota Baubau.

                    </p>

                    <a href="/login"
                       class="btn btn-success rounded-pill px-4">

                        Lihat Detail

                    </a>

                </div>

            </div>

        </div>

        <!-- Card 2 -->
        <div class="col-md-4 mb-4">

            <div class="card border-0 shadow-lg rounded-4 overflow-hidden h-100 wisata-card">

                <img src="napabale.jpeg"
                     class="card-img-top"
                     style="
                        height: 300px;
                        object-fit: cover;
                     ">

                <div class="card-body">

                    <h4 class="fw-bold">

                        Danau Napabale

                    </h4>

                    <p class="text-muted">

                        Tempat wisata favorit masyarakat
                        dengan pemandangan danau yang indah serta air nya yang jernih.

                    </p>

                    <a href="/login"
                       class="btn btn-success rounded-pill px-4">

                        Lihat Detail

                    </a>

                </div>

            </div>

        </div>

        <!-- Card 3 -->
        <div class="col-md-4 mb-4">

            <div class="card border-0 shadow-lg rounded-4 overflow-hidden h-100 wisata-card">

                <img src="teletabis.jpeg"
                     class="card-img-top"
                     style="
                        height: 300px;
                        object-fit: cover;
                     ">

                <div class="card-body">


                    <h4 class="fw-bold">

                        Bukit Teletubbies

                    </h4>

                    <p class="text-muted">

                        Wisata alam dengan
                        panorama perbukitan yang indah.

                    </p>

                    <a href="/login"
                       class="btn btn-success rounded-pill px-4">

                        Lihat Detail

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- CONTACT -->
<section class="py-5 bg-light"
         id="contact">

    <div class="container">

        <div class="row align-items-center">

            <!-- Logo -->
            <div class="col-lg-5 text-center mb-4 mb-lg-0">

                <img src="{{ asset('logo-asli.jpeg') }}"
                     class="img-fluid"
                     style="max-height: 350px;">

            </div>

            <!-- Contact Info -->
            <div class="col-lg-7">

                <h2 class="fw-bold mb-4">

                    Contact Us

                </h2>

                <p class="text-muted mb-4">

                    SULTRA Explore hadir untuk membantu
                    masyarakat menemukan destinasi wisata
                    terbaik di Sulawesi Tenggara secara
                    modern dan mudah diakses.

                </p>

                <div class="mb-3">

                    <h5 class="fw-semibold">

                        Email

                    </h5>

                    <p class="text-muted">

                        sultraexplore@gmail.com

                    </p>

                </div>

                <div class="mb-3">

                    <h5 class="fw-semibold">

                        Instagram

                    </h5>

                    <p class="text-muted">

                        @sultraexplore

                    </p>

                </div>

                <div class="mb-3">

                    <h5 class="fw-semibold">

                        Lokasi

                    </h5>

                    <p class="text-muted">

                        Sulawesi Tenggara, Indonesia

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- Footer -->
<footer class="bg-dark text-white text-center p-3 mt-5">

    SULTRA Explore © 2026 | Sistem Informasi Katalog Pariwisata Sulawesi Tenggara

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>