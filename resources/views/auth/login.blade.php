<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    {{-- Load Bootstrap & Bootstrap Icons via Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-light">

<div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">

        {{-- Kolom form login --}}
        <div class="col-11 col-sm-8 col-md-5 col-lg-4">

            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body p-4">

                    {{-- Judul --}}
                    <h4 class="text-center mb-4 fw-semibold">Login</h4>

                    {{-- Pesan error login --}}
                    @if (session('error'))
                        <div class="alert alert-danger small">
                            {{ session('error') }}
                        </div>
                    @endif

                    {{-- Form login --}}
                    <form method="POST" action="{{ route('login.process') }}">
                        @csrf

                        {{-- Input Username --}}
                        <div class="mb-3">
                            <label for="username" class="form-label small">Username</label>
                            <input
                                type="text"
                                id="username"
                                name="username"
                                class="form-control"
                                placeholder="Masukkan username"
                                required
                                autofocus
                            >
                        </div>

                        {{-- Input Password --}}
                        <div class="mb-4">
                            <label for="password" class="form-label small">Password</label>

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

                        {{-- Copyright --}}
                        <div class="text-center mt-3">
                            <small class="text-muted">
                                © {{ date('Y') }} – Evans Al Fahmi
                            </small>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

{{-- Toggle show/hide password --}}
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
