@extends('layouts.admin')

@section('content')

<!-- HEADER -->
<div class="d-flex flex-column flex-md-row
            justify-content-between
            align-items-md-center
            gap-3
            mb-4">

    <div>

        <h3 class="fw-bold mb-1">

            Data Galeri

        </h3>

        <p class="text-muted mb-0">

            Kelola galeri foto wisata

        </p>

    </div>

    <!-- BUTTON -->
    <a href="/admin/galeri/tambah"
       class="btn btn-success rounded-pill px-4">

        <i class="bi bi-plus-circle me-2"></i>

        Tambah Galeri

    </a>

</div>

<!-- CARD -->
<div class="card border-0 shadow-sm rounded-4">

    <div class="card-body">

        <div class="table-responsive">

            <table class="table align-middle">

                <thead>

                    <tr>

                        <th>Foto</th>
                        <th>Wisata</th>
                        <th width="200"
                            class="text-center">

                            Aksi

                        </th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($galeri as $item)

                    <tr>

                        <!-- FOTO -->
                        <td>

                            <img src="{{ asset('galeri/' . $item->foto) }}"
                                 width="120"
                                 height="80"
                                 class="rounded-4 shadow-sm"
                                 style="object-fit: cover;">

                        </td>

                        <!-- WISATA -->
                        <td>

                            <span class="fw-semibold">

                                {{ $item->wisata->nama_tempat}}

                            </span>

                        </td>

                        <!-- AKSI -->
                        <td class="text-center">

                            <div class="d-flex gap-2 justify-content-center">

                                <!-- EDIT -->
                                <a href="/admin/galeri/edit/{{ $item->id }}"
                                class="btn btn-sm btn-light border rounded-circle action-btn">

                                    <i class="bi bi-pencil-square text-success"></i>

                                </a>

                                <!-- DELETE -->
                                <form action="/admin/galeri/delete/{{ $item->id }}"
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