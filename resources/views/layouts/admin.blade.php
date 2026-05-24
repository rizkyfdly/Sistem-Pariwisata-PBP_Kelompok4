<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Admin - SULTRA Explore</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        body{

            background: #f5f7fa;
            overflow-x: hidden;

        }

        /* SIDEBAR */
        .sidebar{

            width: 260px;
            height: 100vh;

            background: white;

            position: fixed;
            top: 0;
            left: 0;

            padding: 25px 20px;

            border-right: 1px solid #eee;

            transition: 0.3s;
            z-index: 999;

            overflow-y: auto;

        }

        /* HIDDEN MOBILE */
        @media(max-width: 991px){

            .sidebar{

                left: -260px;

            }

            .sidebar.show{

                left: 0;

            }

            .content{

                margin-left: 0 !important;

            }

        }

        /* MENU */
        .sidebar a{

            display: flex;
            align-items: center;
            gap: 12px;

            text-decoration: none;

            color: #333;

            padding: 14px 18px;

            border-radius: 14px;

            margin-bottom: 10px;

            transition: 0.3s;

            font-weight: 500;

        }

        .sidebar a:hover{

            background: #198754;
            color: white;

        }

        .sidebar .active{

            background: #198754;
            color: white;

        }

        /* CONTENT */
        .content{

            margin-left: 260px;
            padding: 25px;

            transition: 0.3s;

        }

        /* TOPBAR */
        .topbar{

            background: white;

            padding: 18px 25px;

            border-radius: 20px;

            margin-bottom: 30px;

        }

        .logo{

            max-height: 80px;

        }

        .menu-title{

            font-size: 13px;
            color: gray;

            margin-top: 20px;
            margin-bottom: 10px;

            padding-left: 10px;

        }

        /* TOGGLE BUTTON */
        .toggle-btn{

            border: none;
            background: #198754;
            color: white;

            width: 45px;
            height: 45px;

            border-radius: 12px;

            display: none;

        }

        @media(max-width: 991px){

            .toggle-btn{

                display: block;

            }

        }

    </style>

</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar"
     id="sidebar">

    <!-- LOGO -->
    <div class="text-center mb-4">

        <img src="{{ asset('logo.jpeg') }}"
             class="img-fluid logo">

    </div>

    <!-- MENU -->
    <p class="menu-title">

        MENU

    </p>

    <a href="/admin"
       class="active">

        <i class="bi bi-grid"></i>
        Dashboard

    </a>

    <a href="/admin/wisata">

        <i class="bi bi-geo-alt"></i>
        Data Wisata

    </a>

    <a href="/admin/kategori">

        <i class="bi bi-tags"></i>
        Kategori

    </a>

    <a href="/admin/galeri">

        <i class="bi bi-images"></i>
        Galeri

    </a>

    <a href="/admin/ulasan">

        <i class="bi bi-chat-left-text"></i>
        Ulasan

    </a>

    <a href="/admin/user">

        <i class="bi bi-people"></i>
        User

    </a>

    <hr>

    <a href="/logout">

        <i class="bi bi-box-arrow-right"></i>
        Logout

    </a>

</div>

<!-- CONTENT -->
<div class="content">

    <!-- TOPBAR -->
 <div class="topbar shadow-sm d-flex justify-content-between align-items-center">

        <div class="d-flex align-items-center gap-3">

            <!-- BUTTON -->
            <button class="toggle-btn"
                    id="toggleBtn">

                <i class="bi bi-list"></i>

            </button>

            <div>

                <h4 class="fw-bold mb-0">

                    Admin Dashboard

                </h4>

                <small class="text-muted">

                    Welcome back, Admin

                </small>

            </div>

        </div>

        <!-- PROFILE DROPDOWN -->
        <div class="dropdown">

            <button class="btn btn-light border
                        rounded-pill px-3 py-2
                        d-flex align-items-center gap-2"
                    data-bs-toggle="dropdown">

                <!-- FOTO -->
                @if(auth()->user()->foto)

                    <img src="{{ asset('foto-user/' . auth()->user()->foto) }}"
                        width="40"
                        height="40"
                        class="rounded-circle"
                        style="object-fit: cover;">

                @else

                    <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}"
                        width="40"
                        class="rounded-circle">

                @endif

                <!-- NAMA -->
                <span class="fw-semibold d-none d-md-block">

                    {{ auth()->user()->name }}

                </span>

                <i class="bi bi-chevron-down small"></i>

            </button>

            <!-- DROPDOWN -->
            <ul class="dropdown-menu dropdown-menu-end
                    border-0 shadow rounded-4 p-2">

                <li>

                    <a class="dropdown-item rounded-3 py-2"
                    href="/admin/profil">

                        <i class="bi bi-person me-2"></i>

                        Lihat/Edit Profile

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

        </div>

    </div>

    <!-- PAGE CONTENT -->
    @yield('content')

</div>

<!-- SCRIPT -->
<script>

    const toggleBtn =
        document.getElementById('toggleBtn');

    const sidebar =
        document.getElementById('sidebar');

    toggleBtn.onclick = function(){

        sidebar.classList.toggle('show');

    }

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>