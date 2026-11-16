@extends('layouts.layout_echanur_fadilah')
@section('title', $row ? 'Edit Pelajaran' : 'Tambah Pelajaran')
@section('content')
<h3 class="fw-bold mb-3">{{ $row ? 'Edit' : 'Tambah' }} Pelajaran</h3>
<div class="card border-0 shadow-sm">
    <div class="card-body">
        <form method="POST" action="{{ $row ? route('pelajaran.update', $row->id) : route('pelajaran.store') }}">
            @csrf
            @if ($row) @method('PUT') @endif

            <div class="mb-3">
                <label class="form-label">Kode Pelajaran</label>
                <input type="text" name="kode_pelajaran" class="form-control @error('kode_pelajaran') is-invalid @enderror"
                       value="{{ old('kode_pelajaran', $row->kode_pelajaran ?? '') }}">
                @error('kode_pelajaran')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Nama Pelajaran</label>
                <input type="text" name="nama_pelajaran" class="form-control @error('nama_pelajaran') is-invalid @enderror"
                       value="{{ old('nama_pelajaran', $row->nama_pelajaran ?? '') }}">
                @error('nama_pelajaran')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            @include('partials.tombol_echanur_fadilah', ['route' => 'pelajaran'])
        </form>
    </div>
</div>
@endsection