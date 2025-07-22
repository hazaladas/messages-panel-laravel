<!DOCTYPE html>
<html>
<head>
    <title>Mesaj Detayı</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5">

    <div class="container">
        <h2>Mesaj Detayı</h2>
        <div class="card">
            <div class="card-body">
                <p><strong>Ad Soyad:</strong> {{ $message->user_name }}</p>
                <p><strong>Email:</strong> {{ $message->user_mail }}</p>
                <p><strong>Mesaj:</strong> {{ $message->message }}</p>
                <p><strong>Okundu Bilgisi:</strong> {{ $message->is_read ? 'Okundu' : 'Okunmadı' }}</p>
                <p><strong>Oluşturulma Tarihi:</strong> {{ $message->created_at->format('d.m.Y H:i') }}</p>
            </div>
        </div>
        <a href="{{ route('messages.index') }}" class="btn btn-secondary mt-3">Geri Dön</a>
    </div>

</body>
</html>