@extends('layouts.app')
@section('title', 'Dashboard Mahasiswa')

@section('content')
<div class="row g-4 mb-4">
    <div class="col-md-4">
        <div class="card stat-card border-primary p-3">
            <div class="d-flex align-items-center">
                <div class="bg-primary bg-opacity-10 rounded-circle p-3 me-3">
                    <i class="fas fa-clipboard-list fa-2x text-primary"></i>
                </div>
                <div>
                    <div class="text-muted small">Mata Kuliah Diambil</div>
                    <div class="fw-bold fs-3">{{ $krs->count() }}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card stat-card border-success p-3">
            <div class="d-flex align-items-center">
                <div class="bg-success bg-opacity-10 rounded-circle p-3 me-3">
                    <i class="fas fa-star fa-2x text-success"></i>
                </div>
                <div>
                    <div class="text-muted small">Total SKS</div>
                    <div class="fw-bold fs-3">{{ $totalSks }}</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card table-card">
    <div class="card-header">
        <i class="fas fa-clipboard-list me-2"></i>KRS Saya
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead class="table-light">
                <tr><th>No</th><th>Kode</th><th>Mata Kuliah</th><th>SKS</th></tr>
            </thead>
            <tbody>
                @forelse($krs as $k)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><code>{{ $k->kode_matakuliah }}</code></td>
                    <td>{{ $k->matakuliah->nama_matakuliah }}</td>
                    <td><span class="badge bg-info">{{ $k->matakuliah->sks }} SKS</span></td>
                </tr>
                @empty
                <tr><td colspan="4" class="text-center text-muted">Belum ada KRS</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection