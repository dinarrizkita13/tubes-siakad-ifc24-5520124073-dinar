@extends('layouts.app')
@section('title', 'Data Mata Kuliah')

@section('content')
<div class="card table-card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span><i class="fas fa-book me-2"></i>Daftar Mata Kuliah</span>
        <a href="{{ route('admin.matakuliah.create') }}" class="btn btn-light btn-sm">
            <i class="fas fa-plus me-1"></i>Tambah
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
                        <a href="{{ route('admin.matakuliah.edit', $mk->kode_matakuliah) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.matakuliah.destroy', $mk->kode_matakuliah) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Hapus mata kuliah ini?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" class="text-center text-muted">Belum ada data</td></tr>
                @endforelse
            </tbody>
        </table>
        {{ $matakuliah->links() }}
    </div>
</div>
@endsection