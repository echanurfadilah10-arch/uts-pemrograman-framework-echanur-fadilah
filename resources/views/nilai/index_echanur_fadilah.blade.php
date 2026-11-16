@extends('layouts.layout_echanur_fadilah')
@section('title', 'Data Nilai')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="fw-bold mb-0"><i class="bi bi-clipboard-data"></i> Data Nilai</h3>
    <a href="{{ route('nilai.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Tambah Nilai</a>
</div>
<div class="card border-0 shadow-sm">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr><th>No</th><th>Nama Siswa</th><th>Pelajaran</th><th>Tugas</th><th>UTS</th><th>UAS</th><th>Nilai Akhir</th><th class="text-end">Aksi</th></tr>
            </thead>
            <tbody>
                @forelse ($data as $row)
                @php $akhir = round(($row->nilai_tugas * 0.3) + ($row->nilai_uts * 0.3) + ($row->nilai_uas * 0.4), 2); @endphp
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $row->nama_siswa }}</td>
                    <td>{{ $row->nama_pelajaran }}</td>
                    <td>{{ $row->nilai_tugas }}</td>
                    <td>{{ $row->nilai_uts }}</td>
                    <td>{{ $row->nilai_uas }}</td>
                    <td><span class="badge bg-{{ $akhir >= 75 ? 'success' : 'danger' }}">{{ $akhir }}</span></td>
                    <td class="text-end">@include('partials.aksi_echanur_fadilah', ['route' => 'nilai', 'id' => $row->id])</td>
                </tr>
                @empty
                <tr><td colspan="8" class="text-center text-muted py-4">Belum ada data.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection