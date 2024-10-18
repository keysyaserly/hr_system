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
        .alert-danger {
            border-radius: 5px;
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Konfirmasi Penghapusan Karyawan</h2>

        <div class="alert alert-danger">
            <strong>Perhatian!</strong> Anda akan menghapus data karyawan berikut:
            <ul>
                <li>ID: {{ $employee->id }}</li>
                <li>Nama Lengkap: {{ $employee->full_name }}</li>
            </ul>
            <p>Apakah Anda yakin ingin menghapus data ini? Tindakan ini tidak dapat dibatalkan.</p>
        </div>

        <form action="{{ route('employee.destroy', $employee->id) }}" method="POST">
            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger btn-block">Hapus</button>
            <a href="{{ route('employee.index') }}" class="btn btn-secondary btn-block">Batal</a>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
