@extends('layouts.app')
@section('title', 'Data Mahasiswa')

@section('content')
<div class="card table-card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span><i class="fas fa-user-graduate me-2"></i>Daftar Mahasiswa</span>
        <a href="{{ route('admin.mahasiswa.create') }}" class="btn btn-light btn-sm">
            <i class="fas fa-plus me-1"></i>Tambah
        </a>
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead class="table-light">
                <tr><th>No</th><th>NPM</th><th>Nama</th><th>Aksi</th></tr>
            </thead>
            <tbody>
                @forelse($mahasiswa as $mhs)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><code>{{ $mhs->npm }}</code></td>
                    <td>{{ $mhs->nama }}</td>
                    <td>
                        <a href="{{ route('admin.mahasiswa.edit', $mhs->npm) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.mahasiswa.destroy', $mhs->npm) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Hapus mahasiswa ini?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="4" class="text-center text-muted">Belum ada data</td></tr>
                @endforelse
            </tbody>
        </table>
        {{ $mahasiswa->links() }}
    </div>
</div>
@endsection