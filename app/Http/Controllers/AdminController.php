<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ulasan;
use App\Models\KategoriWisata;
use App\Models\TempatWisata;
use App\Models\Galeri;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $jumlahWisata = TempatWisata::count();

        $jumlahKategori = KategoriWisata::count();

        $jumlahUlasan = Ulasan::count();

        $jumlahUser = User::where('role', 'user')->count();

        return view('admin.dashboard', compact(
            'jumlahWisata',
            'jumlahKategori',
            'jumlahUlasan',
            'jumlahUser'
        ));
    }

    public function kategori()
    {
        $kategori = KategoriWisata::latest()->get();

        return view('admin.kategori.index', compact('kategori'));
    }

    public function tambahKategori()
    {
        return view('admin.kategori.tambah');
    }

    public function simpanKategori(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required'
        ]);

        KategoriWisata::create([
            'nama_kategori' => $request->nama_kategori
        ]);

        return redirect('/admin/kategori');
    }

    public function editKategori($id)
    {
        $kategori = KategoriWisata::findOrFail($id);

        return view('admin.kategori.edit', compact('kategori'));
    }

    public function updateKategori(Request $request, $id)
    {
        $kategori = KategoriWisata::findOrFail($id);

        $kategori->update([
            'nama_kategori' => $request->nama_kategori
        ]);

        return redirect('/admin/kategori');
    }

    public function hapusKategori($id)
    {
        $kategori = KategoriWisata::findOrFail($id);

        $kategori->delete();

        return redirect('/admin/kategori');
    }


    public function wisata()
    {
        $wisata = TempatWisata::latest()->get();

        return view('admin.wisata.index', compact('wisata'));
    }

    public function tambahWisata()
    {
        $kategori = KategoriWisata::all();

        return view('admin.wisata.tambah', compact('kategori'));
    }

    public function simpanWisata(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required',
            'nama_tempat' => 'required',
            'lokasi' => 'required',
            'deskripsi' => 'required',
            'harga_tiket' => 'required',
            'jam_buka' => 'required',
        ]);

        $namaFile = null;

        // Upload gambar
        if ($request->hasFile('gambar')) {

            $namaFile = time().'.'.$request->gambar->extension();

            $request->gambar->move(
                public_path('gambar-wisata'),
                $namaFile
            );
        }

        TempatWisata::create([

            'kategori_id' => $request->kategori_id,
            'nama_tempat' => $request->nama_tempat,
            'lokasi' => $request->lokasi,
            'deskripsi' => $request->deskripsi,
            'harga_tiket' => $request->harga_tiket,
            'jam_buka' => $request->jam_buka,
            'gambar' => $namaFile,
            'rating' => 0,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude

        ]);

        return redirect('/admin/wisata');
    }

    public function editWisata($id)
    {
        $wisata = TempatWisata::findOrFail($id);

        $kategori = KategoriWisata::all();

        return view('admin.wisata.edit', compact(
            'wisata',
            'kategori'
        ));
    }

    public function updateWisata(Request $request, $id)
    {
        $wisata = TempatWisata::findOrFail($id);

        $namaFile = $wisata->gambar;

        // Jika upload gambar baru
        if ($request->hasFile('gambar')) {

            $namaFile = time().'.'.$request->gambar->extension();

            $request->gambar->move(
                public_path('gambar-wisata'),
                $namaFile
            );
        }

        $wisata->update([

            'kategori_id' => $request->kategori_id,
            'nama_tempat' => $request->nama_tempat,
            'lokasi' => $request->lokasi ?? $wisata->lokasi,
            'deskripsi' => $request->deskripsi,
            'harga_tiket' => $request->harga_tiket,
            'jam_buka' => $request->jam_buka,
            'gambar' => $namaFile,
            'latitude' => $request->latitude ?? $wisata->latitude,
            'longitude' => $request->longitude ?? $wisata->longitude

        ]);

        return redirect('/admin/wisata');
    }

    public function hapusWisata($id)
    {
        $wisata = TempatWisata::findOrFail($id);

        $wisata->delete();

        return redirect('/admin/wisata');
    }


    
    public function galeri()
    {
        $galeri = Galeri::latest()->get();

        return view('admin.galeri.index', compact('galeri'));
    }

    public function tambahGaleri()
    {
        $wisata = TempatWisata::all();

        return view('admin.galeri.tambah', compact('wisata'));
    }

    public function simpanGaleri(Request $request)
    {
        // CEK ADA FOTO
        if ($request->hasFile('foto')) {

            // NAMA FILE
            $namaFile =
                time() . '.' .
                $request->foto->extension();

            // UPLOAD
            $request->foto->move(
                public_path('galeri'),
                $namaFile
            );

            // SIMPAN DATABASE
            Galeri::create([

                'tempat_wisata_id' =>
                    $request->tempat_wisata_id,

                'foto' =>
                    $namaFile

            ]);

        }

        return redirect('/admin/galeri');
    }

    public function hapusGaleri($id)
    {
        $galeri = Galeri::findOrFail($id);

        $galeri->delete();

        return redirect('/admin/galeri');
    }


    public function editGaleri($id)
    {
        $galeri = Galeri::findOrFail($id);

        $wisata = TempatWisata::all();

        return view('admin.galeri.edit', compact(
            'galeri',
            'wisata'
        ));
    }

    public function updateGaleri(Request $request, $id)
    {
        $galeri = Galeri::findOrFail($id);

        $namaFile = $galeri->foto;

        // Jika upload foto baru
        if ($request->hasFile('foto')) {

            $namaFile = time().'.'.$request->foto->extension();

            $request->foto->move(
                public_path('galeri'),
                $namaFile
            );
        }

        $galeri->update([

            'tempat_wisata_id' => $request->tempat_wisata_id,
            'foto' => $namaFile,
            'keterangan' => $request->keterangan

        ]);

        return redirect('/admin/galeri');
    }

    public function ulasan()
    {
        $ulasan = Ulasan::latest()->get();

        return view('admin.ulasan.index', compact('ulasan'));
    }

    public function hapusUlasan($id)
    {
        $ulasan = Ulasan::findOrFail($id);

        $ulasan->delete();

        return redirect('/admin/ulasan');
    }


    public function user()
    {
        $user = User::latest()->get();

        return view('admin.user.index', compact('user'));
    }

    public function tambahUser()
    {
        return view('admin.user.tambah');
    }

    public function simpanUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required'
        ]);

        User::create([

            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role

        ]);

        return redirect('/admin/user');
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);

        return view('admin.user.edit', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->update([

            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role

        ]);

        // Jika password diisi
        if ($request->password) {

            $user->update([

                'password' => bcrypt($request->password)

            ]);
        }

        return redirect('/admin/user');
    }

    public function hapusUser($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect('/admin/user');
    }
}