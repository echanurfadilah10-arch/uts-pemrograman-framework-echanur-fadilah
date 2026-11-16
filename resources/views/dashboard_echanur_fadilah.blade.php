@extends('layouts.layout_echanur_fadilah')
@section('title', 'Dashboard')
@section('content')
<h3 class="fw-bold mb-1">Selamat datang, {{ auth()->user()->name }}</h3>
<p class="text-muted mb-4">Ringkasan data aplikasi akademik.</p>

@php
    $kartu = [
        'siswa'     => ['Siswa', 'bi-people', 'primary'],
        'pelajaran' => ['Pelajaran', 'bi-book', 'success'],
        'kurikulum' => ['Kurikulum', 'bi-journal-text', 'info'],
        'kelas'     => ['Kelas', 'bi-building', 'warning'],
        'jadwal'    => ['Jadwal', 'bi-calendar-week', 'danger'],
        'nilai'     => ['Nilai', 'bi-clipboard-data', 'secondary'],
    ];
@endphp

<div class="row g-3">
    @foreach ($kartu as $key => $k)
    <div class="col-12 col-sm-6 col-lg-4">
        <a href="/{{ $key }}" class="text-decoration-none">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="rounded-3 bg-{{ $k[2] }} bg-opacity-10 text-{{ $k[2] }} p-3">
                        <i class="bi {{ $k[1] }}" style="font-size: 2rem;"></i>
                    </div>
                    <div>
                        <div class="text-muted">{{ $k[0] }}</div>
                        <div class="fs-2 fw-bold text-dark">{{ $total[$key] }}</div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    @endforeach
</div>
@endsection