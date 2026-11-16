@extends('layouts.layout_echanur_fadilah')
@section('title', $row ? 'Edit Jadwal' : 'Tambah Jadwal')
@section('content')
<h3 class="fw-bold mb-3">{{ $row ? 'Edit' : 'Tambah' }} Jadwal</h3>
<div class="card border-0 shadow-sm">
    <div class="card-body">
        <form method="POST" action="{{ $row ? route('jadwal.update', $row->id) : route('jadwal.store') }}">
            @csrf
            @if ($row) @method('PUT') @endif

            <div class="mb-3">
                <label class="form-label">Kelas</label>
                <select name="kelas_id" class="form-select @error('kelas_id') is-invalid @enderror">
                    <option value="">-- Pilih Kelas --</option>
                    @foreach ($kelas as $k)
                    <option value="{{ $k->id }}" {{ old('kelas_id', $row->kelas_id ?? '') == $k->id ? 'selected' : '' }}>{{ $k->nama_kelas }}</option>
                    @endforeach
                </select>
                @error('kelas_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Pelajaran</label>
                <select name="pelajaran_id" class="form-select @error('pelajaran_id') is-invalid @enderror">
                    <option value="">-- Pilih Pelajaran --</option>
                    @foreach ($pelajaran as $p)
                    <option value="{{ $p->id }}" {{ old('pelajaran_id', $row->pelajaran_id ?? '') == $p->id ? 'selected' : '' }}>{{ $p->nama_pelajaran }}</option>
                    @endforeach
                </select>
                @error('pelajaran_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Hari</label>
                <select name="hari" class="form-select @error('hari') is-invalid @enderror">
                    <option value="">-- Pilih Hari --</option>
                    @foreach (['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'] as $h)
                    <option value="{{ $h }}" {{ old('hari', $row->hari ?? '') == $h ? 'selected' : '' }}>{{ $h }}</option>
                    @endforeach
                </select>
                @error('hari')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Jam Mulai</label>
                    <input type="time" name="jam_mulai" class="form-control @error('jam_mulai') is-invalid @enderror"
                           value="{{ old('jam_mulai', $row->jam_mulai ?? '') }}">
                    @error('jam_mulai')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Jam Selesai</label>
                    <input type="time" name="jam_selesai" class="form-control @error('jam_selesai') is-invalid @enderror"
                           value="{{ old('jam_selesai', $row->jam_selesai ?? '') }}">
                    @error('jam_selesai')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>

            @include('partials.tombol_echanur_fadilah', ['route' => 'jadwal'])
        </form>
    </div>
</div>
@endsection