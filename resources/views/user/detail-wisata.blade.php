<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Detail Wisata</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Leaflet CSS -->
    <link rel="stylesheet"
          href="https://unpkg.com/leaflet/dist/leaflet.css"/>

    <style>

        body{

            background: #f5f7fa;

        }

        .hero-image{

            height: 480px;

            object-fit: cover;

            border-radius: 30px;

        }

        .info-card{

            border-radius: 28px;

        }

        .gallery-img{

            height: 230px;

            object-fit: cover;

        }

        .ulasan-card{

            border-radius: 24px;

        }

        textarea{

            resize: none;

        }

        .rating{

            display: flex;
            flex-direction: row-reverse;
            justify-content: start;

            gap: 8px;

        }

        .rating input{

            display: none;

        }

        .rating label{

            font-size: 40px;

            color: #ddd;

            cursor: pointer;

            transition: 0.2s;

        }

        .rating input:checked ~ label{

            color: #ffc107;

        }

        .rating label:hover,
        .rating label:hover ~ label{

            color: #ffc107;

        }

    </style>

</head>

<body>

<div class="container py-5">

    <!-- CONTENT -->
    <div class="row justify-content-center g-4 align-items-center">

        <!-- LEFT -->
        <div class="col-lg-6">

            <div class="card border-0 shadow-sm info-card h-100">

                <div class="card-body p-4 p-lg-5">

                    <!-- KATEGORI -->
                    <span class="badge bg-success px-3 py-2 mb-3">

                        {{ $wisata->kategori->nama_kategori ?? 'Wisata' }}

                    </span>

                    <!-- TITLE -->
                    <h1 class="fw-bold mb-3">

                        {{ $wisata->nama_tempat }}

                    </h1>

                    <!-- LOKASI -->
                    <p class="text-muted fs-5 mb-4">

                        <i class="bi bi-geo-alt-fill text-success me-2"></i>

                        {{ $wisata->lokasi }}

                    </p>

                    <!-- DESKRIPSI -->
                    <div class="text-muted"
                        style="line-height: 1.9;">

                        {{ $wisata->deskripsi }}

                    </div>

                    <!-- INFO -->
                    <div class="row mt-5 g-3">

                        <!-- HARGA -->
                        <div class="col-md-6">

                            <div class="bg-light rounded-4 p-4 h-100">

                                <small class="text-muted d-block mb-2">

                                    Harga Tiket

                                </small>

                                <h5 class="fw-bold text-success mb-0">

                                    Rp {{ number_format($wisata->harga_tiket) }}

                                </h5>

                            </div>

                        </div>

                        <!-- JAM -->
                        <div class="col-md-6">

                            <div class="bg-light rounded-4 p-4 h-100">

                                <small class="text-muted d-block mb-2">

                                    Jam Operasional

                                </small>

                                <h5 class="fw-bold mb-0">

                                    {{ $wisata->jam_buka }}

                                </h5>

                            </div>

                        </div>

                    </div>

                    <!-- BUTTON -->
                    <div class="mt-5">

                        <a href="/home"
                        class="btn btn-outline-success rounded-pill px-4 py-2">

                            <i class="bi bi-arrow-left me-2"></i>

                            Kembali

                        </a>

                    </div>

                </div>

            </div>

        </div>

        <!-- RIGHT -->
        <div class="col-lg-6">

            <div class="text-center">

                <img src="{{ asset('gambar-wisata/' . $wisata->gambar) }}"
                    class="img-fluid shadow hero-image w-100">

            </div>

        </div>

    </div>

    <!-- MAP -->
    <div class="mt-5">

        <div class="card border-0 shadow-sm info-card">

            <div class="card-body p-4">

                <h4 class="fw-bold mb-4">

                    Lokasi Wisata

                </h4>

                <div id="map"
                     style="
                        height: 420px;
                        border-radius: 24px;
                     ">
                </div>

            </div>

        </div>

    </div>

    <!-- GALERI -->
    <div class="mt-5">

        <h3 class="fw-bold mb-4">

            Galeri Wisata

        </h3>

        <div class="row g-4">

            @forelse($wisata->galeri as $item)

                <div class="col-md-6 col-lg-4">

                    <div class="card border-0 shadow-sm info-card overflow-hidden h-100">

                        <img src="{{ asset('galeri/' . $item->foto) }}"
                             class="w-100 gallery-img">

                        <div class="card-body p-4">

                            <p class="mb-0 text-muted">

                                {{ $item->keterangan }}

                            </p>

                        </div>

                    </div>

                </div>

            @empty

                <p class="text-muted">

                    Belum ada foto galeri.

                </p>

            @endforelse

        </div>

    </div>

    <!-- FORM ULASAN -->
    <div class="mt-5">

        <div class="card border-0 shadow-sm ulasan-card">

            <div class="card-body p-4 p-lg-5">

                <h3 class="fw-bold mb-4">

                    Beri Ulasan

                </h3>

                <form action="/ulasan/simpan"
                      method="POST">

                    @csrf

                    <input type="hidden"
                           name="tempat_wisata_id"
                           value="{{ $wisata->id }}">

                    <!-- RATING -->
                    <div class="mb-4">

                        <label class="form-label fw-semibold d-block mb-3">

                            Rating

                        </label>

                        <div class="rating">

                            <input type="radio"
                                name="rating"
                                value="5"
                                id="star5">

                            <label for="star5">★</label>

                            <input type="radio"
                                name="rating"
                                value="4"
                                id="star4">

                            <label for="star4">★</label>

                            <input type="radio"
                                name="rating"
                                value="3"
                                id="star3">

                            <label for="star3">★</label>

                            <input type="radio"
                                name="rating"
                                value="2"
                                id="star2">

                            <label for="star2">★</label>

                            <input type="radio"
                                name="rating"
                                value="1"
                                id="star1">

                            <label for="star1">★</label>

                        </div>

                    </div>

                    <!-- KOMENTAR -->
                    <div class="mb-4">

                        <label class="form-label fw-semibold">

                            Komentar

                        </label>

                        <textarea name="komentar"
                                  rows="5"
                                  class="form-control"></textarea>

                    </div>

                    <!-- BUTTON -->
                    <button class="btn btn-success rounded-pill px-4">

                        Kirim Ulasan

                    </button>

                </form>

            </div>

        </div>

    </div>

    <!-- ULASAN -->
    <div class="mt-5 mb-5">

        <h3 class="fw-bold mb-4">

            Ulasan Pengunjung

        </h3>

        @forelse($ulasan as $item)

            <div class="card border-0 shadow-sm ulasan-card mb-4">

                <div class="card-body p-4">

                    <div class="d-flex justify-content-between align-items-start mb-3">

                        <div>

                            <h5 class="fw-bold mb-1">

                                {{ $item->user->name }}

                            </h5>

                            <small class="text-muted">

                                ⭐ {{ $item->rating }}/5

                            </small>

                        </div>

                    </div>

                    <p class="mb-0 text-muted"
                       style="line-height: 1.8;">

                        {{ $item->komentar }}

                    </p>

                </div>

            </div>

        @empty

            <div class="alert alert-light border-0 shadow-sm">

                Belum ada ulasan.

            </div>

        @endforelse

    </div>

</div>

<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script>

    // Ambil koordinat dari database
    let latitude = {{ $wisata->latitude ?? -4.5497 }};
    let longitude = {{ $wisata->longitude ?? 122.6166 }};

    // Buat map
    let map = L.map('map').setView(
        [latitude, longitude],
        13
    );

    // Tile OpenStreetMap
    L.tileLayer(
        'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
        {
            attribution:
            '&copy; OpenStreetMap contributors'
        }
    ).addTo(map);

    // Marker
    L.marker([latitude, longitude])
    .addTo(map)
    .bindPopup(`
        <b>{{ $wisata->nama_tempat }}</b><br>
        {{ $wisata->lokasi }}
    `)
    .openPopup();

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>