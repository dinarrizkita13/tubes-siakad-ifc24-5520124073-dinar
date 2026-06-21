@extends('layouts.app')
@section('title', 'Edit Jadwal')

@section('content')
<div class="card" style="max-width:600px">
    <div class="card-header table-card"><span class="text-white">Edit Jadwal</span></div>
    <div class="card-body">
        <form action="{{ route('admin.jadwal.update', $jadwal->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-semibold">Mata Kuliah</label>
                <select name="kode_matakuliah" class="form-select @error('kode_matakuliah') is-invalid @enderror">
                    @foreach($matakuliah as $mk)
                        <option value="{{ $mk->kode_matakuliah }}"
                            {{ old('kode_matakuliah', $jadwal->kode_matakuliah) == $mk->kode_matakuliah ? 'selected' : '' }}>
                            {{ $mk->kode_matakuliah }} - {{ $mk->nama_matakuliah }}
                        </option>
                    @endforeach
                </select>
                @error('kode_matakuliah')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Dosen</label>
                <select name="nidn" class="form-select @error('nidn') is-invalid @enderror">
                    @foreach($dosen as $d)
                        <option value="{{ $d->nidn }}"
                            {{ old('nidn', $jadwal->nidn) == $d->nidn ? 'selected' : '' }}>
                            {{ $d->nidn }} - {{ $d->nama }}
                        </option>
                    @endforeach
                </select>
                @error('nidn')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Kelas</label>
                    <select name="kelas" class="form-select">
                        @foreach(['A','B','C','D','E'] as $k)
                            <option value="{{ $k }}" {{ old('kelas', $jadwal->kelas) == $k ? 'selected' : '' }}>{{ $k }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Hari</label>
                    <select name="hari" class="form-select">
                        @foreach(['Senin','Selasa','Rabu','Kamis','Jumat'] as $h)
                            <option value="{{ $h }}" {{ old('hari', $jadwal->hari) == $h ? 'selected' : '' }}>{{ $h }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Jam</label>
                <input type="time" name="jam" class="form-control"
                       value="{{ old('jam', \Carbon\Carbon::parse($jadwal->jam)->format('H:i')) }}">
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary"><i class="fas fa-save me-1"></i>Update</button>
                <a href="{{ route('admin.jadwal.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection