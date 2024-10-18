@extends('layouts.master')

@section('content')
    <style>
        body {
            background-color: #ffffff;
            /* Latar belakang putih */
        }

        .container {
            background-color: #e9f5ff;
            /* Biru sangat terang untuk kontras */
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 255, 0.1);
            /* Bayangan dengan nuansa biru */
            padding: 20px;
            width: 100%;
            /* Mengatur container agar mengambil 100% lebar dari elemen induk */
            overflow-x: auto;
            /* Menambahkan scroll horizontal jika konten melebihi lebar container */
        }

        .table {
            width: 100%;
            /* Mengatur tabel agar menggunakan seluruh lebar yang tersedia */
            max-width: 100%;
            /* Membatasi tabel agar tidak melampaui container */
            background-color: #ffffff;
            /* Latar belakang putih untuk tabel */
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            /* Bayangan untuk tabel */
        }

        .section-heading {
            margin-top: 30px;
            margin-bottom: 20px;
            border-bottom: 3px solid #1e90ff;
            /* Biru cerah untuk garis bawah */
            padding-bottom: 10px;
            color: #1e90ff;
            /* Biru cerah untuk teks */
        }

        .btn-primary {
            background-color: #1e90ff;
            /* Warna biru cerah */
            border-color: #1e90ff;
        }

        .btn-primary:hover {
            background-color: #1c86ee;
            /* Warna biru yang lebih gelap saat hover */
            border-color: #1b7cdd;
        }

        .btn-secondary {
            background-color: #4682b4;
            /* Warna biru yang lebih netral */
            border-color: #4682b4;
        }

        .btn-secondary:hover {
            background-color: #4169e1;
            /* Biru yang lebih cerah saat hover */
            border-color: #3a5fcd;
        }

        .btn-danger {
            background-color: #ff4500;
            /* Merah-oranye untuk kontras */
            border-color: #ff4500;
        }

        .btn-danger:hover {
            background-color: #ee4000;
            /* Warna merah-oranye yang lebih gelap saat hover */
            border-color: #cd3700;
        }

        .form-inline .form-control {
            width: auto;
            display: inline-block;
        }
    </style>
    <div class="container mt-5">
        <h2 class="text-center section-heading">Daftar Karyawan</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="d-flex justify-content-between mb-3">
            <form class="form-inline" action="{{ route('employee.index') }}" method="GET">
                <input class="form-control mr-2" type="search" name="search" value="{{ request('search') }}"
                    placeholder="Cari Karyawan" aria-label="Search">
                <button class="btn btn-primary" type="submit">Cari</button>
            </form>
            <a href="{{ route('employee.create') }}" class="btn btn-success">Tambah Karyawan</a>
        </div>

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
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <tr>
                        <td>{{ $employee->id_number }}</td>
                        <td>{{ $employee->full_name }}</td>
                        <td>{{ $employee->nickname }}</td>
                        <td>{{ $employee->contract_date }}</td>
                        <td>{{ $employee->work_date }}</td>
                        <td>{{ $employee->status }}</td>
                        <td>{{ $employee->position }}</td>
                        <td>{{ $employee->nuptk }}</td>
                        <td>{{ $employee->gender }}</td>
                        <td>{{ $employee->place_birth }}</td>
                        <td>{{ $employee->birth_date }}</td>
                        <td>{{ $employee->religion }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->hobby }}</td>
                        <td>{{ $employee->marital_status }}</td>
                        <td>{{ $employee->residence_address }}</td>
                        <td>{{ $employee->phone }}</td>
                        <td>{{ $employee->address_emergency }}</td>
                        <td>{{ $employee->phone_emergency }}</td>
                        <td>{{ $employee->blood_type }}</td>
                        <td>{{ $employee->last_education }}</td>
                        <td>{{ $employee->agency }}</td>
                        <td>{{ $employee->graduation_year }}</td>
                        <td>{{ $employee->competency_training_place }}</td>
                        <td>{{ $employee->organizational_experience }}</td>
                        <td>{{ $employee->familyDatas->mate_name ?? '' }}</td>
                        <td>{{ $employee->familyDatas->child_name ?? '' }}</td>
                        <td>{{ $employee->familyDatas->wedding_date ?? '' }}</td>
                        <td>{{ $employee->familyDatas->wedding_certificate_number ?? '' }}</td>

                        <td>
                            <a href="{{ route('employee.edit', $employee->id_number) }}" class="btn btn-secondary">Edit</a>
                        
                            <!-- Form Penghapusan -->
                            <form action="{{ route('employee.destroy', $employee->id_number) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        
                            <form action="{{ route('employee.archive', $employee->id_number) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-danger">Arsipkan</button>
                            </form>
                            
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
