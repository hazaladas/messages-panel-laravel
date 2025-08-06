<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kayıt Ol - Mesaj Paneli</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
            min-height: 100vh;
            font-family: 'Inter', sans-serif;
            position: relative;
            overflow-x: hidden;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="75" cy="75" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="50" cy="10" r="0.5" fill="rgba(255,255,255,0.1)"/><circle cx="10" cy="60" r="0.5" fill="rgba(255,255,255,0.1)"/><circle cx="90" cy="40" r="0.5" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            pointer-events: none;
        }
        
        .register-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            z-index: 1;
        }
        
        .register-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            box-shadow: 
                0 25px 50px rgba(0, 0, 0, 0.15),
                0 0 0 1px rgba(255, 255, 255, 0.3);
            overflow: hidden;
            max-width: 480px;
            width: 100%;
            transform: translateY(20px);
            opacity: 0;
            animation: slideUp 0.8s ease-out forwards;
        }

        @keyframes slideUp {
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
        
        .register-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 40px 30px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .register-header::before {
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
        
        .register-header h1 {
            margin: 0;
            font-size: 2.2rem;
            font-weight: 700;
            position: relative;
            z-index: 1;
        }
        
        .register-header p {
            margin: 12px 0 0 0;
            opacity: 0.95;
            font-size: 1rem;
            font-weight: 400;
            position: relative;
            z-index: 1;
        }
        
        .register-body {
            padding: 50px 40px;
        }
        
        .form-floating {
            margin-bottom: 24px;
            position: relative;
        }
        
        .form-floating .form-control {
            border-radius: 16px;
            border: 2px solid #e9ecef;
            padding: 16px 20px;
            font-size: 1rem;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
        }
        
        .form-floating .form-control:focus {
            border-color: #667eea;
            box-shadow: 
                0 0 0 4px rgba(102, 126, 234, 0.1),
                0 8px 25px rgba(102, 126, 234, 0.15);
            transform: translateY(-2px);
        }
        
        .form-floating .form-control.is-invalid {
            border-color: #dc3545;
            box-shadow: 0 0 0 4px rgba(220, 53, 69, 0.1);
        }
        
        .form-floating label {
            padding: 16px 20px;
            color: #6c757d;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .form-floating .form-control:focus + label,
        .form-floating .form-control:not(:placeholder-shown) + label {
            color: #667eea;
            transform: translateY(-8px) scale(0.85);
        }
        
        .btn-register {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 16px;
            padding: 16px 30px;
            font-size: 1.1rem;
            font-weight: 600;
            color: white;
            width: 100%;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            margin-top: 16px;
            position: relative;
            overflow: hidden;
        }

        .btn-register::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }

        .btn-register:hover::before {
            left: 100%;
        }
        
        .btn-register:hover {
            transform: translateY(-3px);
            box-shadow: 
                0 15px 35px rgba(102, 126, 234, 0.4),
                0 5px 15px rgba(0, 0, 0, 0.1);
            color: white;
        }

        .btn-register:active {
            transform: translateY(-1px);
        }
        
        .login-link {
            text-align: center;
            margin-top: 32px;
            padding-top: 24px;
            border-top: 1px solid rgba(233, 236, 239, 0.6);
        }
        
        .login-link a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            position: relative;
        }
        
        .login-link a::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            transition: width 0.3s ease;
        }
        
        .login-link a:hover {
            color: #764ba2;
        }

        .login-link a:hover::after {
            width: 100%;
        }
        
        .alert {
            border-radius: 16px;
            border: none;
            margin-bottom: 24px;
            padding: 16px 20px;
            animation: slideInDown 0.5s ease-out;
        }

        @keyframes slideInDown {
            from {
                transform: translateY(-20px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
        
        .alert-danger {
            background: linear-gradient(135deg, #ff6b6b 0%, #ee5a52 100%);
            color: white;
            box-shadow: 0 8px 25px rgba(255, 107, 107, 0.3);
        }
        
        .input-group-text {
            background: transparent;
            border: 2px solid #e9ecef;
            border-right: none;
            border-radius: 16px 0 0 16px;
            transition: all 0.3s ease;
        }
        
        .input-group .form-control {
            border-left: none;
            border-radius: 0 16px 16px 0;
        }
        
        .input-group .form-control:focus + .input-group-text {
            border-color: #667eea;
        }
        
        .password-toggle {
            cursor: pointer;
            color: #6c757d;
            transition: all 0.3s ease;
            padding: 0 16px;
        }
        
        .password-toggle:hover {
            color: #667eea;
            transform: scale(1.1);
        }

        .form-floating .input-group {
            border-radius: 16px;
            overflow: hidden;
        }

        .floating-icon {
            position: absolute;
            top: 50%;
            left: 20px;
            transform: translateY(-50%);
            color: #6c757d;
            transition: all 0.3s ease;
            z-index: 10;
        }

        .form-floating .form-control:focus ~ .floating-icon {
            color: #667eea;
        }

        .form-floating .form-control.is-invalid ~ .floating-icon {
            color: #dc3545;
        }

        .strength-meter {
            height: 4px;
            border-radius: 2px;
            margin-top: 8px;
            transition: all 0.3s ease;
        }

        .strength-weak { background: linear-gradient(90deg, #ff6b6b 0%, #ff6b6b 100%); }
        .strength-medium { background: linear-gradient(90deg, #ffa726 0%, #ffa726 100%); }
        .strength-strong { background: linear-gradient(90deg, #66bb6a 0%, #66bb6a 100%); }
        .strength-very-strong { background: linear-gradient(90deg, #42a5f5 0%, #42a5f5 100%); }
        
        @media (max-width: 576px) {
            .register-card {
                margin: 10px;
                border-radius: 20px;
            }
            
            .register-header {
                padding: 30px 20px;
            }
            
            .register-body {
                padding: 40px 25px;
            }

            .register-header h1 {
                font-size: 1.8rem;
            }
        }

        /* Loading animation for button */
        .btn-loading {
            position: relative;
            pointer-events: none;
        }

        .btn-loading::after {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            top: 50%;
            left: 50%;
            margin-left: -10px;
            margin-top: -10px;
            border: 2px solid transparent;
            border-top: 2px solid white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="register-card">
            <div class="register-header">
                <h1><i class="fas fa-user-plus me-3"></i>Kayıt Ol</h1>
                <p>Mesaj paneline hoş geldiniz</p>
            </div>
            
            <div class="register-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        <strong>Hata!</strong> Lütfen aşağıdaki hataları düzeltin:
                        <ul class="mb-0 mt-2" style="list-style: none; padding-left: 0;">
                            @foreach ($errors->all() as $error)
                                <li><i class="fas fa-times me-2"></i>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('register') }}" id="registerForm">
                    @csrf

                    <div class="form-floating">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" 
                               id="name" name="name" 
                               value="{{ old('name') }}" required>
                        <label for="name">
                            <i class="fas fa-user me-2"></i>Ad Soyad
                        </label>
        </div>

                    <div class="form-floating">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" 
                               id="email" name="email" 
                               value="{{ old('email') }}" required>
                        <label for="email">
                            <i class="fas fa-envelope me-2"></i>Email
                        </label>
        </div>

                    <div class="form-floating">
                        <div class="input-group">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                   id="password" name="password" required>
                            <span class="input-group-text password-toggle" onclick="togglePassword('password')">
                                <i class="fas fa-eye" id="password-icon"></i>
                            </span>
                        </div>
                        <label for="password" class="ms-3">
                            <i class="fas fa-lock me-2"></i>Şifre
                        </label>
                        <div class="strength-meter" id="strength-meter"></div>
        </div>

                    <div class="form-floating">
                        <div class="input-group">
                            <input type="password" class="form-control" 
                                   id="password_confirmation" name="password_confirmation" 
                                   required>
                            <span class="input-group-text password-toggle" onclick="togglePassword('password_confirmation')">
                                <i class="fas fa-eye" id="password_confirmation-icon"></i>
                            </span>
                        </div>
                        <label for="password_confirmation" class="ms-3">
                            <i class="fas fa-lock me-2"></i>Şifre Tekrar
                        </label>
        </div>

                    <button type="submit" class="btn btn-register" id="submitBtn">
                        <i class="fas fa-user-plus me-2"></i>Kayıt Ol
                    </button>
    </form>

                <div class="login-link">
                    <p class="mb-0">
                        Zaten hesabınız var mı? 
                        <a href="{{ route('user.login') }}">
                            <i class="fas fa-sign-in-alt me-1"></i>Giriş Yap
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            const icon = document.getElementById(fieldId + '-icon');
            
            if (field.type === 'password') {
                field.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                field.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }

        function checkPasswordStrength(password) {
            let strength = 0;
            const meter = document.getElementById('strength-meter');
            
            if (password.length >= 8) strength++;
            if (/[a-z]/.test(password)) strength++;
            if (/[A-Z]/.test(password)) strength++;
            if (/[0-9]/.test(password)) strength++;
            if (/[^A-Za-z0-9]/.test(password)) strength++;
            
            meter.className = 'strength-meter';
            
            if (strength <= 2) {
                meter.classList.add('strength-weak');
            } else if (strength === 3) {
                meter.classList.add('strength-medium');
            } else if (strength === 4) {
                meter.classList.add('strength-strong');
            } else {
                meter.classList.add('strength-very-strong');
            }
        }
        
        // Add floating label functionality
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('.form-floating input');
            
            inputs.forEach(input => {
                if (input.value) {
                    input.parentElement.classList.add('focused');
                }
                
                input.addEventListener('focus', function() {
                    this.parentElement.classList.add('focused');
                });
                
                input.addEventListener('blur', function() {
                    if (!this.value) {
                        this.parentElement.classList.remove('focused');
                    }
                });
            });

            // Password strength checker
            const passwordInput = document.getElementById('password');
            passwordInput.addEventListener('input', function() {
                checkPasswordStrength(this.value);
            });

            // Form submission with loading state
            const form = document.getElementById('registerForm');
            const submitBtn = document.getElementById('submitBtn');
            
            form.addEventListener('submit', function() {
                submitBtn.classList.add('btn-loading');
                submitBtn.innerHTML = '<i class="fas fa-spinner me-2"></i>Kayıt Olunuyor...';
            });

            // Add input validation feedback
            inputs.forEach(input => {
                input.addEventListener('input', function() {
                    if (this.checkValidity()) {
                        this.classList.remove('is-invalid');
                        this.classList.add('is-valid');
                    } else {
                        this.classList.remove('is-valid');
                        this.classList.add('is-invalid');
                    }
                });
            });
        });
    </script>
</body>
</html>