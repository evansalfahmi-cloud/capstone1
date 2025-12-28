<?php
// Tag pembuka PHP

use Illuminate\Support\Facades\Route;
// Facade Route untuk mendefinisikan routing

use App\Http\Controllers\Auth\LoginController;
// Controller untuk login & logout

use App\Http\Controllers\Auth\RegisterController;
// Controller untuk proses pendaftaran user

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| File ini berisi seluruh routing aplikasi web
| Setiap route menentukan URL → controller / view
*/

/*
|--------------------------------------------------------------------------
| ROOT
|--------------------------------------------------------------------------
*/

// Jika user mengakses root (/)
// langsung diarahkan ke halaman login
Route::get('/', function () {
    return redirect()->route('login');
});

/*
|--------------------------------------------------------------------------
| AUTH - LOGIN
|--------------------------------------------------------------------------
*/

// Menampilkan halaman login (GET)
Route::get('/login', [LoginController::class, 'show'])
    ->name('login');

// Memproses login (POST)
Route::post('/login', [LoginController::class, 'process'])
    ->name('login.process');

// Proses logout (POST, aman dari CSRF)
Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout');

/*
|--------------------------------------------------------------------------
| AUTH - REGISTER
|--------------------------------------------------------------------------
*/

// Menampilkan halaman register (GET)
Route::get('/register', [RegisterController::class, 'show'])
    ->name('register');

// Memproses data pendaftaran (POST)
Route::post('/register', [RegisterController::class, 'store'])
    ->name('register.store');

/*
|--------------------------------------------------------------------------
| DASHBOARD (PROTECTED)
|--------------------------------------------------------------------------
*/

// Semua route di dalam group ini
// hanya bisa diakses oleh user yang SUDAH LOGIN
Route::middleware('auth')->group(function () {

    // Halaman dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

});
