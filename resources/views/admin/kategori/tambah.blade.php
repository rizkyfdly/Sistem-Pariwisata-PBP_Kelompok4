@extends('layouts.admin')

@section('content')

<!-- HEADER -->
<div class="mb-4">

    <h3 class="fw-bold mb-1">

        Tambah Kategori

    </h3>

    <p class="text-muted mb-0">

        Tambahkan kategori wisata baru

    </p>

</div>

<!-- CARD -->
<div class="card border-0 shadow-sm rounded-4">

    <div class="card-body p-4">

        <form action="/admin/kategori/simpan"
              method="POST">

            @csrf

            <!-- INPUT -->
            <div class="mb-4">

                <label class="form-label fw-semibold">

                    Nama Kategori

                </label>

                <input type="text"
                       name="nama_kategori"
                       class="form-control p-3 rounded-4"
                       placeholder="Contoh: Pantai"
                       required>

            </div>

            <!-- BUTTON -->
            <div class="d-flex flex-column flex-md-row gap-3">

                <button class="btn btn-success rounded-pill px-5">

                    Simpan

                </button>

                <a href="/admin/kategori"
                   class="btn btn-light border rounded-pill px-5">

                    Kembali

                </a>

            </div>

        </form>

    </div>

</div>

@endsection