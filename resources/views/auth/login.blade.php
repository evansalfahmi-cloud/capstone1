<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <!-- Encoding UTF-8 agar mendukung semua karakter -->

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Membuat halaman responsif di semua perangkat -->

    <title>Login</title>
    <!-- Judul halaman -->

    <link rel="icon" type="image/x-icon" href="{{ asset('favicon-web.ico') }}">
    <!-- Favicon website -->

    {{-- Load Bootstrap, Bootstrap Icons, dan custom CSS via Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-light">
<!-- Background halaman menggunakan class Bootstrap -->

<div class="container">
    <!-- Container utama Bootstrap -->

    <div class="row justify-content-center align-items-center min-vh-100">
        <!-- Row untuk memusatkan form secara horizontal & vertikal -->

        <div class="col-11 col-sm-8 col-md-5 col-lg-4">
            <!-- Lebar form login responsif -->

            <div class="card shadow-sm border-0 rounded-4">
                <!-- Card login -->

                <div class="card-body p-4">
                    <!-- Isi card -->

                    {{-- Judul --}}
                    <h4 class="text-center mb-4 fw-semibold">
                        Login
                    </h4>

                    {{-- Pesan error login --}}
                    @if (session('error'))
                        <div class="alert alert-danger small">
                            {{ session('error') }}
                        </div>
                    @endif

                    {{-- Pesan sukses (misal setelah daftar) --}}
                    @if (session('success'))
                        <div class="alert alert-success small">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- Form login --}}
                    <form method="POST" action="{{ route('login.process') }}">
                        @csrf
                        <!-- Token keamanan Laravel -->

                        {{-- Input Username / Email --}}
                        <div class="mb-3">
                            <label for="login" class="form-label small">
                                Username/Email
                            </label>

                            <input
                                type="text"
                                id="login"
                                name="login"
                                class="form-control"
                                placeholder="Masukkan username atau email"
                                required
                                autofocus
                            >
                        </div>

                        {{-- Input Password --}}
                        <div class="mb-4">
                            <label for="password" class="form-label small">
                                Password
                            </label>

                            <div class="input-group">
                                <input
                                    type="password"
                                    id="password"
                                    name="password"
                                    class="form-control"
                                    placeholder="Masukkan password"
                                    required
                                >

                                <button
                                    type="button"
                                    class="btn btn-outline-secondary"
                                    id="togglePassword"
                                >
                                    <i class="bi bi-eye-slash"></i>
                                </button>
                            </div>
                        </div>

                        {{-- Tombol Login --}}
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary fw-semibold">
                                Login
                            </button>
                        </div>

                        {{-- Link Daftar --}}
                        <div class="text-center mt-3">
                            <small class="text-muted">
                                Tidak punya akun?
                                <a href="{{ route('register') }}"
                                   class="text-decoration-none fw-semibold">
                                    Daftar
                                </a>
                            </small>
                        </div>

                        {{-- Copyright --}}
                        <div class="text-center mt-2">
                            <small class="text-muted">
                                © {{ date('Y') }} – Evans Al Fahmi
                            </small>
                        </div>

                    </form>
                    <!-- Akhir form -->

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

{{-- Script toggle show / hide password --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');
    const icon = togglePassword.querySelector('i');

    togglePassword.addEventListener('click', function () {
        const isPassword = passwordInput.type === 'password';

        passwordInput.type = isPassword ? 'text' : 'password';

        icon.classList.toggle('bi-eye');
        icon.classList.toggle('bi-eye-slash');
    });
});
</script>

</body>
</html>
