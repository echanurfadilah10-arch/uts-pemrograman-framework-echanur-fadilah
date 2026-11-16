@extends('layouts.layout_echanur_fadilah')
@section('title', 'Data Siswa')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="fw-bold mb-0"><i class="bi bi-people"></i> Data Siswa</h3>
    <a href="{{ route('siswa.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Tambah Siswa</a>
</div>
<div class="card border-0 shadow-sm">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr><th>No</th><th>NIS</th><th>Nama Siswa</th><th class="text-end">Aksi</th></tr>
            </thead>
            <tbody>
                @forelse ($data as $row)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $row->nis }}</td>
                    <td>{{ $row->nama_siswa }}</td>
                    <td class="text-end">@include('partials.aksi_echanur_fadilah', ['route' => 'siswa', 'id' => $row->id])</td>
                </tr>
                @empty
                <tr><td colspan="4" class="text-center text-muted py-4">Belum ada data.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection