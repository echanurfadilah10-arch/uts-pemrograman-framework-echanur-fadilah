@extends('layouts.layout_echanur_fadilah')
@section('title', $row ? 'Edit Siswa' : 'Tambah Siswa')
@section('content')
<h3 class="fw-bold mb-3">{{ $row ? 'Edit' : 'Tambah' }} Siswa</h3>
<div class="card border-0 shadow-sm">
    <div class="card-body">
        <form method="POST" action="{{ $row ? route('siswa.update', $row->id) : route('siswa.store') }}">
            @csrf
            @if ($row) @method('PUT') @endif

            <div class="mb-3">
                <label class="form-label">NIS</label>
                <input type="text" name="nis" class="form-control @error('nis') is-invalid @enderror"
                       value="{{ old('nis', $row->nis ?? '') }}">
                @error('nis')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Nama Siswa</label>
                <input type="text" name="nama_siswa" class="form-control @error('nama_siswa') is-invalid @enderror"
                       value="{{ old('nama_siswa', $row->nama_siswa ?? '') }}">
                @error('nama_siswa')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            @include('partials.tombol_echanur_fadilah', ['route' => 'siswa'])
        </form>
    </div>
</div>
@endsection