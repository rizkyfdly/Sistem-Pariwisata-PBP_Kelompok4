@extends('layouts.admin')

@section('content')

<!-- HEADER -->
<div class="mb-4">

    <h3 class="fw-bold mb-1">

        Data Ulasan

    </h3>

    <p class="text-muted mb-0">

        Kelola ulasan pengguna
        SULTRA Explore

    </p>

</div>

<!-- CARD -->
<div class="card border-0 shadow-sm rounded-4">

    <div class="card-body">

        <div class="table-responsive">

            <table class="table align-middle">

                <thead>

                    <tr>

                        <th>User</th>
                        <th>Wisata</th>
                        <th>Rating</th>
                        <th>Ulasan</th>
                        <th width="150"
                            class="text-center">

                            Aksi

                        </th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($ulasan as $item)

                    <tr>

                        <!-- USER -->
                        <td>

                            <div class="d-flex align-items-center gap-3">

                                @if($item->user->foto)

                                    <img src="{{ asset('foto-user/' . $item->user->foto) }}"
                                         width="50"
                                         height="50"
                                         class="rounded-circle shadow-sm"
                                         style="object-fit: cover;">

                                @else

                                    <img src="https://ui-avatars.com/api/?name={{ $item->user->name }}"
                                         width="50"
                                         class="rounded-circle">

                                @endif

                                <div>

                                    <div class="fw-semibold">

                                        {{ $item->user->name }}

                                    </div>

                                    <small class="text-muted">

                                        {{ $item->user->email }}

                                    </small>

                                </div>

                            </div>

                        </td>

                        <!-- WISATA -->
                        <td>

                            <span class="fw-semibold">

                                {{ $item->wisata->nama_tempat }}

                            </span>

                        </td>

                        <!-- RATING -->
                        <td>

                            <span class="badge bg-warning text-dark
                                         rounded-pill px-3 py-2">

                                ⭐ {{ $item->rating }}/5

                            </span>

                        </td>

                        <!-- ULASAN -->
                        <td>

                            <span class="text-muted">

                                {{ $item->komentar }}

                            </span>

                        </td>


                        <!-- AKSI -->
                        <td class="text-center">

                            <div class="d-flex gap-2 justify-content-center">

                                <!-- DELETE -->
                                <form action="/admin/ulasan/delete/{{ $item->id }}"
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