@extends('layouts.admin')

@section('content')

<!-- HEADER -->
<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">

    <div>

        <h3 class="fw-bold mb-1">

            Edit Profile

        </h3>

        <p class="text-muted mb-0">

            Kelola informasi akun admin

        </p>

    </div>

    <!-- BUTTON KEMBALI -->
    <a href="/admin"
       class="btn btn-outline-success rounded-pill px-4">

        <i class="bi bi-arrow-left me-1"></i>
        Kembali

    </a>

</div>

<div class="card border-0 shadow-sm rounded-4">

    <div class="card-body p-4">

        <form action="/profil/update"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <!-- FOTO -->
            <div class="text-center mb-4">

                @if(auth()->user()->foto)

                    <img src="{{ asset('foto-user/' . auth()->user()->foto) }}"
                         width="120"
                         height="120"
                         class="rounded-circle shadow"
                         style="object-fit: cover;">

                @else

                    <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}"
                         width="120"
                         height="120"
                         class="rounded-circle shadow"
                         style="object-fit: cover;">

                @endif

            </div>

            <!-- FOTO PROFILE -->
            <div class="mb-4">

                <label class="form-label fw-semibold">

                    Foto Profile

                </label>

                <input type="file"
                       name="foto"
                       class="form-control rounded-4 p-3">

            </div>

            <!-- NAMA -->
            <div class="mb-4">

                <label class="form-label fw-semibold">

                    Nama

                </label>

                <input type="text"
                       name="name"
                       value="{{ auth()->user()->name }}"
                       class="form-control rounded-4 p-3">

            </div>

            <!-- BIO -->
            <div class="mb-4">

                <label class="form-label fw-semibold">

                    Bio

                </label>

                <textarea name="bio"
                          rows="4"
                          class="form-control rounded-4 p-3">{{ auth()->user()->bio }}</textarea>

            </div>

            <!-- NO HP -->
            <div class="mb-4">

                <label class="form-label fw-semibold">

                    No HP

                </label>

                <input type="text"
                       name="no_hp"
                       value="{{ auth()->user()->no_hp }}"
                       class="form-control rounded-4 p-3">

            </div>

            <!-- BUTTON -->
            <div class="d-flex gap-3 flex-wrap">

                <button class="btn btn-success rounded-pill px-5">

                    Update Profile

                </button>

                <a href="/admin"
                   class="btn btn-light border rounded-pill px-5">

                    Batal

                </a>

            </div>

        </form>

    </div>

</div>

@endsection