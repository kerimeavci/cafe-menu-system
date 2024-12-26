<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cafe Menu</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/css/app.css'])
</head>
<body class="bg-light d-flex flex-column min-vh-100">

<!-- Header -->
<header class="bg-dark text-white shadow-sm py-3">
    <div class="container d-flex justify-content-between align-items-center">
        <h1 class="h4 mb-0">Cafe Menu</h1>
        <nav>
            <ul class="nav">
                <li class="nav-item"><a href="{{ route('home') }}" class="nav-link text-white">Menü</a></li>
                <li class="nav-item"><a href="{{ route('login') }}" class="nav-link text-white">Giriş Yap</a></li>
                <li class="nav-item"><a href="{{ route('register') }}" class="nav-link text-white">Kayıt Ol</a></li>
            </ul>
        </nav>
    </div>
</header>

<!-- Flash Messages -->
@if ($errors->any())
    <div class="container mt-3">
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

<!-- Welcome Section -->
<div class="bg-secondary text-white py-4">
    <div class="container text-center">
        <h2 class="h4 mb-0">Hoşgeldiniz, {{ $user->user_name }}</h2>
    </div>
</div>

<!-- Main Content -->
<main class="flex-grow-1 container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow border-0">
                <div class="card-header bg-dark text-white">
                    <h5 class="mb-0">Kategoriler</h5>
                </div>

                <div class="card-body">
                    <!-- Vue Component -->
                    <example-component></example-component>
                </div>
            </div>
        </div>
    </div>
</main>
<main class="flex-grow-1 container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow border-0">
                <div class="card-header bg-dark text-white">
                    <h5 class="mb-0">Ürünler</h5>
                </div>
                <div class="card-body">
                    <!-- Vue Component -->

                </div>
            </div>
        </div>
    </div>
</main>

<!-- Footer -->
<footer class="bg-dark text-white py-3 mt-4">
    <div class="container text-center">
        <p class="mb-0">&copy; 2024 Cafe Menu System. Tüm Hakları Saklıdır.</p>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
@vite(['resources/js/app.js'])
</body>
</html>
