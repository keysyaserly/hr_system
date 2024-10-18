<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'HRS')</title>
    <!-- Link ke Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS Custom -->
    <style>
        body {
            background-color: #e9ecef; /* Warna latar belakang abu-abu terang */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #212529; /* Warna teks utama */
        }
        .container {
            margin-top: 50px;
        }
        .card {
            border-radius: 0; /* Menghilangkan sudut lonjong */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Bayangan card */
        }
        .card-header {
            background-color: #343a40; /* Warna abu-abu gelap */
            color: #fff;
            border-bottom: 1px solid #ced4da; /* Garis bawah */
            font-weight: bold;
        }
        .card-body {
            background-color: #fff;
            padding: 1.5rem;
        }
        .btn-primary {
            background-color: #28a745; /* Warna hijau */
            border: none;
            border-radius: 0; /* Menghilangkan sudut lonjong */
        }
        .btn-primary:hover {
            background-color: #218838; /* Warna hijau gelap */
        }
        .logout-link {
            color: #dc3545; /* Warna merah untuk logout */
            text-decoration: none;
            font-weight: 500;
        }
        .logout-link:hover {
            text-decoration: underline;
        }
        .form-group label {
            font-weight: bold;
        }
        .form-control {
            border-radius: 0; /* Menghilangkan sudut lonjong pada input */
        }
    </style>
</head>
<body>

<div class="container">
    @yield('content')
</div>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

    
</a>

<!-- Script Bootstrap JS dan dependensi -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
