@extends('layouts.app')
@section('title', 'KRS Saya')

@section('content')
<div class="card table-card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span><i class="fas fa-clipboard-list me-2"></i>Kartu Rencana Studi</span>
        <div>
            <span class="badge bg-light text-dark me-2">Total SKS: <strong>{{ $totalSks }}</strong></span>
            <a href="{{ route('mahasiswa.krs.create') }}" class="btn btn-light btn-sm">
                <i class="fas fa-plus me-1"></i>Ambil Matkul
            </a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead class="table-light">
                <tr><th>No</th><th>Kode</th><th>Mata Kuliah</th><th>SKS</th><th>Aksi</th></tr>
            </thead>
            <tbody>
                @forelse($krs as $k)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><code>{{ $k->kode_matakuliah }}</code></td>
                    <td>{{ $k->matakuliah->nama_matakuliah }}</td>
                    <td><span class="badge bg-info">{{ $k->matakuliah->sks }} SKS</span></td>
                    <td>
                        <form action="{{ route('mahasiswa.krs.destroy', $k->id) }}" method="POST"
                              onsubmit="return confirm('Drop mata kuliah ini?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm"><i class="fas fa-times me-1"></i>Drop</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" class="text-center text-muted">Belum ada mata kuliah di KRS</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection