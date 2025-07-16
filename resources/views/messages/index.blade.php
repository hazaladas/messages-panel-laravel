<!-- resources/views/messages/index.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Mesajlar Paneli</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5">

    <div class="container">
        <h2 class="mb-4">Gelen Mesajlar</h2>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Ad Soyad</th>
                    <th>Email</th>
                    <th>Mesaj</th>
                    <th>Oluşturulma</th>
                    <th>Okundu bilgisi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($messages as $message)
                <tr>
                    <td>{{ $message->id }}</td>
                    <td>{{ $message->user_name }}</td>
                    <td>{{ $message->user_mail }}</td>
                    <td>{{ Str::limit($message->message, 50) }}</td>
                    <td>{{ $message->created_at->format('d.m.Y H:i') }}</td>
                    <td>{{ $message->is_read ? 'Okundu' : 'Okunmadı'}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>