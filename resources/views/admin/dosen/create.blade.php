@extends('layouts.app')
@section('title', 'Tambah Dosen')

@section('content')
<div class="card" style="max-width:500px">
    <div class="card-header table-card"><span class="text-white">Tambah Dosen</span></div>
    <div class="card-body">
        <form action="{{ route('admin.dosen.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-semibold">NIDN <span class="text-danger">*</span></label>
                <input type="text" name="nidn" class="form-control @error('nidn') is-invalid @enderror"
                       value="{{ old('nidn') }}" maxlength="10" placeholder="10 digit NIDN">
                @error('nidn')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Nama <span class="text-danger">*</span></label>
                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                       value="{{ old('nama') }}" placeholder="Nama lengkap dosen">
                @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary"><i class="fas fa-save me-1"></i>Simpan</button>
                <a href="{{ route('admin.dosen.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection