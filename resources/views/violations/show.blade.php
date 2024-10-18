@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Detail Pelanggaran</h1>

    <div class="mb-3">
        <label for="id_number" class="form-label">ID Number</label>
        <p>{{ $violation->id_number }}</p>
    </div>
    <div class="mb-3">
        <label for="jenis_pelanggaran" class="form-label">Jenis Pelanggaran</label>
        <p>{{ $violation->jenis_pelanggaran }}</p>
    </div>
    <div class="mb-3">
        <label for="tanggal_pelanggaran" class="form-label">Tanggal Pelanggaran</label>
        <p>{{ $violation->tanggal_pelanggaran }}</p>
    </div>
    <div class="mb-3">
        <label for="deskripsi" class="form-label">Deskripsi</label>
        <p>{{ $violation->deskripsi }}</p>
    </div>
    <div class="mb-3">
        <label for="catatan_hrd" class="form-label">Catatan HRD</label>
        <p>{{ $violation->catatan_hrd }}</p>
    </div>
</div>
@endsection
