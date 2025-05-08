<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Selamat Datang - Sistem Manajemen Pengguna</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            text-align: center;
            padding-top: 100px;
        }
        .logo {
            width: 300px;
            margin-bottom: 30px;
        }
        .container {
            background-color: #ffffff;
            display: inline-block;
            margin-top: 60px;
            padding: 60px;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #1e88e5;
            color: #ffffff;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
        }
        .btn:hover {
            background-color: #1565c0;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="{{ asset('images/logo.png') }}" alt="Logo EAD" class="logo">
        <h1>Selamat Datang di Sistem Manajemen Pengguna</h1>
        <p>Silakan klik tombol di bawah untuk mulai mengelola data pengguna.</p>
        <a href="/users/index" class="btn">Kelola Pengguna</a>
    </div>
</body>
</html>
