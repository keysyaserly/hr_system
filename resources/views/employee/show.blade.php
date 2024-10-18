@extends('layouts.master')

@section('content')

    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .section-heading {
            margin-top: 30px;
            margin-bottom: 20px;
            border-bottom: 2px solid #007bff;
            padding-bottom: 10px;
            color: #007bff;
        }
        .form-group label {
            font-weight: bold;
        }
        .btn {
            margin-right: 10px;
        }
    </style>

    <div class="container mt-5">
        <h2 class="text-center">Detail Karyawan</h2>

        <!-- Bagian Data Karyawan -->
        <div class="section-heading">
            <h4>Data Karyawan</h4>
        </div>
        <div class="form-group">
            <label>Nomor ID:</label>
            <p>{{ $employee->id_number }}</p>
        </div>
        <div class="form-group">
            <label>Nama Lengkap:</label>
            <p>{{ $employee->full_name }}</p>
        </div>
        <div class="form-group">
            <label>Nama Panggilan:</label>
            <p>{{ $employee->nickname }}</p>
        </div>
        <div class="form-group">
            <label>Tanggal Kontrak:</label>
            <p>{{ $employee->contract_date }}</p>
        </div>
        <div class="form-group">
            <label>Tanggal Masuk Kerja:</label>
            <p>{{ $employee->work_date }}</p>
        </div>
        <div class="form-group">
            <label>Status:</label>
            <p>{{ $employee->status }}</p>
        </div>
        <div class="form-group">
            <label>Jabatan:</label>
            <p>{{ $employee->position }}</p>
        </div>
        <div class="form-group">
            <label>NUPTK:</label>
            <p>{{ $employee->nuptk }}</p>
        </div>
        <div class="form-group">
            <label>Jenis Kelamin:</label>
            <p>{{ $employee->gender }}</p>
        </div>
        <div class="form-group">
            <label>Tempat Lahir:</label>
            <p>{{ $employee->place_birth }}</p>
        </div>
        <div class="form-group">
            <label>Tanggal Lahir:</label>
            <p>{{ $employee->birth_date }}</p>
        </div>
        <div class="form-group">
            <label>Agama:</label>
            <p>{{ $employee->religion }}</p>
        </div>
        <div class="form-group">
            <label>Email:</label>
            <p>{{ $employee->email }}</p>
        </div>
        <div class="form-group">
            <label>Hobi:</label>
            <p>{{ $employee->hobby }}</p>
        </div>
        <div class="form-group">
            <label>Status Perkawinan:</label>
            <p>{{ $employee->marital_status }}</p>
        </div>
        <div class="form-group">
            <label>Alamat Tempat Tinggal:</label>
            <p>{{ $employee->residence_address }}</p>
        </div>
        <div class="form-group">
            <label>Telepon:</label>
            <p>{{ $employee->phone }}</p>
        </div>
        <div class="form-group">
            <label>Alamat Darurat:</label>
            <p>{{ $employee->address_emergency }}</p>
        </div>
        <div class="form-group">
            <label>Telepon Darurat:</label>
            <p>{{ $employee->phone_emergency }}</p>
        </div>
        <div class="form-group">
            <label>Golongan Darah:</label>
            <p>{{ $employee->blood_type }}</p>
        </div>
        <div class="form-group">
            <label>Pendidikan Terakhir:</label>
            <p>{{ $employee->last_education }}</p>
        </div>
        <div class="form-group">
            <label>Instansi:</label>
            <p>{{ $employee->agency }}</p>
        </div>
        <div class="form-group">
            <label>Tahun Lulus:</label>
            <p>{{ $employee->graduation_year }}</p>
        </div>
        <div class="form-group">
            <label>Tempat Pelatihan Kompetensi:</label>
            <p>{{ $employee->competency_training_place }}</p>
        </div>
        <div class="form-group">
            <label>Pengalaman Organisasi:</label>
            <p>{{ $employee->organizational_experience }}</p>
        </div>

        <!-- Bagian Data Keluarga -->
        <div class="section-heading">
            <h4>Data Keluarga</h4>
        </div>
        <div class="form-group">
            <label>Nama Pasangan:</label>
            <p>{{ $employee->mate_name ?? '-' }}</p>
        </div>
        <div class="form-group">
            <label>Nama Anak:</label>
            <p>{{ $employee->child_name ?? '-' }}</p>
        </div>
        <div class="form-group">
            <label>Tanggal Pernikahan:</label>
            <p>{{ $employee->wedding_date ?? '-' }}</p>
        </div>
        <div class="form-group">
            <label>Nomor Sertifikat Pernikahan:</label>
            <p>{{ $employee->wedding_certificate_number ?? '-' }}</p>
        </div>

        <!-- Tombol Edit dan Hapus -->
        <div class="text-center mt-4">
            <a href="{{ route('employee.edit', $employee->id_number) }}" class="btn btn-primary">Edit</a>

            <!-- Form untuk hapus -->
            <form action="{{ route('employee.destroy', $employee->id_number) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Hapus</button>
            </form>

        
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
