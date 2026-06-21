@extends('layouts.app')
@section('title', 'Data Jadwal')

@section('content')
<div class="card table-card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span><i class="fas fa-calendar-alt me-2"></i>Daftar Jadwal</span>
        <a href="{{ route('admin.jadwal.create') }}" class="btn btn-light btn-sm">
            <i class="fas fa-plus me-1"></i>Tambah
        </a>
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead class="table-light">
                <tr><th>No</th><th>Mata Kuliah</th><th>Dosen</th><th>Kelas</th><th>Hari</th><th>Jam</th><th>Aksi</th></tr>
            </thead>
            <tbody>
                @forelse($jadwal as $j)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $j->matakuliah->nama_matakuliah }}</td>
                    <td>{{ $j->dosen->nama }}</td>
                    <td><span class="badge bg-secondary">Kelas {{ $j->kelas }}</span></td>
                    <td>{{ $j->hari }}</td>
                    <td>{{ \Carbon\Carbon::parse($j->jam)->format('H:i') }}</td>
                    <td>
                        <a href="{{ route('admin.jadwal.edit', $j->id) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.jadwal.destroy', $j->id) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Hapus jadwal ini?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="7" class="text-center text-muted">Belum ada jadwal</td></tr>
                @endforelse
            </tbody>
        </table>
        {{ $jadwal->links() }}
    </div>
</div>
@endsection