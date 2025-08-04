<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Mesaj Paneli</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        /* Animated background particles */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle at 20% 80%, rgba(120, 119, 198, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(255, 119, 198, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 40% 40%, rgba(120, 219, 255, 0.3) 0%, transparent 50%);
            animation: float 20s ease-in-out infinite;
            z-index: -1;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            33% { transform: translateY(-20px) rotate(1deg); }
            66% { transform: translateY(10px) rotate(-1deg); }
        }

        .navbar {
            background: rgba(255, 255, 255, 0.95) !important;
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            color: #667eea !important;
            font-weight: 700;
            font-size: 1.3rem;
        }

        .navbar-text {
            color: #6c757d !important;
            font-weight: 500;
        }

        .container {
            padding: 30px 20px;
            position: relative;
            z-index: 1;
        }

        .dashboard-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            min-height: 120px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .dashboard-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }

        .dashboard-card:hover::before {
            left: 100%;
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .card-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 20px;
            color: white;
            font-size: 1.5rem;
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
        }

        .card-title {
            font-size: 0.9rem;
            font-weight: 600;
            color: #6c757d;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .card-value {
            font-size: 2rem;
            font-weight: 800;
            color: #2c3e50;
            line-height: 1;
        }

        .filter-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-bottom: 30px;
        }

        .form-control, .form-select {
            border: 2px solid rgba(102, 126, 234, 0.2);
            border-radius: 12px;
            padding: 12px 16px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
        }

        .form-control:focus, .form-select:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            background: rgba(255, 255, 255, 0.95);
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 12px;
            padding: 12px 24px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 35px rgba(102, 126, 234, 0.4);
            background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
        }

        .table-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .table {
            margin-bottom: 0;
        }

        .table thead th {
            background: rgba(102, 126, 234, 0.1);
            color: #2c3e50;
            border: none;
            padding: 20px 16px;
            font-weight: 700;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .table thead th a {
            color: #2c3e50 !important;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .table thead th a:hover {
            color: #667eea !important;
        }

        .table tbody tr {
            transition: all 0.3s ease;
        }

        .table tbody tr:hover {
            background: rgba(102, 126, 234, 0.05);
            transform: scale(1.01);
        }

        .table tbody td {
            padding: 16px;
            border-bottom: 1px solid rgba(102, 126, 234, 0.1);
            vertical-align: middle;
            font-size: 0.95rem;
            color: #2c3e50;
        }

        .badge {
            padding: 8px 16px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .badge.bg-success {
            background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%) !important;
            color: white !important;
        }

        .badge.bg-danger {
            background: linear-gradient(135deg, #ff6a6a 0%, #ee5a52 100%) !important;
            color: white !important;
        }

        .btn-sm {
            border-radius: 10px;
            padding: 8px 16px;
            font-size: 0.85rem;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
        }

        .btn-outline-success {
            background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(67, 233, 123, 0.3);
        }

        .btn-outline-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(67, 233, 123, 0.4);
            color: white;
        }

        .btn-outline-warning {
            background: linear-gradient(135deg, #ffa726 0%, #ff7043 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(255, 167, 38, 0.3);
        }

        .btn-outline-warning:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(255, 167, 38, 0.4);
            color: white;
        }

        .btn-info {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            color: white;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }

        .btn-info:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
            color: white;
        }

        .pagination {
            justify-content: center;
            margin-top: 30px;
        }

        .page-link {
            border: none;
            color: #6c757d;
            border-radius: 10px;
            margin: 0 2px;
            padding: 10px 16px;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
        }

        .page-link:hover {
            background: rgba(102, 126, 234, 0.1);
            color: #667eea;
            transform: translateY(-2px);
        }

        .page-item.active .page-link {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            color: white;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }

        .section-title {
            font-size: 2rem;
            font-weight: 800;
            color: white;
            margin-bottom: 30px;
            text-align: center;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px 15px;
            }
            
            .dashboard-card {
                margin-bottom: 20px;
            }
            
            .filter-card {
                padding: 20px;
            }
            
            .table-responsive {
                border-radius: 20px;
            }

            .section-title {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <span class="navbar-brand">
                <i class="fas fa-shield-alt me-2"></i>Admin Dashboard
            </span>
            <span class="navbar-text">Mesaj Yönetim Paneli</span>
            <div>
                @if(session()->has('user_name'))
                    <span class="me-3 text-muted">Hoşgeldin, {{ session('user_name') }}</span>
                    <a href="{{ route('user.logout') }}" class="btn btn-sm btn-outline-danger">Çıkış</a>
                @else
                    <a href="{{ route('user.login') }}" class="btn btn-sm btn-outline-primary">Kullanıcı Giriş</a>
                @endif
            </div>
        </div>
    </nav>

    <div class="container">
        <h1 class="section-title">
            <i class="fas fa-chart-line me-3"></i>Mesaj İstatistikleri
        </h1>
        
        <!-- Özet Kartlar -->
        <div class="row mb-5 g-4">
            <div class="col-md-4">
                <div class="dashboard-card">
                    <div class="card-body d-flex align-items-center">
                        <div class="card-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div>
                            <div class="card-title">Toplam Mesaj</div>
                            <div class="card-value">{{ $totalMessages ?? ($messages->count() ?? 0) }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="dashboard-card">
                    <div class="card-body d-flex align-items-center">
                        <div class="card-icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div>
                            <div class="card-title">Okunan Mesaj</div>
                            <div class="card-value">{{ $readMessages ?? ($messages->where('is_read', true)->count() ?? 0) }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="dashboard-card">
                    <div class="card-body d-flex align-items-center">
                        <div class="card-icon">
                            <i class="fas fa-times-circle"></i>
                        </div>
                        <div>
                            <div class="card-title">Okunmayan Mesaj</div>
                            <div class="card-value">{{ $unreadMessages ?? ($messages->where('is_read', false)->count() ?? 0) }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filtreleme, Arama ve Sıralama Formu -->
        <div class="filter-card">
            <h4 class="mb-4 text-center" style="color: #2c3e50; font-weight: 700;">
                <i class="fas fa-filter me-2"></i>Filtreleme ve Arama
            </h4>
            <form method="GET" action="{{ route('messages.index') }}" class="row g-3 align-items-end">
                <div class="col-md-3">
                    <label class="form-label" style="color: #6c757d; font-weight: 600;">
                        <i class="fas fa-search me-2"></i>Arama
                    </label>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Mesaj ara..." class="form-control" />
                </div>
                <div class="col-md-2">
                    <label class="form-label" style="color: #6c757d; font-weight: 600;">
                        <i class="fas fa-filter me-2"></i>Filtre
                    </label>
                    <select name="filter" class="form-select">
                        <option value="">Tümü</option>
                        <option value="read" {{ request('filter') == 'read' ? 'selected' : '' }}>Okunanlar</option>
                        <option value="unread" {{ request('filter') == 'unread' ? 'selected' : '' }}>Okunmayanlar</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label" style="color: #6c757d; font-weight: 600;">
                        <i class="fas fa-sort me-2"></i>Sırala
                    </label>
                    <select name="sort" class="form-select">
                        <option value="">Varsayılan</option>
                        <option value="created_at" {{ request('sort') == 'created_at' ? 'selected' : '' }}>Tarihe Göre</option>
                        <option value="user_name" {{ request('sort') == 'user_name' ? 'selected' : '' }}>İsim</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label" style="color: #6c757d; font-weight: 600;">
                        <i class="fas fa-arrow-up me-2"></i>Yön
                    </label>
                    <select name="direction" class="form-select">
                        <option value="asc" {{ request('direction') == 'asc' ? 'selected' : '' }}>Artan</option>
                        <option value="desc" {{ request('direction') == 'desc' ? 'selected' : '' }}>Azalan</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label" style="color: #6c757d; font-weight: 600;">&nbsp;</label>
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fas fa-check me-2"></i> Uygula
                    </button>
                </div>
            </form>
        </div>

        <!-- Mesajlar Tablosu -->
        <div class="table-card">
            <div class="p-4 border-bottom" style="background: rgba(102, 126, 234, 0.05);">
                <h4 class="mb-0 text-center" style="color: #2c3e50; font-weight: 700;">
                    <i class="fas fa-list me-2"></i>Mesaj Listesi
                </h4>
            </div>
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th><a href="{{ route('messages.index', array_merge(request()->except(['sort', 'direction', 'page']), ['sort' => 'id', 'direction' => request('sort') == 'id' && request('direction') == 'asc' ? 'desc' : 'asc'])) }}">
                                <i class="fas fa-hashtag me-2"></i>ID
                                @if(request('sort') == 'id')
                                    <i class="fas fa-caret-{{ request('direction') == 'asc' ? 'up' : 'down' }}"></i>
                                @endif
                            </a></th>
                            <th><a href="{{ route('messages.index', array_merge(request()->except(['sort', 'direction', 'page']), ['sort' => 'user_name', 'direction' => request('sort') == 'user_name' && request('direction') == 'asc' ? 'desc' : 'asc'])) }}">
                                <i class="fas fa-user me-2"></i>Ad Soyad
                                @if(request('sort') == 'user_name')
                                    <i class="fas fa-caret-{{ request('direction') == 'asc' ? 'up' : 'down' }}"></i>
                                @endif
                            </a></th>
                            <th><a href="{{ route('messages.index', array_merge(request()->except(['sort', 'direction', 'page']), ['sort' => 'user_mail', 'direction' => request('sort') == 'user_mail' && request('direction') == 'asc' ? 'desc' : 'asc'])) }}">
                                <i class="fas fa-envelope me-2"></i>Email
                                @if(request('sort') == 'user_mail')
                                    <i class="fas fa-caret-{{ request('direction') == 'asc' ? 'up' : 'down' }}"></i>
                                @endif
                            </a></th>
                            <th><a href="{{ route('messages.index', array_merge(request()->except(['sort', 'direction', 'page']), ['sort' => 'message', 'direction' => request('sort') == 'message' && request('direction') == 'asc' ? 'desc' : 'asc'])) }}">
                                <i class="fas fa-comment me-2"></i>Mesaj
                                @if(request('sort') == 'message')
                                    <i class="fas fa-caret-{{ request('direction') == 'asc' ? 'up' : 'down' }}"></i>
                                @endif
                            </a></th>
                            <th><a href="{{ route('messages.index', array_merge(request()->except(['sort', 'direction', 'page']), ['sort' => 'created_at', 'direction' => request('sort') == 'created_at' && request('direction') == 'asc' ? 'desc' : 'asc'])) }}">
                                <i class="fas fa-calendar me-2"></i>Oluşturulma
                                @if(request('sort') == 'created_at')
                                    <i class="fas fa-caret-{{ request('direction') == 'asc' ? 'up' : 'down' }}"></i>
                                @endif
                            </a></th>
                            <th><i class="fas fa-eye me-2"></i>Durum</th>
                            <th><i class="fas fa-cogs me-2"></i>İşlem</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($messages as $message)
                        <tr>
                            <td><strong>#{{ $message->id }}</strong></td>
                            <td>{{ $message->user_name }}</td>
                            <td>{{ $message->user_mail }}</td>
                            <td>{{ Str::limit($message->message, 50) }}</td>
                            <td>{{ $message->created_at->format('d.m.Y H:i') }}</td>
                            <td>
                                @if($message->is_read)
                                    <span class="badge bg-success">
                                        <i class="fas fa-check-circle me-1"></i> Okundu
                                    </span>
                                @else
                                    <span class="badge bg-danger">
                                        <i class="fas fa-times-circle me-1"></i> Okunmadı
                                    </span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex flex-column gap-2">
                                    <form method="POST" action="{{ route('messages.toggleRead', $message->id) }}" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-sm {{ $message->is_read ? 'btn-outline-warning' : 'btn-outline-success' }}">
                                            <i class="fas {{ $message->is_read ? 'fa-eye-slash' : 'fa-eye' }} me-1"></i>
                                            {{ $message->is_read ? 'Okunmadı Yap' : 'Okundu Yap' }}
                                        </button>
                                    </form>
                                    <a href="{{ route('message.show', $message->id) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye me-1"></i> Detay
                                    </a>
                                </div>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>