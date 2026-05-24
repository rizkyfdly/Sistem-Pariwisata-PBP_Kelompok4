<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>SULTRA Explore</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        body{

            background: #f5f7fa;

        }

        .hero{

            background:
            linear-gradient(rgba(0,0,0,0.5),
            rgba(0,0,0,0.5)),
            url('{{ asset("bg-kendari.jpeg") }}');

            background-size: cover;
            background-position: center;

            min-height: 500px;

            border-radius: 30px;

            color: white;

            display: flex;
            align-items: center;

            padding: 50px;

        }

        .wisata-card{

            transition: 0.3s;

            border: none;

            border-radius: 24px;

            overflow: hidden;

        }

        .wisata-card:hover{

            transform: translateY(-8px);

        }

        .navbar{

            backdrop-filter: blur(10px);

        }

        .profile-img{

            width: 42px;
            height: 42px;

            object-fit: cover;

        }

        .wisata-card{

            transition: 0.3s;

        }

        .wisata-card:hover{

            transform: translateY(-8px);

        }

    </style>

</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg bg-white shadow-sm sticky-top py-3">

    <div class="container">

        <!-- LOGO -->
        <div class="d-flex align-items-center gap-2">

            <img src="{{ asset('logo.jpeg') }}"
                width="200">

        </div>

        <!-- TOGGLE -->
        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">

            <span class="navbar-toggler-icon"></span>

        </button>

        <!-- MENU -->
        <div class="collapse navbar-collapse"
             id="navbarNav">

            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">

                <li class="nav-item">

                    <a class="nav-link fw-semibold"
                       href="/home">

                        Home

                    </a>

                </li>

                <li class="nav-item">

                    <a class="nav-link fw-semibold"
                       href="#wisata">

                        Destinasi

                    </a>

                </li>

                <!-- PROFILE -->
                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle
                              d-flex align-items-center gap-2"
                       href="#"
                       data-bs-toggle="dropdown">

                        @if(auth()->user()->foto)

                            <img src="{{ asset('foto-user/' . auth()->user()->foto) }}"
                                 class="rounded-circle profile-img">

                        @else

                            <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}"
                                 class="rounded-circle profile-img">

                        @endif

                        <span class="fw-semibold">

                            {{ auth()->user()->name }}

                        </span>

                    </a>

                    <!-- DROPDOWN -->
                    <ul class="dropdown-menu dropdown-menu-end
                               border-0 shadow rounded-4 p-2">

                        <li>

                            <a class="dropdown-item rounded-3 py-2"
                               href="/profil">

                                <i class="bi bi-person me-2"></i>

                                Profile

                            </a>

                        </li>

                        <li>

                            <hr class="dropdown-divider">

                        </li>

                        <li>

                            <a class="dropdown-item rounded-3 py-2 text-danger"
                               href="/logout">

                                <i class="bi bi-box-arrow-right me-2"></i>

                                Logout

                            </a>

                        </li>

                    </ul>

                </li>

            </ul>

        </div>

    </div>

</nav>

<!-- WELCOME -->
<div class="container py-5">

    <div class="bg-white shadow-sm rounded-5 p-4 p-lg-5 border-0">

        <div class="row align-items-center">

            <div class="col-lg-8">

                <span class="text-success fw-semibold small">

                    Dashboard User

                </span>

                <h2 class="fw-bold mt-2 mb-3">

                    Halo, {{ auth()->user()->name }} 👋

                </h2>

                <p class="text-muted fs-5 mb-4"
                   style="max-width: 700px; line-height: 1.8;">

                    Selamat datang kembali di SULTRA Explore.
                    Kamu bisa melihat berbagai informasi wisata,
                    menemukan tempat menarik,
                    dan menikmati pengalaman menjelajah
                    Sulawesi Tenggara langsung dari dashboard ini.

                </p>

                <div class="d-flex flex-wrap gap-3">

                    <a href="#wisata"
                       class="btn btn-success rounded-pill px-4 py-2">

                        Lihat Wisata

                    </a>

                    <a href="/profil"
                       class="btn btn-outline-secondary rounded-pill px-4 py-2">

                        Profile Saya

                    </a>

                </div>

            </div>

            <div class="col-lg-4">

            </div>

        </div>

    </div>

</div>

<!-- WISATA -->
<div class="container pb-5"
     id="wisata">

    <!-- TITLE -->
    <div class="text-center mb-5">

        <h2 class="fw-bold">

            Destinasi Wisata

        </h2>

        <p class="text-muted">

            Jelajahi wisata populer
            Sulawesi Tenggara

        </p>

    </div>

    <!-- CARD WISATA -->
    <div class="row g-4">

        @foreach($wisata as $item)

        <div class="col-md-6 col-lg-4">

            <div class="card border-0 shadow-sm h-100 rounded-5 overflow-hidden wisata-card">

                <!-- GAMBAR -->
                <div class="position-relative">

                    <img src="{{ asset('gambar-wisata/' . $item->gambar) }}"
                        class="w-100"
                        style="
                            height: 240px;
                            object-fit: cover;
                        ">

                    <!-- BADGE -->
                    <div class="position-absolute top-0 start-0 p-3">

                        <span class="badge bg-success rounded-pill px-3 py-2">

                            {{ $item->kategori->nama_kategori ?? 'Wisata' }}

                        </span>

                    </div>

                </div>

                <!-- BODY -->
                <div class="card-body p-4 d-flex flex-column">

                    <!-- NAMA -->
                    <h4 class="fw-bold mb-3">

                        {{ $item->nama_tempat }}

                    </h4>

                    <!-- LOKASI -->
                    <p class="text-muted mb-3">

                        <i class="bi bi-geo-alt-fill text-success me-1"></i>

                        {{ $item->lokasi }}

                    </p>

                    <!-- DESKRIPSI -->
                    <p class="text-muted"
                    style="line-height: 1.8;">

                        {{ Str::limit($item->deskripsi, 100) }}

                    </p>

                    <!-- BUTTON -->
                    <div class="mt-auto pt-3">

                        <a href="/wisata/{{ $item->id }}"
                        class="btn btn-success rounded-pill px-4">

                            Lihat Detail

                        </a>

                    </div>

                </div>

            </div>

        </div>

        @endforeach

    </div>

</div>

<!-- FOOTER -->
<footer class="bg-dark text-white text-center py-4">

    SULTRA Explore © 2026 | Sistem Informasi Katalog Pariwisata Sulawesi Tenggara

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>