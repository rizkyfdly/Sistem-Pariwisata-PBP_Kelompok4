@extends('layouts.admin')

@section('content')

<style>
    .action-btn{

        width: 38px;
        height: 38px;

        display: flex;
        align-items: center;
        justify-content: center;

        transition: 0.2s;

    }

    .action-btn:hover{

        transform: scale(1.05);

        background: #f8f9fa;

    }
</style>

<!-- HEADER -->
<div class="d-flex flex-column flex-md-row
            justify-content-between
            align-items-md-center
            mb-4 gap-3">

    <div>

        <h3 class="fw-bold mb-1">

            Data Wisata

        </h3>

        <p class="text-muted mb-0">

            Kelola seluruh data wisata
            SULTRA Explore

        </p>

    </div>

    <!-- BUTTON -->
    <a href="/admin/wisata/tambah"
       class="btn btn-success rounded-pill px-4">

        <i class="bi bi-plus-circle me-2"></i>

        Tambah Wisata

    </a>

</div>

<!-- CARD TABLE -->
<div class="card border-0 shadow-sm rounded-4">

    <div class="card-body">

        <!-- TABLE RESPONSIVE -->
        <div class="table-responsive">

            <table class="table align-middle">

                <thead>

                    <tr>

                        <th>Gambar</th>
                        <th>Nama Wisata</th>
                        <th>Lokasi</th>
                        <th>Kategori</th>
                        <th width="180"
                             class="text-center">

                            Aksi

                        </th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($wisata as $item)

                    <tr>

                        <!-- IMAGE -->
                        <td>

                            <img src="{{ asset('gambar-wisata/' . $item->gambar) }}"
                                 width="90"
                                 height="70"
                                 class="rounded-3"
                                 style="object-fit: cover;">

                        </td>

                        <!-- NAMA -->
                        <td>

                            <div class="fw-semibold">

                                {{ $item->nama_tempat }}

                            </div>

                        </td>

                        <!-- LOKASI -->
                        <td>

                            <span class="text-muted">

                                {{ $item->lokasi }}

                            </span>

                        </td>

                        <!-- KATEGORI -->
                        <td>

                            <span class="badge bg-success">

                                {{ $item->kategori->nama_kategori }}

                            </span>

                        </td>

                        <!-- AKSI -->
                        <td class="text-center">

                            <div class="d-flex gap-2 justify-content-center">

                                <!-- EDIT -->
                                <a href="/admin/wisata/edit/{{ $item->id }}"
                                class="btn btn-sm btn-light border rounded-circle action-btn">

                                    <i class="bi bi-pencil-square text-success"></i>

                                </a>

                                <!-- DELETE -->
                                <form action="/admin/wisata/delete/{{ $item->id }}"
                                    method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-sm btn-light border rounded-circle action-btn"
                                            onclick="return confirm('Yakin hapus data?')">

                                        <i class="bi bi-trash text-danger"></i>

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection