@extends('layouts.app')
@section('title', 'Data Dosen')

@section('content')
<div class="card table-card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span><i class="fas fa-chalkboard-teacher me-2"></i>Daftar Dosen</span>
        <a href="{{ route('admin.dosen.create') }}" class="btn btn-light btn-sm">
            <i class="fas fa-plus me-1"></i>Tambah Dosen
        </a>
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>NIDN</th>
                    <th>Nama</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($dosen as $d)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><code>{{ $d->nidn }}</code></td>
                    <td>{{ $d->nama }}</td>
                    <td>
                        <a href="{{ route('admin.dosen.edit', $d->nidn) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.dosen.destroy', $d->nidn) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Hapus dosen ini?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="4" class="text-center text-muted">Belum ada data dosen</td></tr>
                @endforelse
            </tbody>
        </table>
        {{ $dosen->links() }}
    </div>
</div>
@endsection