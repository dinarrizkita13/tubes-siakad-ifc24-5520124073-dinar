@extends('layouts.app')
@section('title', 'Data KRS')

@section('content')
<div class="card table-card">
    <div class="card-header">
        <i class="fas fa-clipboard-list me-2"></i>Data KRS Semua Mahasiswa
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead class="table-light">
                <tr><th>No</th><th>NPM</th><th>Nama Mahasiswa</th><th>Mata Kuliah</th><th>SKS</th></tr>
            </thead>
            <tbody>
                @forelse($krs as $k)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><code>{{ $k->npm }}</code></td>
                    <td>{{ $k->mahasiswa->nama }}</td>
                    <td>{{ $k->matakuliah->nama_matakuliah }}</td>
                    <td><span class="badge bg-info">{{ $k->matakuliah->sks }} SKS</span></td>
                </tr>
                @empty
                <tr><td colspan="5" class="text-center text-muted">Belum ada data KRS</td></tr>
                @endforelse
            </tbody>
        </table>
        {{ $krs->links() }}
    </div>
</div>
@endsection