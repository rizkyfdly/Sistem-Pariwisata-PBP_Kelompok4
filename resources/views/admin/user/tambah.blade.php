@extends('layouts.admin')

@section('content')

<!-- HEADER -->
<div class="mb-4">

    <h3 class="fw-bold mb-1">

        Tambah User

    </h3>

    <p class="text-muted mb-0">

        Tambahkan pengguna baru

    </p>

</div>

<!-- CARD -->
<div class="card border-0 shadow-sm rounded-4">

    <div class="card-body p-4">

        <form action="/admin/user/simpan"
              method="POST">

            @csrf

            <!-- NAMA -->
            <div class="mb-4">

                <label class="form-label fw-semibold">

                    Nama

                </label>

                <input type="text"
                       name="name"
                       class="form-control p-3 rounded-4"
                       required>

            </div>

            <!-- EMAIL -->
            <div class="mb-4">

                <label class="form-label fw-semibold">

                    Email

                </label>

                <input type="email"
                       name="email"
                       class="form-control p-3 rounded-4"
                       required>

            </div>

            <!-- PASSWORD -->
            <div class="mb-4">

                <label class="form-label fw-semibold">

                    Password

                </label>

                <input type="password"
                       name="password"
                       class="form-control p-3 rounded-4"
                       required>

            </div>

            <!-- ROLE -->
            <div class="mb-4">

                <label class="form-label fw-semibold">

                    Role

                </label>

                <select name="role"
                        class="form-select p-3 rounded-4">

                    <option value="user">

                        User

                    </option>

                    <option value="admin">

                        Admin

                    </option>

                </select>

            </div>

            <!-- BUTTON -->
            <div class="d-flex flex-column flex-md-row gap-3">

                <button class="btn btn-success rounded-pill px-5">

                    Simpan

                </button>

                <a href="/admin/user"
                   class="btn btn-light border rounded-pill px-5">

                    Kembali

                </a>

            </div>

        </form>

    </div>

</div>

@endsection