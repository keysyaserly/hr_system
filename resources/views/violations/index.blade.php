@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>Daftar Pelanggaran</h1>
        <a href="{{ route('violations.create') }}" class="btn btn-primary mb-3">Tambah Pelanggaran</a>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                {{ $message }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>NO KTP</th>
                    <th>Jenis Pelanggaran</th>
                    <th>Tanggal Pelanggaran</th>
                    <th>Deskripsi</th>
                    <th>Catatan HRD</th> <!-- Tambahkan kolom untuk Catatan HRD -->
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($violations as $violation)
                    <tr>
                        <td>{{ $violation->id_number }}</td>
                        <td>{{ $violation->jenis_pelanggaran }}</td>
                        <td>{{ $violation->tanggal_pelanggaran }}</td>
                        <td>{{ $violation->deskripsi }}</td>
                        <td>{{ $violation->catatan_hrd ?? 'Tidak ada' }}</td> <!-- Tampilkan Catatan HRD -->
                        <td>
                            <a href="{{ route('violations.show', $violation->id) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('violations.edit', $violation->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('violations.destroy', $violation->id) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
