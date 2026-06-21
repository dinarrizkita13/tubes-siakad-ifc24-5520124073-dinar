@extends('layouts.app')
@section('title', 'Edit Dosen')

@section('content')
<div class="card" style="max-width:500px">
    <div class="card-header table-card"><span class="text-white">Edit Dosen</span></div>
    <div class="card-body">
        <form action="{{ route('admin.dosen.update', $dosen->nidn) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-semibold">NIDN</label>
                <input type="text" class="form-control bg-light" value="{{ $dosen->nidn }}" disabled>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Nama <span class="text-danger">*</span></label>
                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                       value="{{ old('nama', $dosen->nama) }}">
                @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary"><i class="fas fa-save me-1"></i>Update</button>
                <a href="{{ route('admin.dosen.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection