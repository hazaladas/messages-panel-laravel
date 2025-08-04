<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mesaj Detayı - Admin Dashboard</title>
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

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 40px 20px;
            position: relative;
            z-index: 1;
        }

        .message-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 32px;
            box-shadow: 
                0 32px 64px rgba(0, 0, 0, 0.12),
                0 0 0 1px rgba(255, 255, 255, 0.3);
            overflow: hidden;
            margin-bottom: 30px;
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

        .message-card::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: linear-gradient(135deg, #667eea, #764ba2, #f093fb, #667eea);
            border-radius: 32px;
            z-index: -1;
            opacity: 0.3;
            animation: borderGlow 3s ease-in-out infinite;
        }

        @keyframes borderGlow {
            0%, 100% { opacity: 0.3; }
            50% { opacity: 0.6; }
        }

        .message-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 40px 30px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .message-header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            animation: rotate 20s linear infinite;
        }

        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .message-header h2 {
            margin: 0;
            font-size: 2.2rem;
            font-weight: 800;
            position: relative;
            z-index: 1;
        }

        .message-header p {
            margin: 10px 0 0 0;
            opacity: 0.9;
            font-size: 1.1rem;
            position: relative;
            z-index: 1;
        }

        .message-body {
            padding: 40px;
        }

        .info-row {
            display: flex;
            align-items: center;
            padding: 25px 0;
            border-bottom: 1px solid rgba(102, 126, 234, 0.1);
            transition: all 0.3s ease;
        }

        .info-row:hover {
            background: rgba(102, 126, 234, 0.02);
            border-radius: 16px;
            padding-left: 15px;
            padding-right: 15px;
        }

        .info-row:last-child {
            border-bottom: none;
        }

        .info-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 25px;
            color: white;
            font-size: 1.3rem;
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
            transition: all 0.3s ease;
        }

        .info-row:hover .info-icon {
            transform: scale(1.1);
            box-shadow: 0 12px 35px rgba(102, 126, 234, 0.4);
        }

        .info-content {
            flex: 1;
        }

        .info-label {
            font-size: 0.9rem;
            color: #6c757d;
            font-weight: 700;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .info-value {
            font-size: 1.2rem;
            color: #2c3e50;
            font-weight: 600;
        }

        .message-content {
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.05) 0%, rgba(118, 75, 162, 0.05) 100%);
            border-radius: 20px;
            padding: 30px;
            margin: 30px 0;
            border-left: 5px solid #667eea;
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.1);
        }

        .message-text {
            font-size: 1.1rem;
            line-height: 1.7;
            color: #2c3e50;
            margin: 0;
            font-weight: 500;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 10px 20px;
            border-radius: 25px;
            font-size: 0.9rem;
            font-weight: 700;
            color: white;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .status-read {
            background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
        }

        .status-unread {
            background: linear-gradient(135deg, #ff6a6a 0%, #ee5a52 100%);
        }

        .btn-back {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 16px;
            padding: 15px 35px;
            font-size: 1.1rem;
            font-weight: 600;
            color: white;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
            position: relative;
            overflow: hidden;
        }

        .btn-back::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }

        .btn-back:hover::before {
            left: 100%;
        }

        .btn-back:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(102, 126, 234, 0.4);
            color: white;
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px 15px;
            }

            .message-header {
                padding: 30px 20px;
            }

            .message-header h2 {
                font-size: 1.8rem;
            }

            .message-body {
                padding: 30px 20px;
            }

            .info-row {
                flex-direction: column;
                text-align: center;
                padding: 30px 0;
            }

            .info-icon {
                margin-right: 0;
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="message-card">
            <div class="message-header">
                <h2><i class="fas fa-envelope-open me-3"></i>Mesaj Detayı</h2>
                <p>Mesaj bilgilerini görüntüleyin</p>
            </div>
            
            <div class="message-body">
                <div class="info-row">
                    <div class="info-icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="info-content">
                        <div class="info-label">Ad Soyad</div>
                        <div class="info-value">{{ $message->user_name }}</div>
                    </div>
                </div>

                <div class="info-row">
                    <div class="info-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="info-content">
                        <div class="info-label">Email Adresi</div>
                        <div class="info-value">{{ $message->user_mail }}</div>
                    </div>
                </div>

                <div class="info-row">
                    <div class="info-icon">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <div class="info-content">
                        <div class="info-label">Oluşturulma Tarihi</div>
                        <div class="info-value">{{ $message->created_at->format('d.m.Y H:i') }}</div>
                    </div>
                </div>

                <div class="info-row">
                    <div class="info-icon">
                        <i class="fas fa-eye"></i>
                    </div>
                    <div class="info-content">
                        <div class="info-label">Durum</div>
                        <div class="info-value">
                            <span class="status-badge {{ $message->is_read ? 'status-read' : 'status-unread' }}">
                                <i class="fas {{ $message->is_read ? 'fa-check-circle' : 'fa-times-circle' }} me-2"></i>
                                {{ $message->is_read ? 'Okundu' : 'Okunmadı' }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="message-content">
                    <div class="info-label" style="margin-bottom: 15px;">Mesaj İçeriği</div>
                    <p class="message-text">{{ $message->message }}</p>
                </div>
            </div>
        </div>

        <div class="text-center">
            <a href="{{ route('messages.index') }}" class="btn-back">
                <i class="fas fa-arrow-left me-2"></i>Mesaj Listesine Dön
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>