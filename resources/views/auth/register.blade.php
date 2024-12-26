<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Kayıt Ol</title>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .register-container {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .register-container h2 {
            margin-bottom: 20px;
            text-align: center;
            color: #3a5fa2;
        }
        .form-control:focus {
            box-shadow: none;
            border-color: #86b7fe;
        }
        .alert {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="register-container">
        <h2>Kayıt Ol</h2>
        <p class="text-center">Eğer kayıtlıysanız, <a href="{{ route('login') }}">Giriş Yap</a> sayfasına gidin veya <a href="{{ route('home') }}">Anasayfa</a>ya dönün.</p>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('register_post') }}" method="POST">
            @csrf
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="name" id="name" placeholder="Adınızı girin" required>
                <label for="name">Ad</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="surname" id="surname" placeholder="Soyadınızı girin" required>
                <label for="surname">Soyad</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" required>
                <label for="email">E-posta</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" name="password" id="password" placeholder="Şifrenizi girin" required>
                <label for="password">Şifre</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="user_name" id="user_name" placeholder="Kullanıcı adı girin" required>
                <label for="user_name">Kullanıcı Adı</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="cafe_name" id="cafe_name" placeholder="Kullanıcı kafe adını girin" required>
                <label for="cafe_name">Kullanıcı Kafe Adı</label>
            </div>
            <div class="d-grid">
                <button class="btn btn-primary btn-lg" type="submit">Kayıt Ol</button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
