<!DOCTYPE html>
<html>
<head>
    <title>Kayıt Ol</title>
</head>
<body>
    <h1>Kayıt Ol</h1>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div>
            <label>Ad Soyad:</label>
            <input type="text" name="name" required>
        </div>

        <div>
            <label>Email:</label>
            <input type="email" name="email" required>
        </div>

        <div>
            <label>Şifre:</label>
            <input type="password" name="password" required>
        </div>

        <div>
            <label>Şifre Tekrar:</label>
            <input type="password" name="password_confirmation" required>
        </div>

        <button type="submit">Kayıt Ol</button>
    </form>

    @if ($errors->any())
        <div style="color:red;">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

</body>
</html>