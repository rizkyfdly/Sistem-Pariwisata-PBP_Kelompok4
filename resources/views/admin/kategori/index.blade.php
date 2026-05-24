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

            Data Kategori

        </h3>

        <p class="text-muted mb-0">

            Kelola kategori wisata
            SULTRA Explore

        </p>

    </div>

    <!-- BUTTON -->
    <a href="/admin/kategori/tambah"
       class="btn btn-success rounded-pill px-4">

        <i class="bi bi-plus-circle me-2"></i>

        Tambah Kategori

    </a>

</div>

<!-- CARD -->
<div class="card border-0 shadow-sm rounded-4">

    <div class="card-body">

        <div class="table-responsive">

            <table class="table align-middle">

                <thead>

                    <tr>

                        <th width="100">

                            No

                        </th>

                        <th>

                            Nama Kategori

                        </th>

                        <th width="220"
                            class="text-center">

                            Aksi

                        </th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($kategori as $item)

                    <tr>

                        <td>

                            {{ $loop->iteration }}

                        </td>

                        <td>

                            <span class="fw-semibold">

                                {{ $item->nama_kategori }}

                            </span>

                        </td>

                        <!-- AKSI -->
                        <td class="text-center">

                            <div class="d-flex gap-2 justify-content-center">

                                <!-- EDIT -->
                                <a href="/admin/kategori/edit/{{ $item->id }}"
                                class="btn btn-sm btn-light border rounded-circle action-btn">

                                    <i class="bi bi-pencil-square text-success"></i>

                                </a>

                                <!-- DELETE -->
                                <form action="/admin/kategori/delete/{{ $item->id }}"
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