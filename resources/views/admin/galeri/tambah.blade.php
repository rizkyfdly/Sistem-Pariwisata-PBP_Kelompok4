@extends('layouts.admin')

@section('content')

<!-- HEADER -->
<div class="mb-4">

    <h3 class="fw-bold mb-1">

        Tambah Galeri

    </h3>

    <p class="text-muted mb-0">

        Upload foto galeri wisata

    </p>

</div>

<!-- CARD -->
<div class="card border-0 shadow-sm rounded-4">

    <div class="card-body p-4">

        <form action="/admin/galeri/simpan"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <!-- WISATA -->
            <div class="mb-4">

                <label class="form-label fw-semibold">

                    Pilih Wisata

                </label>

                <select name="tempat_wisata_id"
                        class="form-select p-3 rounded-4">

                    @foreach($wisata as $item)

                        <option value="{{ $item->id }}">

                            {{ $item->nama_tempat }}

                        </option>

                    @endforeach

                </select>

            </div>

            <!-- FOTO -->
            <div class="mb-4">

                <label class="form-label fw-semibold">

                    Upload Foto

                </label>

                <input type="file"
                       name="foto"
                       class="form-control p-3 rounded-4"
                       required>

            </div>

            <!-- BUTTON -->
            <div class="d-flex flex-column flex-md-row gap-3">

                <button class="btn btn-success rounded-pill px-5">

                    Simpan

                </button>

                <a href="/admin/galeri"
                   class="btn btn-light border rounded-pill px-5">

                    Kembali

                </a>

            </div>

        </form>

    </div>

</div>

@endsection