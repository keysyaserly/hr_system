@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Edit Pelanggaran</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('violations.update', $violation->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="id_number" class="form-label">ID Number</label>
            <input type="text" class="form-control" id="id_number" name="id_number" value="{{ old('id_number', $violation->id_number) }}" required>
        </div>
        <div class="mb-3">
            <label for="jenis_pelanggaran" class="form-label">Jenis Pelanggaran</label>
            <input type="text" class="form-control" id="jenis_pelanggaran" name="jenis_pelanggaran" value="{{ old('jenis_pelanggaran', $violation->jenis_pelanggaran) }}" required>
        </div>
        <div class="mb-3">
            <label for="tanggal_pelanggaran" class="form-label">Tanggal Pelanggaran</label>
            <input type="date" class="form-control" id="tanggal_pelanggaran" name="tanggal_pelanggaran" value="{{ old('tanggal_pelanggaran', $violation->tanggal_pelanggaran) }}" required>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required>{{ old('deskripsi', $violation->deskripsi) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="catatan_hrd" class="form-label">Catatan HRD</label>
            <textarea class="form-control" id="catatan_hrd" name="catatan_hrd" rows="3">{{ old('catatan_hrd', $violation->catatan_hrd) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Perbarui</button>
        <a href="{{ route('violations.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
