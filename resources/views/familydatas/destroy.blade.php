<!DOCTYPE html>
<html>
<head>
    <title>Konfirmasi Penghapusan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Konfirmasi Penghapusan Data Keluarga</h2>
        
        <div class="section-heading">
            <h4>Apakah Anda yakin ingin menghapus data keluarga berikut?</h4>
        </div>

        <form action="{{ route('family_datas.destroy', $familyData->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
            @csrf
            @method('DELETE')
            
            <div class="form-group">
                <label for="mate_name">Nama Pasangan:</label>
                <p>{{ $familyData->mate_name }}</p>
            </div>
            <div class="form-group">
                <label for="child_name">Nama Anak:</label>
                <p>{{ $familyData->child_name }}</p>
            </div>
            <div class="form-group">
                <label for="wedding_date">Tanggal Pernikahan:</label>
                <p>{{ $familyData->wedding_date ? $familyData->wedding_date->format('d-m-Y') : '-' }}</p>
            </div>
            <div class="form-group">
                <label for="wedding_certificate_number">Nomor Sertifikat Pernikahan:</label>
                <p>{{ $familyData->wedding_certificate_number }}</p>
            </div>
            
            <button type="submit" class="btn btn-danger">Hapus</button>
            <a href="{{ route('family_datas.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
