@extends('layouts.app')
@section('title', 'Ambil Mata Kuliah')

@section('content')
<div class="card table-card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span><i class="fas fa-plus-circle me-2"></i>Ambil Mata Kuliah</span>
        <a href="{{ route('mahasiswa.krs.index') }}" class="btn btn-light btn-sm">
            <i class="fas fa-arrow-left me-1"></i>Kembali
        </a>
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead class="table-light">
                <tr><th>No</th><th>Kode</th><th>Nama Mata Kuliah</th><th>SKS</th><th>Aksi</th></tr>
            </thead>
            <tbody>
                @forelse($matakuliah as $mk)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><code>{{ $mk->kode_matakuliah }}</code></td>
                    <td>{{ $mk->nama_matakuliah }}</td>
                    <td><span class="badge bg-info">{{ $mk->sks }} SKS</span></td>
                    <td>
                        <form action="{{ route('mahasiswa.krs.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="kode_matakuliah" value="{{ $mk->kode_matakuliah }}">
                            <button class="btn btn-success btn-sm">
                                <i class="fas fa-plus me-1"></i>Ambil
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" class="text-center text-muted">Semua mata kuliah sudah diambil</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection