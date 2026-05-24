<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Profile User</title>

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

        .profile-card{

            border-radius: 30px;

            overflow: hidden;

        }

        .profile-img{

            width: 130px;
            height: 130px;

            object-fit: cover;

        }

    </style>

</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg bg-white shadow-sm sticky-top py-3">

    <div class="container">

        <!-- LOGO -->
        <a class="navbar-brand fw-bold text-success"
           href="/home">

            <div class="d-flex align-items-center gap-2">

                <img src="{{ asset('logo.jpeg') }}"
                     width="200">

            </div>

        </a>

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

                    <a class="nav-link active fw-semibold text-success"
                       href="/profil">

                        Profile

                    </a>

                </li>

                <!-- DROPDOWN -->
                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle
                              d-flex align-items-center gap-2"
                       href="#"
                       data-bs-toggle="dropdown">

                        @if(auth()->user()->foto)

                            <img src="{{ asset('foto-user/' . auth()->user()->foto) }}"
                                 class="rounded-circle"
                                 width="40"
                                 height="40"
                                 style="object-fit: cover;">

                        @else

                            <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}"
                                 class="rounded-circle"
                                 width="40">

                        @endif

                        <span class="fw-semibold">

                            {{ auth()->user()->name }}

                        </span>

                    </a>

                    <!-- DROPDOWN MENU -->
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

<!-- PROFILE -->
<div class="container py-5">

    <div class="card border-0 shadow-sm profile-card">

        <div class="card-body p-4 p-lg-5">

            <div class="row align-items-center">

                <!-- FOTO -->
                <div class="col-lg-3 text-center mb-4 mb-lg-0">

                    @if(auth()->user()->foto)

                        <img src="{{ asset('foto-user/' . auth()->user()->foto) }}"
                             class="rounded-circle shadow profile-img">

                    @else

                        <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}"
                             class="rounded-circle shadow profile-img">

                    @endif

                </div>

                <!-- INFO -->
                <div class="col-lg-9">

                    <span class="badge bg-success px-3 py-2 mb-3">

                        User Profile

                    </span>

                    <h2 class="fw-bold mb-2">

                        {{ auth()->user()->name }}

                    </h2>

                    <p class="text-muted mb-4">

                        {{ auth()->user()->email }}

                    </p>

                    <!-- INFO BOX -->
                    <div class="row g-3 mb-4">

                        <!-- BIO -->
                        <div class="col-md-6">

                            <div class="bg-light rounded-4 p-4 h-100">

                                <small class="text-muted d-block mb-2">

                                    Bio

                                </small>

                                <div class="fw-semibold">

                                    {{ auth()->user()->bio ?? 'Belum ada bio.' }}

                                </div>

                            </div>

                        </div>

                        <!-- NO HP -->
                        <div class="col-md-6">

                            <div class="bg-light rounded-4 p-4 h-100">

                                <small class="text-muted d-block mb-2">

                                    No HP

                                </small>

                                <div class="fw-semibold">

                                    {{ auth()->user()->no_hp ?? '-' }}

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- BUTTON -->
                    <a href="/profil/edit"
                       class="btn btn-success rounded-pill px-4 py-2">

                        <i class="bi bi-pencil-square me-2"></i>

                        Edit Profile

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>