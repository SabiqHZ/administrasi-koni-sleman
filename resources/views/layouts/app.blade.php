<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        nav {
            background-color: #004085;
            color: white;
            padding: 1rem;
        }
        nav a {
            color: white;
            margin-right: 1rem;
            text-decoration: none;
            font-weight: bold;
        }
        nav a:hover {
            text-decoration: underline;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 1rem;
        }
    </style>
</head>
<body>
<nav>
    <div class="container">
        <a href="{{ route('surats.index') }}">Daftar Surat</a>
        <a href="{{ route('surats.create') }}">Buat Surat</a>
    </div>
</nav>
<main class="container mt-4">
    @yield('content')
</main>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>