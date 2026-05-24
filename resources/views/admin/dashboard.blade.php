@extends('layouts.admin')

@section('content')

<!-- WELCOME -->
<div class="card border-0 shadow-sm rounded-4 mb-4 overflow-hidden">

    <div class="card-body p-4 p-lg-5">

        <div class="row align-items-center">

            <!-- TEXT -->
            <div class="col-lg-8">

                <span class="badge bg-success px-3 py-2 mb-3">

                    Admin Panel

                </span>

                <h2 class="fw-bold mb-3">

                    Selamat Datang Admin 👋

                </h2>

                <p class="text-muted mb-0">

                    Kelola data wisata, kategori,
                    galeri, user, dan ulasan
                    dengan mudah melalui dashboard
                    SULTRA Explore.

                </p>

            </div>

            <!-- ICON -->
            <div class="col-lg-4 text-center mt-4 mt-lg-0">

                <div class="display-1 text-success">

                    <i class="bi bi-globe-asia-australia"></i>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- STATISTIC -->
<div class="row">

    <!-- WISATA -->
    <div class="col-12 col-sm-6 col-xl-3 mb-4">

        <div class="card border-0 shadow-sm rounded-4 h-100">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <p class="text-muted mb-2">

                            Total Wisata

                        </p>

                        <h2 class="fw-bold">

                            {{ $jumlahWisata }}

                        </h2>

                    </div>

                    <div class="fs-1 text-success">

                        <i class="bi bi-geo-alt"></i>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- KATEGORI -->
    <div class="col-12 col-sm-6 col-xl-3 mb-4">

        <div class="card border-0 shadow-sm rounded-4 h-100">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <p class="text-muted mb-2">

                            Kategori

                        </p>

                        <h2 class="fw-bold">

                            {{ $jumlahKategori }}

                        </h2>

                    </div>

                    <div class="fs-1 text-success">

                        <i class="bi bi-tags"></i>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- USER -->
    <div class="col-12 col-sm-6 col-xl-3 mb-4">

        <div class="card border-0 shadow-sm rounded-4 h-100">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <p class="text-muted mb-2">

                            User

                        </p>

                        <h2 class="fw-bold">

                            {{ $jumlahUser }}

                        </h2>

                    </div>

                    <div class="fs-1 text-success">

                        <i class="bi bi-people"></i>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- ULASAN -->
    <div class="col-12 col-sm-6 col-xl-3 mb-4">

        <div class="card border-0 shadow-sm rounded-4 h-100">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <p class="text-muted mb-2">

                            Ulasan

                        </p>

                        <h2 class="fw-bold">

                            {{ $jumlahUlasan }}

                        </h2>

                    </div>

                    <div class="fs-1 text-success">

                        <i class="bi bi-chat-left-text"></i>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection