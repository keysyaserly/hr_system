<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Keluarga</title>
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
        <h2 class="text-center">Edit Data Keluarga</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('family_datas.update', $familyData->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="mate_name">Nama Pasangan:</label>
                <input type="text" class="form-control" id="mate_name" name="mate_name" value="{{ $familyData->mate_name }}">
            </div>
            <div class="form-group">
                <label for="child_name">Nama Anak:</label>
                <input type="text" class="form-control" id="child_name" name="child_name" value="{{ $familyData->child_name }}">
            </div>
            <div class="form-group">
                <label for="wedding_date">Tanggal Pernikahan:</label>
                <input type="date" class="form-control" id="wedding_date" name="wedding_date" value="{{ $familyData->wedding_date ? $familyData->wedding_date->format('Y-m-d') : '' }}">
            </div>
            <div class="form-group">
                <label for="wedding_certificate_number">Nomor Sertifikat Pernikahan:</label>
                <input type="text" class="form-control" id="wedding_certificate_number" name="wedding_certificate_number" value="{{ $familyData->wedding_certificate_number }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
