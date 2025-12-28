<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <!-- Encoding UTF-8 -->

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Responsive layout -->

    <title>Daftar</title>
    <!-- Judul halaman -->

    <link rel="icon" type="image/x-icon" href="{{ asset('favicon-web.ico') }}">
    <!-- Favicon -->

    {{-- Load Bootstrap, Bootstrap Icons, dan CSS utama --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-light">

<div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">

        <div class="col-11 col-sm-8 col-md-5 col-lg-4">
            <!-- Kolom form register -->

            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body p-4">

                    {{-- Judul --}}
                    <h4 class="text-center mb-4 fw-semibold">
                        Daftar Akun
                    </h4>

                    {{-- Pesan error validasi --}}
                    @if ($errors->any())
                        <div class="alert alert-danger small">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Form register --}}
                    <form method="POST" action="{{ route('register.store') }}">
                        @csrf

                        {{-- Nama --}}
                        <div class="mb-3">
                            <label class="form-label small">
                                Nama Lengkap
                            </label>
                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                value="{{ old('name') }}"
                                required
                            >
                        </div>

                        {{-- Username --}}
                        <div class="mb-3">
                            <label class="form-label small">
                                Username
                            </label>
                            <input
                                type="text"
                                name="username"
                                class="form-control"
                                value="{{ old('username') }}"
                                required
                            >
                        </div>

                        {{-- Email --}}
                        <div class="mb-3">
                            <label class="form-label small">
                                Email
                            </label>
                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                value="{{ old('email') }}"
                                required
                            >
                        </div>

                        {{-- Password --}}
                        <div class="mb-3">
                            <label class="form-label small">
                                Password
                            </label>
                            <input
                                type="password"
                                name="password"
                                class="form-control"
                                required
                            >
                        </div>

                        {{-- Konfirmasi Password --}}
                        <div class="mb-4">
                            <label class="form-label small">
                                Konfirmasi Password
                            </label>
                            <input
                                type="password"
                                name="password_confirmation"
                                class="form-control"
                                required
                            >
                        </div>

                        {{-- Tombol Daftar --}}
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary fw-semibold">
                                Daftar
                            </button>
                        </div>

                        {{-- Link ke Login --}}
                        <div class="text-center mt-3">
                            <small class="text-muted">
                                Sudah punya akun?
                                <a href="{{ route('login') }}"
                                   class="text-decoration-none fw-semibold">
                                    Login
                                </a>
                            </small>
                        </div>

                    </form>
                    <!-- End form -->

                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>
