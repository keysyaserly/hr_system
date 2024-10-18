@extends('layouts.master')

@section('content')
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(36, 236, 40, 0.1);
            padding: 20px;
        }

        .section-heading {
            margin-top: 30px;
            margin-bottom: 20px;
            border-bottom: 2px solid #f3248c;
            padding-bottom: 10px;
            color: #e92424;
        }

        .form-group label {
            font-weight: bold;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #2f9812;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #9ccc19;
        }

        .alert-success {
            border-radius: 5px;
        }
    </style>
    </head>

    <body>
        <div class="container mt-5">
            <h2 class="text-center">Edit Karyawan</h2>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('employee.update', $employee->id_number) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Bagian Data Karyawan -->
                <div class="section-heading">
                    <h4>Data Karyawan</h4>
                </div>
                <div class="form-group">
                    <label for="id_number">Nomor ID:</label>
                    <input type="text" class="form-control" id="id_number" name="id_number"
                        value="{{ old('id_number', $employee->id_number) }}" required>
                </div>
                <div class="form-group">
                    <label for="full_name">Nama Lengkap:</label>
                    <input type="text" class="form-control" id="full_name" name="full_name"
                        value="{{ old('full_name', $employee->full_name) }}" required>
                </div>
                <div class="form-group">
                    <label for="nickname">Nama Panggilan:</label>
                    <input type="text" class="form-control" id="nickname" name="nickname"
                        value="{{ old('nickname', $employee->nickname) }}" required>
                </div>
                <div class="form-group">
                    <label for="email">email :</label>
                    <input type="email" class="form-control" id="email" name="email"
                        value="{{ old('email', $employee->email) }}" required>
                </div>
                <div class="form-group">
                    <label for="contract_date">Tanggal Kontrak:</label>
                    <input type="date" class="form-control" id="contract_date" name="contract_date"
                        value="{{ old('contract_date', $employee->contract_date) }}" required>
                </div>
                <div class="form-group">
                    <label for="work_date">Tanggal Masuk Kerja:</label>
                    <input type="date" class="form-control" id="work_date" name="work_date"
                        value="{{ old('work_date', $employee->work_date) }}" required>
                </div>
                <div class="form-group">
                    <label for="status">Status:</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="">Pilih Status</option>
                        <option value="Aktif" {{ old('status', $employee->status) == 'Aktif' ? 'selected' : '' }}>Aktif
                        </option>
                        <option value="Berhenti" {{ old('status', $employee->status) == 'Berhenti' ? 'selected' : '' }}>
                            Berhenti</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="position">Jabatan:</label>
                    <input type="text" class="form-control" id="position" name="position"
                        value="{{ old('position', $employee->position) }}" required>
                </div>
                <div class="form-group">
                    <label for="nuptk">NUPTK:</label>
                    <input type="text" class="form-control" id="nuptk" name="nuptk"
                        value="{{ old('nuptk', $employee->nuptk) }}" required>
                </div>
                <div class="form-group">
                    <label for="gender">Jenis Kelamin:</label>
                    <select class="form-control" id="gender" name="gender" required>
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="Pria" {{ old('gender', $employee->gender) == 'Pria' ? 'selected' : '' }}>Pria
                        </option>
                        <option value="Wanita" {{ old('gender', $employee->gender) == 'Wanita' ? 'selected' : '' }}>Wanita
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="place_birth">Tempat Lahir:</label>
                    <input type="text" class="form-control" id="place_birth" name="place_birth"
                        value="{{ old('place_birth', $employee->place_birth) }}" required>
                </div>
                <div class="form-group">
                    <label for="birth_date">Tanggal Lahir:</label>
                    <input type="date" class="form-control" id="birth_date" name="birth_date"
                        value="{{ old('birth_date', $employee->birth_date) }}" required>
                </div>
                <div class="form-group">
                    <label for="religion">Agama:</label>
                    <select class="form-control" id="religion" name="religion" required>
                        <option value="">Pilih Agama</option>
                        <option value="Islam" {{ old('religion', $employee->religion) == 'Islam' ? 'selected' : '' }}>
                            Islam</option>
                        <option value="Kristen" {{ old('religion', $employee->religion) == 'Kristen' ? 'selected' : '' }}>
                            Kristen</option>
                        <option value="Katolik" {{ old('religion', $employee->religion) == 'Katolik' ? 'selected' : '' }}>
                            Katolik</option>
                        <option value="Hindu" {{ old('religion', $employee->religion) == 'Hindu' ? 'selected' : '' }}>
                            Hindu</option>
                        <option value="Buddha" {{ old('religion', $employee->religion) == 'Buddha' ? 'selected' : '' }}>
                            Buddha</option>
                        <option value="Konghucu"
                            {{ old('religion', $employee->religion) == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                        <option value="Lainnya" {{ old('religion', $employee->religion) == 'Lainnya' ? 'selected' : '' }}>
                            Lainnya</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="hobby">Hobi:</label>
                    <input type="text" class="form-control" id="hobby" name="hobby"
                        value="{{ old('hobby', $employee->hobby) }}" required>
                </div>
                <div class="form-group">
                    <label for="marital_status">Status Perkawinan:</label>
                    <select class="form-control" id="marital_status" name="marital_status" required>
                        <option value="">Pilih Status Perkawinan</option>
                        <option value="Menikah"
                            {{ old('marital_status', $employee->marital_status) == 'Menikah' ? 'selected' : '' }}>Menikah
                        </option>
                        <option value="Belum Menikah"
                            {{ old('marital_status', $employee->marital_status) == 'Belum Menikah' ? 'selected' : '' }}>
                            Belum Menikah</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="residence_address">Alamat Tempat Tinggal:</label>
                    <input type="text" class="form-control" id="residence_address" name="residence_address"
                        value="{{ old('residence_address', $employee->residence_address) }}" required>
                </div>
                <div class="form-group">
                    <label for="phone">Telepon:</label>
                    <input type="text" class="form-control" id="phone" name="phone"
                        value="{{ old('phone', $employee->phone) }}" required>
                </div>
                <div class="form-group">
                    <label for="address_emergency">Alamat Darurat:</label>
                    <input type="text" class="form-control" id="address_emergency" name="address_emergency"
                        value="{{ old('address_emergency', $employee->address_emergency) }}" required>
                </div>

                <div class="form-group">
                    <label for="phone_emergency">Telepon Darurat:</label>
                    <input type="text" class="form-control" id="phone_emergency" name="phone_emergency"
                        value="{{ old('phone_emergency', $employee->phone_emergency) }}" required>
                </div>
                <div class="form-group">
                    <label for="blood_type">Golongan Darah:</label>
                    <select class="form-control" id="blood_type" name="blood_type" required>
                        <option value="">Pilih Golongan Darah</option>
                        <option value="A" {{ old('blood_type', $employee->blood_type) == 'A' ? 'selected' : '' }}>A
                        </option>
                        <option value="B" {{ old('blood_type', $employee->blood_type) == 'B' ? 'selected' : '' }}>B
                        </option>
                        <option value="AB" {{ old('blood_type', $employee->blood_type) == 'AB' ? 'selected' : '' }}>AB
                        </option>
                        <option value="O" {{ old('blood_type', $employee->blood_type) == 'O' ? 'selected' : '' }}>O
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="last_education">Pendidikan Terakhir:</label>
                    <input type="text" class="form-control" id="last_education" name="last_education"
                        value="{{ old('last_education', $employee->last_education) }}" required>
                </div>
                <div class="form-group">
                    <label for="agency">Instansi:</label>
                    <input type="text" class="form-control" id="agency" name="agency"
                        value="{{ old('agency', $employee->agency) }}" required>
                </div>
                <div class="form-group">
                    <label for="graduation_year">Tahun Lulus:</label>
                    <input type="text" class="form-control" id="graduation_year" name="graduation_year"
                        value="{{ old('graduation_year', $employee->graduation_year) }}" required>
                </div>
                <div class="form-group">
                    <label for="competency_training_place">Tempat Pelatihan Kompetensi:</label>
                    <input type="text" class="form-control" id="competency_training_place"
                        name="competency_training_place"
                        value="{{ old('competency_training_place', $employee->competency_training_place) }}" required>
                </div>
                <div class="form-group">
                    <label for="organizational_experience">Pengalaman Organisasi:</label>
                    <input type="text" class="form-control" id="organizational_experience"
                        name="organizational_experience"
                        value="{{ old('organizational_experience', $employee->organizational_experience) }}" required>
                </div>

                <!-- Bagian Data Keluarga -->
                <div class="section-heading">
                    <h4>Data Keluarga</h4>
                </div>
                <div class="form-group">
                    <label for="mate_name">Nama Pasangan:</label>
                    <input type="text" class="form-control" id="mate_name" name="mate_name">
                </div>
                <div class="form-group">
                    <label for="child_name">Nama Anak:</label>
                    <input type="text" class="form-control" id="child_name" name="child_name">
                </div>
                <div class="form-group">
                    <label for="wedding_date">Tanggal Pernikahan:</label>
                    <input type="date" class="form-control" id="wedding_date" name="wedding_date"
                        value="{{ old('wedding_date', $keluarga->wedding_date ?? '') }}">
                </div>
                <div class="form-group">
                    <label for="wedding_certificate_number">Nomor Sertifikat Pernikahan:</label>
                    <input type="text" class="form-control" id="wedding_certificate_number"
                        name="wedding_certificate_number"
                        value="{{ old('wedding_certificate_number', $keluarga->wedding_certificate_number ?? '') }}">
                </div>

                <button type="submit" class="btn btn-primary btn-block">Simpan</button>
            </form>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
@endsection
