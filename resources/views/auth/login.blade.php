<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Giriş Yap</title>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .login-container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .login-container h2 {
            margin-bottom: 20px;
            text-align: center;
            color: #495057;
        }
        .form-control:focus {
            box-shadow: none;
            border-color: #86b7fe;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="login-container">
        <h2>Giriş Yap</h2>
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

        <form action="{{ route('login_post') }}" method="POST">
            @csrf
            <div class="form-floating mb-3">
                <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" required>
                <label for="email">E-posta</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" name="password" id="Password" placeholder="Şifre" required>
                <label for="Password">Şifre</label>
            </div>
            <div class="d-grid">
                <button class="btn btn-primary btn-lg" type="submit">Giriş Yap</button>
            </div>
        </form>
        <hr>
        <div class="text-center">
            <p>Hesabınız yok mu? <a href="{{ route('register') }}">Kayıt Ol</a></p>
            <a href="{{ route('home') }}" class="btn btn-link">Anasayfaya Git</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
