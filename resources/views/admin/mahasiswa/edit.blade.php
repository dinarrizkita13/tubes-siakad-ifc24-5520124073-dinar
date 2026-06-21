@extends('layouts.app')
@section('title', 'Edit Mahasiswa')

@section('content')
<div class="card" style="max-width:500px">
    <div class="card-header table-card"><span class="text-white">Edit Mahasiswa</span></div>
    <div class="card-body">
        <form action="{{ route('admin.mahasiswa.update', $mahasiswa->npm) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-semibold">NPM</label>
                <input type="text" class="form-control bg-light" value="{{ $mahasiswa->npm }}" disabled>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Nama <span class="text-danger">*</span></label>
                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                       value="{{ old('nama', $mahasiswa->nama) }}">
                @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary"><i class="fas fa-save me-1"></i>Update</button>
                <a href="{{ route('admin.mahasiswa.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection