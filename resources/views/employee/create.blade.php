@extends('layouts.master')

@section('content')
<style>
  body {
    background-color: #e3f2fd; /* Latar belakang biru terang untuk kesan segar */
    font-family: 'Arial', sans-serif;
    color: #333;
}

.container {
    background-color: #ffffff;
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0, 0, 139, 0.1); /* Bayangan dengan nuansa biru tua */
    padding: 30px;
    transition: transform 0.2s;
}

.container:hover {
    transform: translateY(-5px);
}

.section-heading {
    margin-top: 40px;
    margin-bottom: 25px;
    border-bottom: 3px solid #1976d2; /* Biru cerah untuk garis bawah */
    padding-bottom: 12px;
    color: #1565c0; /* Biru tua untuk judul */
    font-size: 1.75rem;
    font-weight: bold;
    letter-spacing: 1px;
}

.btn {
    padding: 10px 20px;
    border-radius: 50px;
    font-size: 1rem;
    transition: background-color 0.3s, transform 0.2s;
}

.btn-primary {
    background-color: #1e88e5; /* Warna biru cerah untuk tombol utama */
    border: none;
    color: #fff;
}

.btn-primary:hover {
    background-color: #1565c0; /* Warna biru tua saat hover */
    transform: scale(1.05);
}

.btn-secondary {
    background-color: #42a5f5; /* Warna biru sedang untuk tombol sekunder */
    border: none;
    color: #fff;
}

.btn-secondary:hover {
    background-color: #1e88e5; /* Warna biru cerah saat hover */
    transform: scale(1.05);
}

.btn-danger {
    background-color: #f44336; /* Warna merah untuk tombol bahaya */
    border: none;
    color: #fff;
}

.btn-danger:hover {
    background-color: #d32f2f; /* Warna merah tua saat hover */
    transform: scale(1.05);
}

    
</style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Tambah Karyawan</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('employee.store') }}" method="POST"> @csrf

            <!-- Bagian Data Karyawan -->
            <div class="section-heading">
                <h4>Data Karyawan</h4>
            </div>
            <div class="form-group">
                <label for="id_number">No KTP:</label>
                <input type="text" class="form-control" id="id_number" name="id_number" required>
            </div>
            <div class="form-group">
                <label for="full_name">Nama Lengkap:</label>
                <input type="text" class="form-control" id="full_name" name="full_name" required>
            </div>
            <div class="form-group">
                <label for="nickname">Nama Panggilan:</label>
                <input type="text" class="form-control" id="nickname" name="nickname" required>
            </div>
            <div class="form-group">
                <label for="contract_date">Tanggal Kontrak:</label>
                <input type="date" class="form-control" id="contract_date" name="contract_date" required>
            </div>
            <div class="form-group">
                <label for="work_date">Tanggal Masuk Kerja:</label>
                <input type="date" class="form-control" id="work_date" name="work_date" required>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="">Pilih Status</option>
                    <option value="Aktif">Aktif</option>
                    <option value="Berhenti">Berhenti</option>
                </select>
                <div class="form-group">
                    <label for="position">Jabatan:</label>
                    <input type="text" class="form-control" id="position" name="position" required>
                </div>
                <div class="form-group">
                    <label for="nuptk">NUPTK:</label>
                    <input type="text" class="form-control" id="nuptk" name="nuptk" required>
                </div>
                <div class="form-group">
                    <label for="gender">Jenis Kelamin:</label>
                    <select class="form-control" id="gender" name="gender" required>
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="Pria">Pria</option>
                        <option value="Wanita">Wanita</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="place_birth">Tempat Lahir:</label>
                    <input type="text" class="form-control" id="place_birth" name="place_birth" required>
                </div>
                <div class="form-group">
                    <label for="birth_date">Tanggal Lahir:</label>
                    <input type="date" class="form-control" id="birth_date" name="birth_date" required>
                </div>

                <div class="form-group">
                    <label for="religion">Agama:</label>
                    <select class="form-control" id="religion" name="religion" required>
                        <option value="">Pilih Agama</option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Buddha">Buddha</option>
                        <option value="Konghucu">Konghucu</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>email:</strong>
                        <input type="email" name="email" value="{{ old('email') }}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="hobby">Hobi:</label>
                    <input type="text" class="form-control" id="hobby" name="hobby" required>
                </div>
                <select name="marital_status" class="form-control" required>
                    <option value="">status pernikahan</option>
                    <option value="menikah">Menikah</option>
                    <option value="belum">Belum</option>
                </select>

                <div class="form-group">
                    <label for="residence_address">Alamat Tempat Tinggal:</label>
                    <input type="text" class="form-control" id="residence_address" name="residence_address"
                        required>
                </div>
                <div class="form-group">
                    <label for="phone">Telepon:</label>
                    <input type="text" class="form-control" id="phone" name="phone" required>
                </div>
                <div class="form-group">
                    <label for="address_emergency">Alamat Darurat:</label>
                    <input type="text" class="form-control" id="address_emergency" name="address_emergency"
                        required>
                </div>
                <div class="form-group">
                    <label for="phone_emergency">Telepon Darurat:</label>
                    <input type="text" class="form-control" id="phone_emergency" name="phone_emergency" required>
                </div>
                <div class="form-group">
                    <label for="blood_type">Golongan Darah:</label>
                    <select class="form-control" id="blood_type" name="blood_type" required>
                        <option value="">Pilih Golongan Darah</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="AB">AB</option>
                        <option value="O">O</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="last_education">Pendidikan Terakhir:</label>
                    <input type="text" class="form-control" id="last_education" name="last_education" required>
                </div>
                <div class="form-group">
                    <label for="agency">Instansi:</label>
                    <input type="text" class="form-control" id="agency" name="agency" required>
                </div>
                <div class="form-group">
                    <label for="graduation_year">Tahun Lulus:</label>
                    <input type="text" class="form-control" id="graduation_year" name="graduation_year" required>
                </div>
                <div class="form-group">
                    <label for="competency_training_place">Tempat Pelatihan Kompetensi:</label>
                    <input type="text" class="form-control" id="competency_training_place"
                        name="competency_training_place" required>
                </div>
                <div class="form-group">
                    <label for="organizational_experience">Pengalaman Organisasi:</label>
                    <input type="text" class="form-control" id="organizational_experience"
                        name="organizational_experience" required>
                </div>

                <!-- Bagian Data Keluarga -->
                <div class="section-heading">
                    <h4>Data Keluarga</h4>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
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
                    <input type="date" class="form-control" id="wedding_date" name="wedding_date">
                </div>
                <div class="form-group">
                    <label for="wedding_certificate_number">Nomor Sertifikat Pernikahan:</label>
                    <input type="text" class="form-control" id="wedding_certificate_number"
                        name="wedding_certificate_number">
                </div>

                <button type="submit" class="btn btn-primary btn-block">Simpan</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
@endsection

