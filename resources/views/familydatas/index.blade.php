<!DOCTYPE html>
<html>
<head>
    <title>Daftar Data Keluarga</title>
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
        <h2 class="text-center">Daftar Data Keluarga</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('family_datas.create') }}" class="btn btn-primary mb-3">Tambah Data Keluarga</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nama Pasangan</th>
                    <th>Nama Anak</th>
                    <th>Tanggal Pernikahan</th>
                    <th>Nomor Sertifikat Pernikahan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($familyDatas as $familyData)
                    <tr>
                        <td>{{ $familyData->mate_name }}</td>
                        <td>{{ $familyData->child_name }}</td>
                        <td>{{ $familyData->wedding_date ? $familyData->wedding_date->format('d-m-Y') : '-' }}</td>
                        <td>{{ $familyData->wedding_certificate_number }}</td>
                        <td>
                            <a href="{{ route('family_datas.show', $familyData->id) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('family_datas.edit', $familyData->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('family_datas.destroy', $familyData->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
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
</body>
</html>
