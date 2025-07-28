<!-- resources/views/home.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Ana Sayfa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f8fafc; }
        .center-box {
            max-width: 400px;
            margin: 80px auto;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.08);
            padding: 40px 32px 32px 32px;
            text-align: center;
        }
        .btn-lg-custom {
            font-size: 1.2rem;
            padding: 0.75rem 2rem;
            margin-bottom: 12px;
        }
    </style>
</head>
<body>
    <div class="center-box">
        <h1 class="mb-3">Admin Paneline Hoş Geldiniz!</h1>
        <p class="mb-4 text-secondary">Lütfen giriş yapmak istediğiniz bölümü seçin.</p>
        <a href="/messages" class="btn btn-outline-primary btn-lg btn-lg-custom w-100">Admin Girişi</a>
        <a href="{{ route('user.login') }}" class="btn btn-outline-primary btn-lg btn-lg-custom w-100">Kullanıcı Girişi</a>
    </div>
</body>
</html>