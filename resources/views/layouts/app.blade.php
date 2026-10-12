<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
    <title>@yield('title','Portal Berita')</title>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark mb-5">
        <div class="container">
            <div class="navbar-brand d-flex align-items-center">
                <p>SMK Negeri 2 Kraksaan</p>
            </div>
            <div class="float-end">
                @if (session()->has('key'))
                    <a href="/home" class="navbar-brand">Home</a>
                    <a href="{{ route('berita.index') }}" class="btn btn-outline-secondary">Data Berita</a>
                    <a href="/logout" class=" btn btn-outline-secondary ">Logout</a>
                @else
                    <a href="/" class="navbar-brand">Home</a>
                    <a href="/about" class="navbar-brand">About</a>
                    <a href="/login" class="navbar-brand btn btn-outline-secondary">Login</a>
                @endif
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <footer class="text-body-secondary py-5">
        <div class="container">
            <p class="fload-end mb-1">&copy; 2026 | Eka Selya</p>
        </div>
    </footer>
</body>
</html>