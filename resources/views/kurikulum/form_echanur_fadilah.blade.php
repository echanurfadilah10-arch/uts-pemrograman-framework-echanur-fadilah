@extends('layouts.layout_echanur_fadilah')
@section('title', $row ? 'Edit Kurikulum' : 'Tambah Kurikulum')
@section('content')
<h3 class="fw-bold mb-3">{{ $row ? 'Edit' : 'Tambah' }} Kurikulum</h3>
<div class="card border-0 shadow-sm">
    <div class="card-body">
        <form method="POST" action="{{ $row ? route('kurikulum.update', $row->id) : route('kurikulum.store') }}">
            @csrf
            @if ($row) @method('PUT') @endif

            <div class="mb-3">
                <label class="form-label">Kode Kurikulum</label>
                <input type="text" name="kode_kurikulum" class="form-control @error('kode_kurikulum') is-invalid @enderror"
                       value="{{ old('kode_kurikulum', $row->kode_kurikulum ?? '') }}">
                @error('kode_kurikulum')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Nama Kurikulum</label>
                <input type="text" name="nama_kurikulum" class="form-control @error('nama_kurikulum') is-invalid @enderror"
                       value="{{ old('nama_kurikulum', $row->nama_kurikulum ?? '') }}">
                @error('nama_kurikulum')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Tahun</label>
                <input type="text" name="tahun" maxlength="4" class="form-control @error('tahun') is-invalid @enderror"
                       value="{{ old('tahun', $row->tahun ?? '') }}">
                @error('tahun')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Keterangan</label>
                <input type="text" name="keterangan" class="form-control @error('keterangan') is-invalid @enderror"
                       value="{{ old('keterangan', $row->keterangan ?? '') }}">
                @error('keterangan')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            @include('partials.tombol_echanur_fadilah', ['route' => 'kurikulum'])
        </form>
    </div>
</div>
@endsection