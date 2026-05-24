<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Register - SULTRA Explore</title>

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
        .register-card{

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
        .register-btn{

            height: 56px;

            border-radius: 16px;

            font-size: 17px;

            font-weight: 600;

            border: none;

            transition: 0.3s;

        }

        .register-btn:hover{

            transform: translateY(-1px);

        }

        /* PASSWORD */
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

        /* MOBILE */
        @media(max-width: 768px){

            .card-body{

                padding: 35px 25px !important;

            }

        }

    </style>

</head>

<body>

<div class="container min-vh-100 d-flex align-items-center justify-content-center py-5">

    <div class="col-lg-6 col-md-8">

        <div class="card shadow-lg register-card">

            <div class="card-body p-5">

                <!-- TITLE -->
                <div class="text-center mb-5">

                    <h2 class="fw-bold mb-3">

                        Create Account

                    </h2>

                    <p class="text-muted">

                        Daftar akun baru untuk mulai
                        menjelajahi wisata Sulawesi Tenggara

                    </p>

                </div>

                <!-- FORM -->
                <form action="/register-proses"
                      method="POST">

                    @csrf

                    <!-- NAMA -->
                    <div class="mb-4">

                        <label class="form-label fw-semibold mb-2">

                            Nama Lengkap

                        </label>

                        <input type="text"
                               name="name"
                               class="form-control"
                               placeholder="Masukkan nama lengkap"
                               required>

                    </div>

                    <!-- EMAIL -->
                    <div class="mb-4">

                        <label class="form-label fw-semibold mb-2">

                            Email

                        </label>

                        <input type="email"
                               name="email"
                               class="form-control"
                               placeholder="Masukkan email"
                               required>

                    </div>

                    <!-- PASSWORD -->
                    <div class="mb-4">

                        <label class="form-label fw-semibold mb-2">

                            Password

                        </label>

                        <div class="password-wrapper">

                            <input type="password"
                                   name="password"
                                   id="password"
                                   class="form-control pe-5"
                                   placeholder="Masukkan password"
                                   required>

                            <i class="bi bi-eye"
                               id="eyeIcon"
                               onclick="togglePassword()"></i>

                        </div>

                    </div>

                    <!-- BUTTON -->
                    <button type="submit"
                            class="btn btn-success w-100 register-btn">

                        Register

                    </button>

                </form>

                <!-- LOGIN -->
                <div class="text-center mt-4">

                    <p class="text-muted mb-0">

                        Sudah punya akun?

                        <a href="/login"
                           class="text-success fw-semibold text-decoration-none">

                            Login sekarang

                        </a>

                    </p>

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