<!-- resources/views/messages/index.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Mesajlar Paneli</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        body { background: #f8fafc; }
        .dashboard-card { min-width: 180px; }
        .table thead { background: #343a40; color: #fff; }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-dark bg-dark mb-4">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1"><i class="bi bi-speedometer2 me-2"></i>Admin Dashboard</span>
            <span class="text-white-50">Mesaj Yönetim Paneli</span>
        </div>
    </nav>

    <div class="container">
        <!-- Özet Kartlar -->
        <div class="row mb-4 g-3">
            <div class="col-md-4">
                <div class="card dashboard-card border-primary shadow-sm">
                    <div class="card-body d-flex align-items-center">
                        <i class="bi bi-envelope-fill text-primary fs-2 me-3"></i>
                        <div>
                            <div class="fw-bold">Toplam Mesaj</div>
                            <div class="fs-4">{{ $totalMessages ?? ($messages->count() ?? 0) }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card dashboard-card border-success shadow-sm">
                    <div class="card-body d-flex align-items-center">
                        <i class="bi bi-check-circle-fill text-success fs-2 me-3"></i>
                        <div>
                            <div class="fw-bold">Okunan Mesaj</div>
                            <div class="fs-4">{{ $readMessages ?? ($messages->where('is_read', true)->count() ?? 0) }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card dashboard-card border-danger shadow-sm">
                    <div class="card-body d-flex align-items-center">
                        <i class="bi bi-x-circle-fill text-danger fs-2 me-3"></i>
                        <div>
                            <div class="fw-bold">Okunmayan Mesaj</div>
                            <div class="fs-4">{{ $unreadMessages ?? ($messages->where('is_read', false)->count() ?? 0) }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Arama ve Filtreler -->
        <div class="d-flex align-items-center mb-3 gap-2 flex-wrap">
            <form method="GET" action="{{ route('messages.index') }}" class="mb-0">
                <input type="text" name="search" placeholder="Ara..." value="{{ request('search') }}" class="form-control d-inline-block w-auto" style="min-width:180px;">
                <button type="submit" class="btn btn-sm btn-secondary ms-1"><i class="bi bi-search"></i> Ara</button>
            </form>
            <div class="btn-group ms-2" role="group" aria-label="Filtreler">
                <a href="{{ route('messages.index') }}" class="btn btn-outline-secondary btn-sm @if(!request('filter')) active @endif">
                    <i class="bi bi-card-list me-1"></i> Tümü
                </a>
                <a href="{{ route('messages.index', ['filter' => 'read']) }}" class="btn btn-outline-success btn-sm @if(request('filter') == 'read') active @endif">
                    <i class="bi bi-check2-circle me-1"></i> Okunanlar
                </a>
                <a href="{{ route('messages.index', ['filter' => 'unread']) }}" class="btn btn-outline-danger btn-sm @if(request('filter') == 'unread') active @endif">
                    <i class="bi bi-x-circle me-1"></i> Okunmayanlar
                </a>
            </div>
        </div>

        <!-- Mesajlar Tablosu -->
        <div class="card shadow-sm">
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Ad Soyad</th>
                            <th>Email</th>
                            <th>Mesaj</th>
                            <th>Oluşturulma</th>
                            <th>Okundu Bilgisi</th>
                            <th>İşlem</th>
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
                            <td>
                                @if($message->is_read)
                                    <span class="badge bg-success"><i class="bi bi-check-circle"></i> Okundu</span>
                                @else
                                    <span class="badge bg-danger"><i class="bi bi-x-circle"></i> Okunmadı</span>
                                @endif
                            </td>
                            <td>
                                <form method="POST" action="{{ route('messages.toggleRead', $message->id) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-sm {{ $message->is_read ? 'btn-outline-warning' : 'btn-outline-success' }}">
                                        <i class="bi {{ $message->is_read ? 'bi-eye-slash' : 'bi-eye' }} me-1"></i>
                                        {{ $message->is_read ? 'Okunmadı Yap' : 'Okundu Yap' }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>