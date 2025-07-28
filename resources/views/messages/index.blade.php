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
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <span class="navbar-brand mb-0 h1"><i class="bi bi-speedometer2 me-2"></i>Admin Dashboard</span>
            <span class="text-white-50">Mesaj Yönetim Paneli</span>
            <div>
                {{-- Navbar kısmına eklenmeli --}}
                @if(session()->has('user_name'))
                    <span class="me-2 text-white">Hoşgeldin, {{ session('user_name') }}</span>
                    <a href="{{ route('user.logout') }}" class="btn btn-sm btn-outline-danger">Çıkış</a>
                @else
                    <a href="{{ route('user.login') }}" class="btn btn-sm btn-outline-primary">Kullanıcı Giriş</a>
                @endif
            </div>
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

        <!-- Filtreleme, Arama ve Sıralama Formu -->
        <form method="GET" action="{{ route('messages.index') }}" class="row g-2 align-items-center mb-4">
            <div class="col-md-3">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Ara..." class="form-control" />
            </div>
            <div class="col-md-2">
                <select name="filter" class="form-select">
                    <option value="">Tümü</option>
                    <option value="read" {{ request('filter') == 'read' ? 'selected' : '' }}>Okunanlar</option>
                    <option value="unread" {{ request('filter') == 'unread' ? 'selected' : '' }}>Okunmayanlar</option>
                </select>
            </div>
            <div class="col-md-2">
                <select name="sort" class="form-select">
                    <option value="">Sırala</option>
                    <option value="created_at" {{ request('sort') == 'created_at' ? 'selected' : '' }}>Tarihe Göre</option>
                    <option value="user_name" {{ request('sort') == 'user_name' ? 'selected' : '' }}>İsim</option>
                </select>
            </div>
            <div class="col-md-2">
                <select name="direction" class="form-select">
                    <option value="asc" {{ request('direction') == 'asc' ? 'selected' : '' }}>Artan</option>
                    <option value="desc" {{ request('direction') == 'desc' ? 'selected' : '' }}>Azalan</option>
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100"><i class="bi bi-funnel"></i> Uygula</button>
            </div>
        </form>

        <!-- Mesajlar Tablosu -->
        <div class="card shadow-sm">
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th><a href="{{ route('messages.index', array_merge(request()->except(['sort', 'direction', 'page']), ['sort' => 'id', 'direction' => request('sort') == 'id' && request('direction') == 'asc' ? 'desc' : 'asc'])) }}" class="text-decoration-none text-dark">ID
                                @if(request('sort') == 'id')
                                    <i class="bi bi-caret-{{ request('direction') == 'asc' ? 'up' : 'down' }}-fill"></i>
                                @endif
                            </a></th>
                            <th><a href="{{ route('messages.index', array_merge(request()->except(['sort', 'direction', 'page']), ['sort' => 'user_name', 'direction' => request('sort') == 'user_name' && request('direction') == 'asc' ? 'desc' : 'asc'])) }}" class="text-decoration-none text-dark">Ad Soyad
                                @if(request('sort') == 'user_name')
                                    <i class="bi bi-caret-{{ request('direction') == 'asc' ? 'up' : 'down' }}-fill"></i>
                                @endif
                            </a></th>
                            <th><a href="{{ route('messages.index', array_merge(request()->except(['sort', 'direction', 'page']), ['sort' => 'user_mail', 'direction' => request('sort') == 'user_mail' && request('direction') == 'asc' ? 'desc' : 'asc'])) }}" class="text-decoration-none text-dark">Email
                                @if(request('sort') == 'user_mail')
                                    <i class="bi bi-caret-{{ request('direction') == 'asc' ? 'up' : 'down' }}-fill"></i>
                                @endif
                            </a></th>
                            <th><a href="{{ route('messages.index', array_merge(request()->except(['sort', 'direction', 'page']), ['sort' => 'message', 'direction' => request('sort') == 'message' && request('direction') == 'asc' ? 'desc' : 'asc'])) }}" class="text-decoration-none text-dark">Mesaj
                                @if(request('sort') == 'message')
                                    <i class="bi bi-caret-{{ request('direction') == 'asc' ? 'up' : 'down' }}-fill"></i>
                                @endif
                            </a></th>
                            <th><a href="{{ route('messages.index', array_merge(request()->except(['sort', 'direction', 'page']), ['sort' => 'created_at', 'direction' => request('sort') == 'created_at' && request('direction') == 'asc' ? 'desc' : 'asc'])) }}" class="text-decoration-none text-dark">Oluşturulma
                                @if(request('sort') == 'created_at')
                                    <i class="bi bi-caret-{{ request('direction') == 'asc' ? 'up' : 'down' }}-fill"></i>
                                @endif
                            </a></th>
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
                                <a href="{{ route('message.show', $message->id) }}" class="btn btn-info btn-sm mt-1">Detay</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mt-4">
            {{ $messages->appends(request()->query())->links() }}
        </div>
    </div>
</body>
</html>