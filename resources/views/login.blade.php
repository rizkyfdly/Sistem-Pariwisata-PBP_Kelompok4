<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Login - SULTRA Explore</title>

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

        /* CARD */
        .login-card{

            border: none;

            border-radius: 28px;

            overflow: hidden;

        }

        /* INPUT */
        .form-control{

            height: 56px;

            border-radius: 16px;

            border: 1px solid #dcdfe4;

            padding-left: 18px;

            font-size: 15px;

            box-shadow: none !important;

        }

        .form-control:focus{

            border-color: #198754;

        }

        /* BUTTON */
        .login-btn{

            height: 56px;

            border-radius: 16px;

            font-size: 17px;

            font-weight: 600;

            border: none;

            transition: 0.3s;

        }

        .login-btn:hover{

            transform: translateY(-1px);

        }

        /* PASSWORD ICON */
        .password-wrapper{

            position: relative;

        }

        .password-wrapper i{

            position: absolute;

            top: 50%;
            right: 18px;

            transform: translateY(-50%);

            cursor: pointer;

            color: #888;

            font-size: 18px;

        }

        /* TEXT */
        .welcome-title{

            font-size: 52px;

            font-weight: 800;

            line-height: 1.2;

        }

        .welcome-text{

            font-size: 18px;

            color: #6c757d;

            line-height: 1.8;

        }

        /* MOBILE */
        @media(max-width: 991px){

            .welcome-title{

                font-size: 36px;

            }

            .welcome-text{

                font-size: 16px;

            }

            .card-body{

                padding: 35px 25px !important;

            }

        }

    </style>

</head>

<body>

<div class="container min-vh-100 d-flex align-items-center py-5">

    <div class="row w-100 align-items-center g-5">

        <!-- LEFT -->
        <div class="col-lg-6 text-center">

            <img src="{{ asset('logo-asli.jpeg') }}"
                 class="img-fluid mb-4"
                 style="max-height: 340px;">

            <h1 class="welcome-title">

                Selamat Datang di
                <span class="text-success">

                    SULTRA Explore

                </span>

            </h1>

            <p class="welcome-text mt-4">

                Temukan destinasi wisata terbaik
                di Sulawesi Tenggara dengan tampilan
                modern dan pengalaman yang nyaman.

            </p>

        </div>

        <!-- RIGHT -->
        <div class="col-lg-6">

            <div class="card shadow-lg login-card">

                <div class="card-body p-5">

                    <h2 class="fw-bold text-center mb-5">

                        Login Account

                    </h2>

                    <!-- ERROR -->
                    @if(session('error'))

                        <div class="alert alert-danger rounded-4">

                            {{ session('error') }}

                        </div>

                    @endif

                    <!-- FORM -->
                    <form action="/login"
                          method="POST">

                        @csrf

                        <!-- EMAIL -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold mb-2">

                                Email

                            </label>

                            <input type="email"
                                   name="email"
                                   class="form-control"
                                   placeholder="Masukkan email">

                        </div>

                        <!-- PASSWORD -->
                        <div class="mb-3">

                            <label class="form-label fw-semibold mb-2">

                                Password

                            </label>

                            <div class="password-wrapper">

                                <input type="password"
                                       name="password"
                                       id="password"
                                       class="form-control pe-5"
                                       placeholder="Masukkan password">

                                <i class="bi bi-eye"
                                   id="eyeIcon"
                                   onclick="togglePassword()"></i>

                            </div>

                        </div>

                        <!-- REMEMBER -->
                        <div class="form-check mb-4">

                            <input class="form-check-input"
                                   type="checkbox"
                                   name="remember"
                                   id="remember">

                            <label class="form-check-label"
                                   for="remember">

                                Ingat password saya

                            </label>

                        </div>

                        <!-- BUTTON -->
                        <button type="submit"
                                class="btn btn-success w-100 login-btn">

                            Login

                        </button>

                    </form>

                    <!-- REGISTER -->
                    <div class="text-center mt-4">

                        <p class="text-muted mb-0">

                            Belum punya akun?

                            <a href="/register"
                               class="text-success fw-semibold text-decoration-none">

                                Register sekarang

                            </a>

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

<script>

    function togglePassword(){

        const password =
            document.getElementById('password');

        const eyeIcon =
            document.getElementById('eyeIcon');

        if(password.type === 'password'){

            password.type = 'text';

            eyeIcon.classList.remove('bi-eye');

            eyeIcon.classList.add('bi-eye-slash');

        }else{

            password.type = 'password';

            eyeIcon.classList.remove('bi-eye-slash');

            eyeIcon.classList.add('bi-eye');

        }

    }

</script>

</body>
</html>