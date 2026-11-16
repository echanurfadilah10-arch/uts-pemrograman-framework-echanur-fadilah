@extends('layouts.layout_echanur_fadilah')
@section('title', 'Data Kurikulum')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="fw-bold mb-0"><i class="bi bi-journal-text"></i> Data Kurikulum</h3>
    <a href="{{ route('kurikulum.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Tambah Kurikulum</a>
</div>
<div class="card border-0 shadow-sm">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr><th>No</th><th>Kode</th><th>Nama Kurikulum</th><th>Tahun</th><th>Keterangan</th><th class="text-end">Aksi</th></tr>
            </thead>
            <tbody>
                @forelse ($data as $row)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $row->kode_kurikulum }}</td>
                    <td>{{ $row->nama_kurikulum }}</td>
                    <td>{{ $row->tahun }}</td>
                    <td>{{ $row->keterangan }}</td>
                    <td class="text-end">@include('partials.aksi_echanur_fadilah', ['route' => 'kurikulum', 'id' => $row->id])</td>
                </tr>
                @empty
                <tr><td colspan="6" class="text-center text-muted py-4">Belum ada data.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection