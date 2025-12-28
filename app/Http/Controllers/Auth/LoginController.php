<?php
// Tag pembuka PHP, menandakan file ini berisi kode PHP

namespace App\Http\Controllers\Auth;
// Namespace menunjukkan bahwa controller ini berada di folder:
// app/Http/Controllers/Auth
// Namespace membantu Laravel melakukan autoload class dengan benar

use App\Http\Controllers\Controller;
// Mengimpor Controller bawaan Laravel
// LoginController akan mewarisi fitur-fitur dasar controller

use Illuminate\Http\Request;
// Mengimpor class Request
// Digunakan untuk mengambil data dari form login

use Illuminate\Support\Facades\Auth;
// Mengimpor Facade Auth
// Digunakan untuk autentikasi (login, logout, cek user)

class LoginController extends Controller
// Mendefinisikan class LoginController
{
    /**
     * Menampilkan halaman login
     */
    public function show()
    {
        // Mengembalikan view login
        // File: resources/views/auth/login.blade.php
        return view('auth.login');
    }

    /**
     * Memproses login (username ATAU email)
     */
    public function process(Request $request)
    {
        // Validasi input dari form login
        $request->validate([
            'login' => 'required|string',
            // Field login wajib diisi
            // Bisa berupa username atau email

            'password' => 'required',
            // Password wajib diisi
        ]);

        // Menentukan apakah input adalah email atau username
        $loginType = filter_var($request->login, FILTER_VALIDATE_EMAIL)
            ? 'email'
            : 'username';
        // Jika format email valid → pakai kolom email
        // Jika bukan → dianggap username

        // Mencoba login ke database
        if (Auth::attempt([
            $loginType => $request->login,
            // Mencocokkan input login ke kolom email atau username

            'password' => $request->password,
            // Password akan otomatis dicek dengan hash oleh Laravel
        ])) {
            // Jika login BERHASIL

            $request->session()->regenerate();
            // Membuat ulang session ID
            // Penting untuk keamanan (mencegah session hijacking)

            return redirect()
                ->route('dashboard');
            // Redirect ke halaman dashboard setelah login berhasil
        }

        // Jika login GAGAL
        return back()->with('error', 'Username/email atau password salah');
        // Kembali ke halaman login
        // Sambil membawa pesan error
    }

    /**
     * Proses logout
     */
    public function logout(Request $request)
    {
        Auth::logout();
        // Menghapus status autentikasi user

        $request->session()->invalidate();
        // Menghapus seluruh data session

        $request->session()->regenerateToken();
        // Membuat ulang CSRF token
        // Untuk mencegah serangan CSRF

        return redirect()->route('login');
        // Setelah logout, user diarahkan ke halaman login
    }
}
