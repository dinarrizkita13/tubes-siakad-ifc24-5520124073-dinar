@extends('layouts.app')
@section('title', 'Jadwal Kuliah')

@section('content')
<div class="card table-card">
    <div class="card-header">
        <i class="fas fa-calendar-alt me-2"></i>Jadwal Perkuliahan
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead class="table-light">
                <tr><th>No</th><th>Mata Kuliah</th><th>Dosen</th><th>Kelas</th><th>Hari</th><th>Jam</th></tr>
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
                </tr>
                @empty
                <tr><td colspan="6" class="text-center text-muted">Belum ada jadwal</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection