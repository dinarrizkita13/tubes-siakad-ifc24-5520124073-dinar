@extends('layouts.app')
@section('title', 'Dashboard Admin')

@section('content')
<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="card stat-card border-primary p-3">
            <div class="d-flex align-items-center">
                <div class="bg-primary bg-opacity-10 rounded-circle p-3 me-3">
                    <i class="fas fa-chalkboard-teacher fa-2x text-primary"></i>
                </div>
                <div>
                    <div class="text-muted small">Total Dosen</div>
                    <div class="fw-bold fs-3">{{ $stats['dosen'] }}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card border-success p-3">
            <div class="d-flex align-items-center">
                <div class="bg-success bg-opacity-10 rounded-circle p-3 me-3">
                    <i class="fas fa-user-graduate fa-2x text-success"></i>
                </div>
                <div>
                    <div class="text-muted small">Total Mahasiswa</div>
                    <div class="fw-bold fs-3">{{ $stats['mahasiswa'] }}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card border-warning p-3">
            <div class="d-flex align-items-center">
                <div class="bg-warning bg-opacity-10 rounded-circle p-3 me-3">
                    <i class="fas fa-book fa-2x text-warning"></i>
                </div>
                <div>
                    <div class="text-muted small">Mata Kuliah</div>
                    <div class="fw-bold fs-3">{{ $stats['matakuliah'] }}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card border-info p-3">
            <div class="d-flex align-items-center">
                <div class="bg-info bg-opacity-10 rounded-circle p-3 me-3">
                    <i class="fas fa-calendar-alt fa-2x text-info"></i>
                </div>
                <div>
                    <div class="text-muted small">Total Jadwal</div>
                    <div class="fw-bold fs-3">{{ $stats['jadwal'] }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection