<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - Echanur Fadilah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body { background: #f4f6fb; }
        .navbar-main { background: linear-gradient(90deg, #4f46e5, #7c3aed); }
        .navbar-main .nav-link { color: rgba(255,255,255,.8); border-radius: 8px; }
        .navbar-main .nav-link:hover, .navbar-main .nav-link.active { color: #fff; background: rgba(255,255,255,.18); }
        footer { color: #6b7280; }
    </style>
</head>
<body>
@php
    $menu = [
        'dashboard' => ['Dashboard', 'bi-speedometer2'],
        'siswa'     => ['Siswa', 'bi-people'],
        'pelajaran' => ['Pelajaran', 'bi-book'],
        'kurikulum' => ['Kurikulum', 'bi-journal-text'],
        'kelas'     => ['Kelas', 'bi-building'],
        'jadwal'    => ['Jadwal', 'bi-calendar-week'],
        'nilai'     => ['Nilai', 'bi-clipboard-data'],
    ];
@endphp

<nav class="navbar navbar-expand-lg navbar-dark navbar-main shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/dashboard"><i class="bi bi-mortarboard-fill"></i> Akademik</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuUtama">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="menuUtama">
            <ul class="navbar-nav me-auto gap-1">
                @foreach ($menu as $path => $item)
                <li class="nav-item">
                    <a class="nav-link {{ request()->is($path . '*') ? 'active' : '' }}" href="/{{ $path }}">
                        <i class="bi {{ $item[1] }}"></i> {{ $item[0] }}
                    </a>
                </li>
                @endforeach
            </ul>
            <div class="d-flex align-items-center gap-2 text-white">
                <span><i class="bi bi-person-circle"></i> {{ auth()->user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST" class="m-0">
                    @csrf
                    <button class="btn btn-sm btn-light"><i class="bi bi-box-arrow-right"></i> Logout</button>
                </form>
            </div>
        </div>
    </div>
</nav>

<main class="container py-4">
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @yield('content')
</main>

<footer class="text-center py-3 small">
    UTS Pemrograman Framework - Echanur Fadilah
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>