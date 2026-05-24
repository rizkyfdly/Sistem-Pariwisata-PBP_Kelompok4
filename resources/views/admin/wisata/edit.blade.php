@extends('layouts.admin')

@section('content')

<!-- HEADER -->
<div class="mb-4">

    <h3 class="fw-bold mb-1">

        Edit Wisata

    </h3>

    <p class="text-muted mb-0">

        Perbarui data destinasi wisata
        SULTRA Explore

    </p>

</div>

<!-- CARD -->
<div class="card border-0 shadow-sm rounded-4">

    <div class="card-body p-4">

        <form action="/admin/wisata/update/{{ $wisata->id }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="row">

                <!-- NAMA -->
                <div class="col-md-6 mb-4">

                    <label class="form-label fw-semibold">

                        Nama Wisata

                    </label>

                    <input type="text"
                           name="nama_tempat"
                           value="{{ $wisata->nama_tempat }}"
                           class="form-control p-3 rounded-4"
                           required>

                </div>

                <!-- KATEGORI -->
                <div class="col-md-6 mb-4">

                    <label class="form-label fw-semibold">

                        Kategori

                    </label>

                    <select name="kategori_id"
                            class="form-select p-3 rounded-4">

                        @foreach($kategori as $item)

                            <option value="{{ $item->id }}"
                                {{ $wisata->kategori_id == $item->id ? 'selected' : '' }}>

                                {{ $item->nama_kategori }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <!-- LOKASI -->
                <div class="col-12 mb-4">

                    <label class="form-label fw-semibold mb-3">

                        Lokasi Wisata

                    </label>

                    <div class="row">

                        <!-- KABUPATEN -->
                        <div class="col-md-4 mb-3">

                            <select id="kabupaten"
                                    class="form-select p-3 rounded-4">

                                <option value="">

                                    Pilih Kabupaten

                                </option>

                            </select>

                        </div>

                        <!-- KECAMATAN -->
                        <div class="col-md-4 mb-3">

                            <select id="kecamatan"
                                    class="form-select p-3 rounded-4">

                                <option value="">

                                    Pilih Kecamatan

                                </option>

                            </select>

                        </div>

                        <!-- DESA -->
                        <div class="col-md-4 mb-3">

                            <select id="desa"
                                    class="form-select p-3 rounded-4">

                                <option value="">

                                    Pilih Desa

                                </option>

                            </select>

                        </div>

                    </div>

                    <!-- HIDDEN -->
                    <input type="hidden"
                        name="lokasi"
                        id="lokasi">

                </div>

                <!-- DESKRIPSI -->
                <div class="col-12 mb-4">

                    <label class="form-label fw-semibold">

                        Deskripsi

                    </label>

                    <textarea name="deskripsi"
                              rows="5"
                              class="form-control p-3 rounded-4">{{ $wisata->deskripsi }}</textarea>

                </div>

                <!-- HARGA -->
                <div class="col-md-6 mb-4">

                    <label class="form-label fw-semibold">

                        Harga Tiket

                    </label>

                    <input type="number"
                           name="harga_tiket"
                           value="{{ $wisata->harga_tiket }}"
                           class="form-control p-3 rounded-4">

                </div>

                <!-- JAM BUKA -->
                <div class="col-md-6 mb-4">

                    <label class="form-label fw-semibold">

                        Jam Buka

                    </label>

                    <input type="text"
                           name="jam_buka"
                           value="{{ $wisata->jam_buka }}"
                           class="form-control p-3 rounded-4">

                </div>

                <!-- LATITUDE -->
                <div class="col-md-6 mb-4">

                    <label class="form-label fw-semibold">

                        Latitude

                    </label>

                    <input type="text"
                        name="latitude"
                        class="form-control p-3 rounded-4"
                        placeholder="-3.9985">

                </div>

                <!-- LONGITUDE -->
                <div class="col-md-6 mb-4">

                    <label class="form-label fw-semibold">

                        Longitude

                    </label>

                    <input type="text"
                        name="longitude"
                        class="form-control p-3 rounded-4"
                        placeholder="122.5127">

                </div>

                <!-- GAMBAR LAMA -->
                <div class="col-12 mb-3">

                    <label class="form-label fw-semibold">

                        Gambar Saat Ini

                    </label>

                    <div>

                        <img src="{{ asset('gambar-wisata/' . $wisata->gambar) }}"
                             width="200"
                             class="rounded-4 shadow-sm">

                    </div>

                </div>

                <!-- GAMBAR BARU -->
                <div class="col-12 mb-4">

                    <label class="form-label fw-semibold">

                        Ganti Gambar

                    </label>

                    <input type="file"
                           name="gambar"
                           class="form-control p-3 rounded-4">

                </div>

            </div>

            <!-- BUTTON -->
            <div class="d-flex flex-column flex-md-row gap-3">

                <button class="btn btn-success rounded-pill px-5">

                    Update Wisata

                </button>

                <a href="/admin/wisata"
                   class="btn btn-light border rounded-pill px-5">

                    Kembali

                </a>

            </div>

        </form>

    </div>

</div>
<script>

window.onload = function () {

    const kabupaten =
        document.getElementById('kabupaten');

    const kecamatan =
        document.getElementById('kecamatan');

    const desa =
        document.getElementById('desa');

    const lokasi =
        document.getElementById('lokasi');

    // KABUPATEN
    fetch('https://www.emsifa.com/api-wilayah-indonesia/api/regencies/74.json')

    .then(response => response.json())

    .then(data => {

        data.forEach(item => {

            let option =
                document.createElement('option');

            option.value = item.id;

            option.text = item.name;

            kabupaten.appendChild(option);

        });

    });

    // KECAMATAN
    kabupaten.onchange = function () {

        let kabupatenId = this.value;

        kecamatan.innerHTML =
            '<option value="">Pilih Kecamatan</option>';

        desa.innerHTML =
            '<option value="">Pilih Desa</option>';

        fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/districts/${kabupatenId}.json`)

        .then(response => response.json())

        .then(data => {

            data.forEach(item => {

                let option =
                    document.createElement('option');

                option.value = item.id;

                option.text = item.name;

                kecamatan.appendChild(option);

            });

        });

    };

    // DESA
    kecamatan.onchange = function () {

        let kecamatanId = this.value;

        desa.innerHTML =
            '<option value="">Pilih Desa</option>';

        fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/villages/${kecamatanId}.json`)

        .then(response => response.json())

        .then(data => {

            data.forEach(item => {

                let option =
                    document.createElement('option');

                option.value = item.name;

                option.text = item.name;

                desa.appendChild(option);

            });

        });

    };

    // SIMPAN LOKASI
    desa.onchange = function () {

        let desaText =
            this.value;

        let kecamatanText =
            kecamatan.options[kecamatan.selectedIndex].text;

        let kabupatenText =
            kabupaten.options[kabupaten.selectedIndex].text;

        lokasi.value =
            desaText + ', ' +
            kecamatanText + ', ' +
            kabupatenText;

    };

};

</script>

@endsection