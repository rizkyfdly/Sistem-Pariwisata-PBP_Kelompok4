<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    // HALAMAN LOGIN
    public function login()
    {
        return view('login');
    }

    // PROSES LOGIN
    public function authenticate(Request $request)
    {

        $credentials = $request->validate([

            'email' => 'required|email',
            'password' => 'required'

        ]);

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            // ADMIN
            if (Auth::user()->role == 'admin') {

                return redirect('/admin');

            }

            // USER
            return redirect('/home');

        }

        return back()->with('error', 'Email atau Password salah');

    }

    // LOGOUT
    public function logout()
    {

        Auth::logout();

        return redirect('/');

    }

    // HALAMAN REGISTER
    public function register()
    {

        return view('register');

    }

    // PROSES REGISTER
    public function registerProses(Request $request)
    {

        User::create([

            'name' => $request->name,
            'email' => $request->email,
            'role' => 'user',
            'password' => bcrypt($request->password),

        ]);

        return redirect('/login');

    }

    // PROFIL
    public function profil()
    {
        // JIKA ADMIN
        if(auth()->user()->role == 'admin'){

            return view('admin.profil');

        }

        // JIKA USER
        return view('user.profil');
    }

    public function editProfil()
    {
        return view('user.edit-profile');
    }

    // UPDATE PROFIL
    public function updateProfil(Request $request)
    {

        $user = auth()->user();

        if ($request->hasFile('foto')) {

            $foto = time().'.'.$request->foto->extension();

            $request->foto->move(public_path('foto-user'), $foto);

            $user->foto = $foto;

        }

        $user->name = $request->name;
        $user->bio = $request->bio;
        $user->no_hp = $request->no_hp;

        $user->save();

        return redirect('/profil')
            ->with('success', 'Profil berhasil diperbarui');

    }
}