<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// root langsung ke login
Route::get('/', function () {
    return redirect()->route('login');
});

// tampilkan halaman login
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
