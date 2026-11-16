<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Echanur Fadilah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body { min-height: 100vh; background: linear-gradient(135deg, #4f46e5, #7c3aed); display: flex; align-items: center; }
        .login-card { max-width: 420px; width: 100%; border: 0; border-radius: 16px; }
    </style>
</head>
<body>
<div class="container d-flex justify-content-center">
    <div class="card login-card shadow-lg">
        <div class="card-body p-4 p-md-5">
            <div class="text-center mb-4">
                <i class="bi bi-mortarboard-fill text-primary" style="font-size: 3rem;"></i>
                <h4 class="fw-bold mt-2 mb-0">Aplikasi Akademik</h4>
                <small class="text-muted">Silakan login untuk melanjutkan</small>
            </div>

            <form method="POST" action="/login">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                        <input type="email" name="email" value="{{ old('email') }}"
                               class="form-control @error('email') is-invalid @enderror" placeholder="email@contoh.com" autofocus>
                    </div>
                    @error('email')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                        <input type="password" name="password"
                               class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                    </div>
                    @error('password')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                    <label class="form-check-label" for="remember">Ingat saya</label>
                </div>
                <button class="btn btn-primary w-100 py-2"><i class="bi bi-box-arrow-in-right"></i> Login</button>
            </form>

            <div class="alert alert-info small mt-4 mb-0">
                <strong>Akun UTS:</strong><br>
                Email: echanur@uts.test<br>
                Password: password123
            </div>
        </div>
    </div>
</div>
</body>
</html>