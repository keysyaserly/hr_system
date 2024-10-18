<!DOCTYPE html>
<html>
<head>
    <title>Data Keluarga</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
</head>
<body>
    <div class="container mt-5">
        <div class="section-heading">
            <h4>Data Keluarga</h4>
        </div>

        <div class="form-group">
            <label>Nama Pasangan:</label>
            <p>{{ $employee->family->mate_name ?? '-' }}</p>
        </div>
        <div class="form-group">
            <label>Nama Anak:</label>
            <p>{{ $employee->family->child_name ?? '-' }}</p>
        </div>
        <div class="form-group">
            <label>Tanggal Pernikahan:</label>
            <p>{{ $employee->family->wedding_date ? $employee->family->wedding_date->format('d-m-Y') : '-' }}</p>
        </div>
        <div class="form-group">
            <label>Nomor Sertifikat Pernikahan:</label>
            <p>{{ $employee->family->wedding_certificate_number ?? '-' }}</p>
        </div>

        <!-- Tombol Edit dan Hapus -->
        <div class="text-center mt-4">
            <a href="{{ route('employee.edit', $employee->id_number) }}" class="btn btn-primary">Edit</a>

            <!-- Form untuk hapus -->
            <form action="{{ route('employee.destroy', $employee->id_number) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</button>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
