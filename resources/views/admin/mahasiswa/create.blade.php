@extends('layouts.app')
@section('title', 'Tambah Mahasiswa')

@section('content')
<div class="card" style="max-width:500px">
    <div class="card-header table-card"><span class="text-white">Tambah Mahasiswa</span></div>
    <div class="card-body">
        <form action="{{ route('admin.mahasiswa.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-semibold">NPM <span class="text-danger">*</span></label>
                <input type="text" name="npm" class="form-control @error('npm') is-invalid @enderror"
                       value="{{ old('npm') }}" maxlength="10" placeholder="10 digit NPM">
                @error('npm')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Nama <span class="text-danger">*</span></label>
                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                       value="{{ old('nama') }}">
                @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary"><i class="fas fa-save me-1"></i>Simpan</button>
                <a href="{{ route('admin.mahasiswa.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection