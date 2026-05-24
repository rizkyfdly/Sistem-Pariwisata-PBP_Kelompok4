<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Edit Profile</title>

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

        .edit-card{

            border-radius: 30px;

        }

    </style>

</head>

<body>

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card border-0 shadow-sm edit-card">

                <div class="card-body p-4 p-lg-5">

                    <!-- TITLE -->
                    <div class="mb-4">

                        <h2 class="fw-bold">

                            Edit Profile

                        </h2>

                        <p class="text-muted">

                            Perbarui informasi profile kamu.

                        </p>

                    </div>

                    <!-- FORM -->
                    <form action="/profil/update"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf

                        <!-- FOTO -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold">

                                Foto Profile

                            </label>

                            <input type="file"
                                   name="foto"
                                   class="form-control">

                        </div>

                        <!-- NAMA -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold">

                                Nama

                            </label>

                            <input type="text"
                                   name="name"
                                   class="form-control"
                                   value="{{ auth()->user()->name }}">

                        </div>

                        <!-- BIO -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold">

                                Bio

                            </label>

                            <textarea name="bio"
                                      rows="4"
                                      class="form-control">{{ auth()->user()->bio }}</textarea>

                        </div>

                        <!-- NO HP -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold">

                                No HP

                            </label>

                            <input type="text"
                                   name="no_hp"
                                   class="form-control"
                                   value="{{ auth()->user()->no_hp }}">

                        </div>

                        <!-- BUTTON -->
                        <div class="d-flex gap-3">

                            <button class="btn btn-success rounded-pill px-4">

                                <i class="bi bi-check-circle me-2"></i>

                                Update Profile

                            </button>

                            <a href="/profil"
                               class="btn btn-light rounded-pill px-4">

                                Kembali

                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>