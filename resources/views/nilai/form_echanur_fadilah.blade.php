@extends('layouts.layout_echanur_fadilah')
@section('title', $row ? 'Edit Nilai' : 'Tambah Nilai')
@section('content')
<h3 class="fw-bold mb-3">{{ $row ? 'Edit' : 'Tambah' }} Nilai</h3>
<div class="card border-0 shadow-sm">
    <div class="card-body">
        <form method="POST" action="{{ $row ? route('nilai.update', $row->id) : route('nilai.store') }}">
            @csrf
            @if ($row) @method('PUT') @endif

            <div class="mb-3">
                <label class="form-label">Siswa</label>
                <select name="siswa_id" class="form-select @error('siswa_id') is-invalid @enderror">
                    <option value="">-- Pilih Siswa --</option>
                    @foreach ($siswa as $s)
                    <option value="{{ $s->id }}" {{ old('siswa_id', $row->siswa_id ?? '') == $s->id ? 'selected' : '' }}>{{ $s->nis }} - {{ $s->nama_siswa }}</option>
                    @endforeach
                </select>
                @error('siswa_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
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
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Nilai Tugas</label>
                    <input type="number" name="nilai_tugas" min="0" max="100" class="form-control @error('nilai_tugas') is-invalid @enderror"
                           value="{{ old('nilai_tugas', $row->nilai_tugas ?? '') }}">
                    @error('nilai_tugas')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Nilai UTS</label>
                    <input type="number" name="nilai_uts" min="0" max="100" class="form-control @error('nilai_uts') is-invalid @enderror"
                           value="{{ old('nilai_uts', $row->nilai_uts ?? '') }}">
                    @error('nilai_uts')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Nilai UAS</label>
                    <input type="number" name="nilai_uas" min="0" max="100" class="form-control @error('nilai_uas') is-invalid @enderror"
                           value="{{ old('nilai_uas', $row->nilai_uas ?? '') }}">
                    @error('nilai_uas')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>

            @include('partials.tombol_echanur_fadilah', ['route' => 'nilai'])
        </form>
    </div>
</div>
@endsection