<?php
// Tag pembuka PHP

use Illuminate\Support\Facades\Route;
// Mengimpor facade Route untuk mendefinisikan routing

use App\Http\Controllers\Auth\LoginController;
// Mengimpor LoginController yang kita buat di folder Auth

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| File ini berisi semua routing untuk aplikasi web
| Route menentukan URL mana memanggil controller / view tertentu
*/

// ==============================
// ROUTE ROOT
// ==============================

// Jika user mengakses root domain (/),
// langsung diarahkan ke halaman login
Route::get('/', function () {
    return redirect()->route('login');
});

// ==============================
// ROUTE LOGIN
// ==============================

// Menampilkan halaman login
// Method GET → hanya menampilkan form
Route::get('/login', [LoginController::class, 'show'])
    ->name('login');

// Memproses data login
// Method POST → menerima username & password dari form
Route::post('/login', [LoginController::class, 'process'])
    ->name('login.process');

// ==============================
// ROUTE LOGOUT
// ==============================

// Proses logout user
// Method POST demi keamanan (CSRF protected)
Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout');

// ==============================
// ROUTE DASHBOARD (PROTECTED)
// ==============================

// Semua route di dalam group ini
// hanya bisa diakses jika user sudah login
Route::middleware('auth')->group(function () {

    // Menampilkan halaman dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

});
