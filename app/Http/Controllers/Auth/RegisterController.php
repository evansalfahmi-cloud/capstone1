<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Menampilkan halaman daftar
     */
    public function show()
    {
        return view('auth.register');
    }

    /**
     * Memproses pendaftaran user baru
     */
    public function store(Request $request)
    {
        // Validasi input sesuai struktur tabel users
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:50|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        // Simpan user baru ke database
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Setelah daftar, arahkan ke halaman login
        return redirect()
            ->route('login')
            ->with('success', 'Pendaftaran berhasil. Silakan login.');
    }
}