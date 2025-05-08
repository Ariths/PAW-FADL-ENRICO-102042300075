<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Manajemen Pengguna')</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
        }

        header {
            background-color: #3287d1;
            color: white;
            padding: 20px 30px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h1 {
            margin: 0;
            font-size: 24px;
        }

        nav {
            display: flex;
            align-items: center;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin-right: 20px;
            font-weight: bold;
            padding: 6px 12px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        nav a:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }

        .logo {
            height: 40px;
            width: auto;
            margin-right: 30px;
            margin-left: 20px;
        }

        .container {
            max-width: 900px;
            margin: 40px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        }

        .alert {
            padding: 10px 15px;
            background-color: #d1e7dd;
            color: #0f5132;
            margin-bottom: 20px;
            border-left: 5px solid #0f5132;
            border-radius: 6px;
        }

        footer {
            margin-top: 60px;
            text-align: center;
            font-size: 14px;
            color: #aaa;
        }

        div.footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            color: white;
            padding: 20px 0;
        }

    </style>
</head>
<body>

    <header>
        <h1>Aplikasi Manajemen Pengguna</h1>
        <nav>
            <a href="{{ route('users.index') }}">📄 Daftar Pengguna</a>
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo">  
        </nav>
    </header>

    <div class="container">
        @if(session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif

        @yield('content')
    </div>

    <div class="footer">
        <footer>
            &copy; {{ date('Y') }} Universitas EAD - Praktikum Web Application Development
        </footer>
    </div>

</body>
</html>
