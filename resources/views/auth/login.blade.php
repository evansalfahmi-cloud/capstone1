<!DOCTYPE html>
<!-- Deklarasi tipe dokumen HTML5 -->
<html lang="id">
<!-- Bahasa halaman diset ke Bahasa Indonesia -->

<head>
    <!-- Encoding karakter UTF-8 agar mendukung semua karakter -->
    <meta charset="UTF-8">

    <!-- Membuat tampilan responsif di berbagai ukuran layar -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Judul halaman yang tampil di tab browser -->
    <title>Login</title>

    {{-- Memanggil file CSS dan JavaScript melalui Vite --}}
    {{-- resources/css/app.css dan resources/js/app.js --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-light">
<!-- Body halaman dengan background warna terang (Bootstrap) -->

<div class="container">
    <!-- Container utama Bootstrap -->

    <div class="row justify-content-center align-items-center min-vh-100">
        <!-- Row untuk memusatkan konten secara horizontal dan vertikal -->

        <div class="col-11 col-sm-8 col-md-5 col-lg-4">
            <!-- Kolom responsif untuk ukuran form login -->

            <div class="card shadow-sm border-0 rounded-4">
                <!-- Card Bootstrap dengan bayangan, tanpa border, dan sudut membulat -->

                <div class="card-body p-4">
                    <!-- Isi card dengan padding -->

                    <h4 class="text-center mb-4 fw-semibold">
                        Login
                    </h4>
                    <!-- Judul halaman login -->

                    {{-- Menampilkan pesan error jika login gagal --}}
                    @if (session('error'))
                        <div class="alert alert-danger small">
                            <!-- Alert Bootstrap berwarna merah -->
                            {{ session('error') }}
                            <!-- Pesan error dari controller -->
                        </div>
                    @endif

                    <!-- Form login -->
                    <form method="POST" action="#">
                        <!-- Method POST untuk mengirim data secara aman -->

                        @csrf
                        {{-- Token keamanan Laravel untuk mencegah CSRF attack --}}

                        {{-- Input Username --}}
                        <div class="mb-3">
                            <!-- Margin bottom -->

                            <label for="username" class="form-label small">
                                Username
                            </label>
                            <!-- Label untuk input username -->

                            <input
                                type="text"                 <!-- Tipe input teks -->
                                id="username"               <!-- ID input -->
                                name="username"             <!-- Nama field yang dikirim ke server -->
                                class="form-control"        <!-- Styling Bootstrap -->
                                placeholder="Masukkan username" <!-- Placeholder -->
                                required                    <!-- Wajib diisi -->
                                autofocus                   <!-- Fokus otomatis saat halaman dibuka -->
                            >
                        </div>

                        {{-- Input Password --}}
                        <div class="mb-4">
                            <!-- Margin bottom -->

                            <label for="password" class="form-label small">
                                Password
                            </label>
                            <!-- Label untuk input password -->

                            <div class="input-group">
                                <!-- Input group Bootstrap untuk input + button -->

                                <input
                                    type="password"          <!-- Tipe password -->
                                    id="password"            <!-- ID input -->
                                    name="password"          <!-- Nama field -->
                                    class="form-control"     <!-- Styling Bootstrap -->
                                    placeholder="Masukkan password" <!-- Placeholder -->
                                    required                 <!-- Wajib diisi -->
                                >

                                <button
                                    type="button"            <!-- Button biasa (bukan submit) -->
                                    class="btn btn-outline-secondary"
                                    id="togglePassword"
                                >
                                    <!-- Ikon mata dari Bootstrap Icons -->
                                    <i class="bi bi-eye-slash"></i>
                                </button>
                            </div>
                        </div>

                        {{-- Tombol Login --}}
                        <div class="d-grid">
                            <!-- Membuat tombol full width -->

                            <button type="submit" class="btn btn-primary fw-semibold">
                                Login
                            </button>
                            <!-- Tombol submit untuk mengirim form -->
                        </div>

                        {{-- Copyright --}}
                        <div class="text-center mt-3">
                            <!-- Teks rata tengah dengan margin top -->

                            <small class="text-muted">
                                © {{ date('Y') }} – Evans Al Fahmi
                                <!-- Tahun otomatis + nama -->
                            </small>
                        </div>

                    </form>
                    <!-- Akhir form login -->

                </div>
                <!-- Akhir card-body -->
            </div>
            <!-- Akhir card -->

        </div>
        <!-- Akhir kolom -->
    </div>
    <!-- Akhir row -->
</div>
<!-- Akhir container -->

{{-- Script JavaScript untuk toggle show/hide password --}}
<script>
    // Menunggu hingga seluruh DOM selesai dimuat
    document.addEventListener('DOMContentLoaded', function () {

        // Mengambil tombol toggle password
        const togglePassword = document.getElementById('togglePassword');

        // Mengambil input password
        const passwordInput = document.getElementById('password');

        // Mengambil ikon di dalam tombol
        const icon = togglePassword.querySelector('i');

        // Event ketika tombol diklik
        togglePassword.addEventListener('click', function () {

            // Mengecek tipe input saat ini
            const type = passwordInput.type === 'password' ? 'text' : 'password';

            // Mengubah tipe input password
            passwordInput.type = type;

            // Mengubah ikon mata (lihat / sembunyikan)
            icon.classList.toggle('bi-eye');
            icon.classList.toggle('bi-eye-slash');
        });
    });
</script>

</body>
</html>
