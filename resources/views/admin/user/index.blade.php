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

            Data User

        </h3>

        <p class="text-muted mb-0">

            Kelola pengguna sistem
            SULTRA Explore

        </p>

    </div>

    <!-- BUTTON -->
    <a href="/admin/user/tambah"
       class="btn btn-success rounded-pill px-4">

        <i class="bi bi-plus-circle me-2"></i>

        Tambah User

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
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th width="220"
                            class="text-center">

                            Aksi

                        </th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($user as $item)

                    <tr>

                        <!-- FOTO -->
                        <td>

                            @if($item->foto)

                                <img src="{{ asset('foto-user/' . $item->foto) }}"
                                     width="60"
                                     height="60"
                                     class="rounded-circle shadow-sm"
                                     style="object-fit: cover;">

                            @else

                                <img src="https://ui-avatars.com/api/?name={{ $item->name }}"
                                     width="60"
                                     class="rounded-circle">

                            @endif

                        </td>

                        <!-- NAMA -->
                        <td>

                            <span class="fw-semibold">

                                {{ $item->name }}

                            </span>

                        </td>

                        <!-- EMAIL -->
                        <td>

                            {{ $item->email }}

                        </td>

                        <!-- ROLE -->
                        <td>

                            @if($item->role == 'admin')

                                <span class="badge bg-danger rounded-pill px-3 py-2">

                                    Admin

                                </span>

                            @else

                                <span class="badge bg-success rounded-pill px-3 py-2">

                                    User

                                </span>

                            @endif

                        </td>

                        <!-- AKSI -->
                        <td class="text-center">

                            <div class="d-flex gap-2 justify-content-center">

                                <!-- EDIT -->
                                <a href="/admin/user/edit/{{ $item->id }}"
                                class="btn btn-sm btn-light border rounded-circle action-btn">

                                    <i class="bi bi-pencil-square text-success"></i>

                                </a>

                                <!-- DELETE -->
                                <form action="/admin/user/delete/{{ $item->id }}"
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