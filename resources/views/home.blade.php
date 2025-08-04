<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mesaj Paneli - Ana Sayfa</title>
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

        /* Floating particles */
        .particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
        }

        .particle {
            position: absolute;
            width: 4px;
            height: 4px;
            background: rgba(255, 255, 255, 0.6);
            border-radius: 50%;
            animation: particleFloat 15s infinite linear;
        }

        .particle:nth-child(1) { left: 10%; animation-delay: 0s; }
        .particle:nth-child(2) { left: 20%; animation-delay: 2s; }
        .particle:nth-child(3) { left: 30%; animation-delay: 4s; }
        .particle:nth-child(4) { left: 40%; animation-delay: 6s; }
        .particle:nth-child(5) { left: 50%; animation-delay: 8s; }
        .particle:nth-child(6) { left: 60%; animation-delay: 10s; }
        .particle:nth-child(7) { left: 70%; animation-delay: 12s; }
        .particle:nth-child(8) { left: 80%; animation-delay: 14s; }
        .particle:nth-child(9) { left: 90%; animation-delay: 16s; }

        @keyframes particleFloat {
            0% {
                transform: translateY(100vh) scale(0);
                opacity: 0;
            }
            10% {
                opacity: 1;
            }
            90% {
                opacity: 1;
            }
            100% {
                transform: translateY(-100px) scale(1);
                opacity: 0;
            }
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

        .hero-card {
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

        .hero-card::before {
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

        .logo-section {
            margin-bottom: 40px;
            position: relative;
        }

        .logo-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            box-shadow: 
                0 20px 40px rgba(102, 126, 234, 0.3),
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

        .main-title {
            font-size: 2.8rem;
            font-weight: 800;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 16px;
            line-height: 1.2;
        }

        .subtitle {
            font-size: 1.2rem;
            color: #6c757d;
            margin-bottom: 50px;
            font-weight: 400;
            line-height: 1.6;
        }

        .buttons-container {
            display: flex;
            flex-direction: column;
            gap: 20px;
            margin-bottom: 30px;
        }

        .btn-hero {
            padding: 18px 32px;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 16px;
            border: none;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
        }

        .btn-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }

        .btn-hero:hover::before {
            left: 100%;
        }

        .btn-admin {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
        }

        .btn-admin:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(102, 126, 234, 0.4);
            color: white;
        }

        .btn-user {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
            box-shadow: 0 8px 25px rgba(245, 87, 108, 0.3);
        }

        .btn-user:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(245, 87, 108, 0.4);
            color: white;
        }

        .features-section {
            margin-top: 40px;
            padding-top: 30px;
            border-top: 1px solid rgba(108, 117, 125, 0.2);
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .feature-item {
            text-align: center;
            padding: 20px;
            background: rgba(255, 255, 255, 0.5);
            border-radius: 16px;
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }

        .feature-item:hover {
            transform: translateY(-5px);
            background: rgba(255, 255, 255, 0.8);
        }

        .feature-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 12px;
        }

        .feature-icon i {
            color: white;
            font-size: 1.2rem;
        }

        .feature-text {
            font-size: 0.9rem;
            color: #6c757d;
            font-weight: 500;
        }

        .footer-text {
            margin-top: 30px;
            color: #6c757d;
            font-size: 0.9rem;
            opacity: 0.8;
        }

        @media (max-width: 768px) {
            .hero-card {
                padding: 40px 30px;
                margin: 20px;
            }

            .main-title {
                font-size: 2.2rem;
            }

            .subtitle {
                font-size: 1.1rem;
            }

            .buttons-container {
                gap: 16px;
            }

            .btn-hero {
                padding: 16px 24px;
                font-size: 1rem;
            }

            .features-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 15px;
            }
        }

        @media (max-width: 480px) {
            .hero-card {
                padding: 30px 20px;
            }

            .main-title {
                font-size: 1.8rem;
            }

            .features-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Floating particles -->
    <div class="particles">
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
    </div>

    <div class="container">
        <div class="hero-card">
            <div class="logo-section">
                <div class="logo-icon">
                    <i class="fas fa-comments"></i>
                </div>
                <h1 class="main-title">Admin Mesaj Paneli</h1>
                <p class="subtitle">Güvenli ve hızlı mesajlaşma platformuna hoş geldiniz</p>
            </div>

            <div class="buttons-container">
                <a href="{{ route('admin.login') }}" class="btn btn-hero btn-admin">
                    <i class="fas fa-shield-alt"></i>
                    Admin Paneli
                </a>
                <a href="{{ route('user.login') }}" class="btn btn-hero btn-user">
                    <i class="fas fa-user"></i>
                    Kullanıcı Girişi
                </a>
            </div>

            <div class="features-section">
                <div class="features-grid">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-lock"></i>
                        </div>
                        <div class="feature-text">Güvenli</div>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-bolt"></i>
                        </div>
                        <div class="feature-text">Hızlı</div>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-headset"></i>
                        </div>
                        <div class="feature-text">7/24 Destek</div>
                    </div>
                </div>
            </div>

            <div class="footer-text">
                <i class="fas fa-heart" style="color: #f5576c;"></i>
                Güvenli mesajlaşma deneyimi için tasarlandı
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Add some interactive effects
        document.addEventListener('DOMContentLoaded', function() {
            const buttons = document.querySelectorAll('.btn-hero');
            
            buttons.forEach(button => {
                button.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-3px) scale(1.02)';
                });
                
                button.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0) scale(1)';
                });
            });

            // Add parallax effect to particles
            document.addEventListener('mousemove', function(e) {
                const particles = document.querySelectorAll('.particle');
                const mouseX = e.clientX / window.innerWidth;
                const mouseY = e.clientY / window.innerHeight;
                
                particles.forEach((particle, index) => {
                    const speed = (index + 1) * 0.5;
                    const x = (mouseX - 0.5) * speed;
                    const y = (mouseY - 0.5) * speed;
                    
                    particle.style.transform = `translate(${x}px, ${y}px)`;
                });
            });
        });
    </script>
</body>
</html>