@extends('layouts.layout_echanur_fadilah')
@section('title', 'Data Jadwal')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="fw-bold mb-0"><i class="bi bi-calendar-week"></i> Data Jadwal</h3>
    <a href="{{ route('jadwal.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Tambah Jadwal</a>
</div>
<div class="card border-0 shadow-sm">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr><th>No</th><th>Kelas</th><th>Pelajaran</th><th>Hari</th><th>Jam Mulai</th><th>Jam Selesai</th><th class="text-end">Aksi</th></tr>
            </thead>
            <tbody>
                @forelse ($data as $row)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $row->nama_kelas }}</td>
                    <td>{{ $row->nama_pelajaran }}</td>
                    <td>{{ $row->hari }}</td>
                    <td>{{ $row->jam_mulai }}</td>
                    <td>{{ $row->jam_selesai }}</td>
                    <td class="text-end">@include('partials.aksi_echanur_fadilah', ['route' => 'jadwal', 'id' => $row->id])</td>
                </tr>
                @empty
                <tr><td colspan="7" class="text-center text-muted py-4">Belum ada data.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection