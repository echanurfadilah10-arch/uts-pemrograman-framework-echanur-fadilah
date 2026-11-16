@extends('layouts.layout_echanur_fadilah')
@section('title', $row ? 'Edit Kelas' : 'Tambah Kelas')
@section('content')
<h3 class="fw-bold mb-3">{{ $row ? 'Edit' : 'Tambah' }} Kelas</h3>
<div class="card border-0 shadow-sm">
    <div class="card-body">
        <form method="POST" action="{{ $row ? route('kelas.update', $row->id) : route('kelas.store') }}">
            @csrf
            @if ($row) @method('PUT') @endif

            <div class="mb-3">
                <label class="form-label">Kode Kelas</label>
                <input type="text" name="kode_kelas" class="form-control @error('kode_kelas') is-invalid @enderror"
                       value="{{ old('kode_kelas', $row->kode_kelas ?? '') }}">
                @error('kode_kelas')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Nama Kelas</label>
                <input type="text" name="nama_kelas" class="form-control @error('nama_kelas') is-invalid @enderror"
                       value="{{ old('nama_kelas', $row->nama_kelas ?? '') }}">
                @error('nama_kelas')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Tingkat</label>
                <input type="text" name="tingkat" class="form-control @error('tingkat') is-invalid @enderror"
                       value="{{ old('tingkat', $row->tingkat ?? '') }}">
                @error('tingkat')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Wali Kelas</label>
                <input type="text" name="wali_kelas" class="form-control @error('wali_kelas') is-invalid @enderror"
                       value="{{ old('wali_kelas', $row->wali_kelas ?? '') }}">
                @error('wali_kelas')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            @include('partials.tombol_echanur_fadilah', ['route' => 'kelas'])
        </form>
    </div>
</div>
@endsection