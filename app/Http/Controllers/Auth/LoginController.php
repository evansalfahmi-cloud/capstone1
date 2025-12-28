<?php
// Tag pembuka PHP, menandakan bahwa file ini berisi kode PHP

namespace App\Http\Controllers\Auth;
// Namespace menunjukkan lokasi controller ini berada
// Artinya: controller ini ada di folder app/Http/Controllers/Auth
// Namespace dipakai agar tidak bentrok dengan class lain dan memudahkan autoloading

use App\Http\Controllers\Controller;
// Mengimpor class Controller bawaan Laravel
// LoginController akan mewarisi (extends) fitur dari Controller ini

use Illuminate\Http\Request;
// Mengimpor class Request
// Digunakan untuk mengambil data dari form (username, password, dll)

use Illuminate\Support\Facades\Auth;
// Mengimpor Facade Auth
// Digunakan untuk proses autentikasi (login, logout, cek user)

class LoginController extends Controller
// Membuat class LoginController
// extends Controller artinya LoginController adalah turunan dari Controller Laravel
{
    public function show()
    {
        // Method ini bertugas menampilkan halaman login

        return view('auth.login');
        // Mengembalikan (menampilkan) file:
        // resources/views/auth/login.blade.php
    }

    public function process(Request $request)
    {
        // Method ini menangani proses login
        // Parameter Request $request berisi data dari form login

        $request->validate([
            // Validasi input dari form

            'username' => 'required',
            // Field username wajib diisi

            'password' => 'required',
            // Field password wajib diisi
        ]);

        if (Auth::attempt([
            // Auth::attempt mencoba mencocokkan data login ke database

            'username' => $request->username,
            // Mencocokkan kolom username di database
            // dengan input username dari form

            'password' => $request->password,
            // Mencocokkan password (otomatis dicek dengan hash)
        ])) {
            // Jika username dan password BENAR

            $request->session()->regenerate();
            // Membuat ulang session ID
            // Ini penting untuk keamanan (mencegah session hijacking)

            return redirect()
                ->route('login')
                // Redirect kembali ke halaman login

                ->with('login_success', true);
                // Mengirim session flash bernama login_success
                // Session ini dipakai untuk menampilkan popup "Login Berhasil"
        }

        return back()->with('error', 'Username atau password salah');
        // Jika login GAGAL:
        // Kembali ke halaman sebelumnya (login)
        // Sambil membawa pesan error
    }

    public function logout(Request $request)
    {
        // Method ini menangani proses logout

        Auth::logout();
        // Menghapus status login user (keluar dari sistem)

        $request->session()->invalidate();
        // Menghapus semua data session

        $request->session()->regenerateToken();
        // Membuat ulang CSRF token
        // Untuk mencegah serangan CSRF

        return redirect('/login');
        // Setelah logout, user diarahkan ke halaman login
    }
}
