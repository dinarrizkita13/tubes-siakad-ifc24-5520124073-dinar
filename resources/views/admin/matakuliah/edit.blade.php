@extends('layouts.app')
@section('title', 'Edit Mata Kuliah')

@section('content')
<div class="card" style="max-width:500px">
    <div class="card-header table-card"><span class="text-white">Edit Mata Kuliah</span></div>
    <div class="card-body">
        <form action="{{ route('admin.matakuliah.update', $matakuliah->kode_matakuliah) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-semibold">Kode Mata Kuliah</label>
                <input type="text" class="form-control bg-light" value="{{ $matakuliah->kode_matakuliah }}" disabled>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Nama Mata Kuliah <span class="text-danger">*</span></label>
                <input type="text" name="nama_matakuliah" class="form-control @error('nama_matakuliah') is-invalid @enderror"
                       value="{{ old('nama_matakuliah', $matakuliah->nama_matakuliah) }}">
                @error('nama_matakuliah')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">SKS <span class="text-danger">*</span></label>
                <input type="number" name="sks" class="form-control @error('sks') is-invalid @enderror"
                       value="{{ old('sks', $matakuliah->sks) }}" min="1" max="6">
                @error('sks')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary"><i class="fas fa-save me-1"></i>Update</button>
                <a href="{{ route('admin.matakuliah.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection