<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kullanıcı Dashboard - Mesaj Paneli</title>
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
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 50%, #4facfe 100%);
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
                radial-gradient(circle at 20% 80%, rgba(240, 147, 251, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(245, 87, 108, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 40% 40%, rgba(79, 172, 254, 0.3) 0%, transparent 50%);
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
            color: #f093fb !important;
            font-weight: 700;
            font-size: 1.3rem;
        }

        .container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            z-index: 1;
        }

        .dashboard-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 32px;
            box-shadow: 
                0 32px 64px rgba(0, 0, 0, 0.12),
                0 0 0 1px rgba(255, 255, 255, 0.3);
            padding: 60px 50px;
            text-align: center;
            max-width: 600px;
            width: 100%;
            position: relative;
            transform: translateY(30px);
            opacity: 0;
            animation: slideUpFade 1s ease-out forwards;
        }

        @keyframes slideUpFade {
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .dashboard-card::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: linear-gradient(135deg, #f093fb, #f5576c, #4facfe, #f093fb);
            border-radius: 32px;
            z-index: -1;
            opacity: 0.3;
            animation: borderGlow 3s ease-in-out infinite;
        }

        @keyframes borderGlow {
            0%, 100% { opacity: 0.3; }
            50% { opacity: 0.6; }
        }

        .logo-section {
            margin-bottom: 40px;
            position: relative;
        }

        .logo-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            box-shadow: 
                0 20px 40px rgba(240, 147, 251, 0.3),
                0 0 0 4px rgba(255, 255, 255, 0.2);
            animation: logoPulse 2s ease-in-out infinite;
        }

        @keyframes logoPulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        .logo-icon i {
            font-size: 2.5rem;
            color: white;
        }

        .dashboard-title {
            font-size: 2.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 16px;
            line-height: 1.2;
        }

        .dashboard-user {
            font-size: 1.2rem;
            color: #6c757d;
            margin-bottom: 40px;
            font-weight: 500;
            line-height: 1.6;
        }

        .form-group {
            margin-bottom: 25px;
            text-align: left;
        }

        .form-label {
            display: block;
            font-weight: 600;
            color: #495057;
            margin-bottom: 8px;
            font-size: 0.95rem;
        }

        .form-control {
            width: 100%;
            padding: 15px 20px;
            border: 2px solid #e9ecef;
            border-radius: 16px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
        }

        .form-control:focus {
            outline: none;
            border-color: #f093fb;
            box-shadow: 0 0 0 3px rgba(240, 147, 251, 0.1);
            background: rgba(255, 255, 255, 0.95);
        }

        .btn-primary {
            width: 100%;
            padding: 18px 32px;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 16px;
            border: none;
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
            box-shadow: 0 8px 25px rgba(240, 147, 251, 0.3);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            margin-top: 10px;
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }

        .btn-primary:hover::before {
            left: 100%;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(240, 147, 251, 0.4);
            color: white;
        }

        .alert {
            border-radius: 16px;
            border: none;
            padding: 15px 20px;
            margin-bottom: 25px;
            font-weight: 500;
        }

        .alert-success {
            background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
            color: white;
        }

        .alert-danger {
            background: linear-gradient(135deg, #ff6a6a 0%, #ee5a52 100%);
            color: white;
        }

        @media (max-width: 768px) {
            .dashboard-card {
                padding: 40px 30px;
                margin: 20px;
            }

            .dashboard-title {
                font-size: 2rem;
            }

            .dashboard-user {
                font-size: 1.1rem;
            }
        }

        @media (max-width: 480px) {
            .dashboard-card {
                padding: 30px 20px;
            }

            .dashboard-title {
                font-size: 1.8rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <span class="navbar-brand">
                <i class="fas fa-user me-2"></i>Kullanıcı Paneli
            </span>
            <span class="navbar-text">Mesaj Gönderme Paneli</span>
            <div>
                <a href="{{ route('user.logout') }}" class="btn btn-sm btn-outline-danger">Çıkış</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="dashboard-card">
            <div class="logo-section">
                <div class="logo-icon">
                    <i class="fas fa-paper-plane"></i>
                </div>
                <h1 class="dashboard-title">Mesaj Gönder</h1>
                <p class="dashboard-user">
                    <i class="fas fa-user me-2"></i><strong>Kullanıcı:</strong> {{ Auth::user()->name }}
                </p>
            </div>
            {{-- Başarılı gönderim mesajı --}}
            @if(session('success'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                </div>
            @endif

            {{-- Hata mesajları --}}
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li><i class="fas fa-exclamation-circle me-1"></i> {{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('user.message.send') }}">
                @csrf
                <div class="form-group">
                    <label for="message" class="form-label">
                        <i class="fas fa-comment me-2"></i>Mesajınız
                    </label>
                    <textarea name="message" id="message" class="form-control" rows="5" placeholder="Mesajınızı buraya yazınız..." required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-paper-plane me-2"></i>Mesaj Gönder
                </button>
            </form>
        </div>
        <!-- Kullanıcının gönderdiği mesajlar bölümü -->
        <div class="dashboard-card mt-4" style="max-width: 800px; width: 100%; margin: 0 auto;">
            <h2 class="mt-2 mb-3 text-lg fw-semibold" style="font-size: 1.3rem;">Gönderilen Mesajlar</h2>
            @if ($messages->isEmpty())
                <p>Henüz mesajınız yok.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle mt-2">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Mesaj</th>
                                <th scope="col">Tarih</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($messages as $message)
                                <tr>
                                    <td>{{ $message->id }}</td>
                                    <td>{{ $message->message }}</td>
                                    <td>{{ $message->created_at->format('d.m.Y H:i') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>