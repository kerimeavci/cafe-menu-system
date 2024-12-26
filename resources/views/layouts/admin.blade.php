<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Paneli</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome Icons için CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" href="https://via.placeholder.com/16x16.png" type="image/png">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 col-lg-2 p-3 bg-dark text-white" style="height: 100vh;">
            <h4 class="text-center mb-4">Dashboard</h4>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{route('admin_dashboard')}}">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="{{ route('product') }}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Urunler
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('products') }}">Ürünler</a></li>
                        <li><a class="dropdown-item" href="{{ route('product_create') }}">Ürün Ekle</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="{{route('categories')}}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Kategoriler
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('categories') }}">Kategoriler</a></li>
                        <li><a class="dropdown-item" href="{{ route('categories_create') }}">Kategori Ekle</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{route('logout')}}">
                        <i class="fas fa-users"></i> Çıkış Yap
                    </a>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="col-md-9 col-lg-10 p-4">
            @yield('content')
        </div>
    </div>
</div>

<!-- Bootstrap JS ve bağımlılıkları -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
