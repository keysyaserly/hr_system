@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Data Karyawan yang Diarsipkan</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No KTP</th>
                <th>Nama Lengkap</th>
                <th>Nama Panggilan</th>
                <th>Tanggal Kontrak</th>
                <th>Tanggal Masuk Kerja</th>
                <th>Status</th>
                <th>Jabatan</th>
                <th>NUPTK</th>
                <th>Jenis Kelamin</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Agama</th>
                <th>Email</th>
                <th>Hobi</th>
                <th>Status Pernikahan</th>
                <th>Alamat Tempat Tinggal</th>
                <th>Telepon</th>
                <th>Alamat Darurat</th>
                <th>Telepon Darurat</th>
                <th>Golongan Darah</th>
                <th>Pendidikan Terakhir</th>
                <th>Instansi</th>
                <th>Tahun Lulus</th>
                <th>Tempat Pelatihan Kompetensi</th>
                <th>Pengalaman Organisasi</th>
                <th>Nama Pasangan</th>
                <th>Nama Anak</th>
                <th>Tanggal Pernikahan</th>
                <th>Nomor Sertifikat Pernikahan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($archivedEmployees as $employee)
                <tr>
                    <td>{{ $employee->id_number }}</td>
                    <td>{{ $employee->full_name }}</td>
                    <td>{{ $employee->nickname }}</td>
                    <td>{{ $employee->contract_date }}</td>
                    <td>{{ $employee->start_work_date }}</td>
                    <td>{{ $employee->status }}</td>
                    <td>{{ $employee->position }}</td>
                    <td>{{ $employee->nuptk }}</td>
                    <td>{{ $employee->gender }}</td>
                    <td>{{ $employee->birth_place }}</td>
                    <td>{{ $employee->birth_date }}</td>
                    <td>{{ $employee->religion }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->hobby }}</td>
                    <td>{{ $employee->marital_status }}</td>
                    <td>{{ $employee->address }}</td>
                    <td>{{ $employee->phone }}</td>
                    <td>{{ $employee->emergency_address }}</td>
                    <td>{{ $employee->emergency_phone }}</td>
                    <td>{{ $employee->blood_type }}</td>
                    <td>{{ $employee->last_education }}</td>
                    <td>{{ $employee->institution }}</td>
                    <td>{{ $employee->graduation_year }}</td>
                    <td>{{ $employee->training_place }}</td>
                    <td>{{ $employee->organizational_experience }}</td>
                    <td>{{ optional($employee->family_datas)->mate_name ?? 'N/A' }}</td>
                    <td>{{ optional($employee->family_datas)->child_name ?? 'N/A' }}</td>
                    <td>{{ optional($employee->family_datas)->wedding_date ?? 'N/A' }}</td>
                    <td>{{ optional($employee->family_datas)->wedding_certificate_number ?? 'N/A' }}</td>
                    <td>
                        <!-- Tombol untuk restore data -->
                        <form action="{{ route('employee.restore', $employee->id_number) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-warning">Pulihkan</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="30" class="text-center">Tidak ada data karyawan yang diarsipkan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
