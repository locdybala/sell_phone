<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập hệ thống</title>
    <link rel="icon" href="https://i.postimg.cc/rmM2PzDk/logo-removebg-preview.png" type="image/x-icon">


    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- Toastr -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            font-family: 'Be Vietnam Pro', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        .login-container {
            max-width: 450px;
            margin: 0 auto;
            padding: 20px;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
        }

        .card-body {
            padding: 40px;
        }

        .logo-container {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo-container img {
            height: 80px;
            margin-bottom: 15px;
        }

        .welcome-text {
            color: #2c3e50;
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .sub-text {
            color: #7f8c8d;
            font-size: 0.9rem;
            margin-bottom: 30px;
        }

        .form-label {
            color: #34495e;
            font-weight: 500;
            margin-bottom: 8px;
        }

        .form-control {
            border: 2px solid #e9ecef;
            border-radius: 8px;
            padding: 12px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #3498db;
            box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.15);
        }

        .input-group-text {
            background: transparent;
            border: 2px solid #e9ecef;
            border-right: none;
            color: #95a5a6;
        }

        .btn-primary {
            background: #3498db;
            border: none;
            padding: 12px;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: #2980b9;
            transform: translateY(-1px);
        }

        .form-check-input:checked {
            background-color: #3498db;
            border-color: #3498db;
        }

        .forgot-password {
            color: #3498db;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .forgot-password:hover {
            color: #2980b9;
        }

        .alert {
            border-radius: 8px;
            font-size: 0.9rem;
        }

        @media (max-width: 576px) {
            .login-container {
                padding: 15px;
            }

            .card-body {
                padding: 30px 20px;
            }
        }
    </style>
</head>

<body>
    <div class="container login-container">
        <div class="text-center mb-4">
            <img src="https://i.postimg.cc/rmM2PzDk/logo-removebg-preview.png" class="img-fluid" style="height: 60px;"
                alt="Logo">
        </div>
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="logo-container">
                    <img src="{{ asset('backend/assets/images/logo.png') }}" alt="Logo">
                    <h4 class="welcome-text">Chào mừng trở lại!</h4>
                    <p class="sub-text">Đăng nhập để quản lý cửa hàng đồ dùng học tập</p>
                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    {{-- Email --}}
                    <div class="mb-4">
                        <label for="email" class="form-label">Email</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                id="email" name="email" value="{{ old('email') }}" 
                                placeholder="Nhập địa chỉ email" required autofocus>
                        </div>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div class="mb-4">
                        <label for="password" class="form-label">Mật khẩu</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password" placeholder="Nhập mật khẩu" required>
                            <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Session message --}}
                    @if (session('message'))
                        <div class="alert alert-danger text-center mb-4">
                            <i class="fas fa-exclamation-circle me-2"></i>{{ session('message') }}
                        </div>
                    @endif

                    {{-- Remember me --}}
                    <div class="mb-4 form-check">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember" 
                            {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">Ghi nhớ đăng nhập</label>
                    </div>

                    <div class="d-grid mb-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-sign-in-alt me-2"></i>Đăng nhập
                        </button>
                    </div>

                    <div class="text-center">
                        <a href="{{ route('password.request') }}" class="forgot-password">
                            <i class="fas fa-key me-1"></i>Quên mật khẩu?
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        $(document).ready(function() {
            // Toggle password visibility
            $('#togglePassword').on('click', function() {
                const $passwordInput = $('#password');
                const $icon = $(this).find('i');
                
                if ($passwordInput.attr('type') === 'password') {
                    $passwordInput.attr('type', 'text');
                    $icon.removeClass('fa-eye').addClass('fa-eye-slash');
                } else {
                    $passwordInput.attr('type', 'password');
                    $icon.removeClass('fa-eye-slash').addClass('fa-eye');
                }
            });

            // Toastr configuration
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "timeOut": "3000",
                "extendedTimeOut": "1000",
                "preventDuplicates": true,
                "newestOnTop": true
            };

            // Form validation
            $('form').on('submit', function(e) {
                const $email = $('#email');
                const $password = $('#password');
                let isValid = true;

                // Reset previous error states
                $('.is-invalid').removeClass('is-invalid');
                $('.invalid-feedback').hide();

                // Email validation
                if (!$email.val()) {
                    $email.addClass('is-invalid');
                    $email.next('.invalid-feedback').show().text('Vui lòng nhập email');
                    isValid = false;
                } else if (!isValidEmail($email.val())) {
                    $email.addClass('is-invalid');
                    $email.next('.invalid-feedback').show().text('Email không hợp lệ');
                    isValid = false;
                }

                // Password validation
                if (!$password.val()) {
                    $password.addClass('is-invalid');
                    $password.next('.invalid-feedback').show().text('Vui lòng nhập mật khẩu');
                    isValid = false;
                }

                if (!isValid) {
                    e.preventDefault();
                    toastr.error('Vui lòng kiểm tra lại thông tin đăng nhập');
                }
            });

            // Email validation function
            function isValidEmail(email) {
                const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return regex.test(email);
            }

            // Show success message
            @if(session('success'))
                toastr.success("{{ session('success') }}");
            @endif

            // Show error message
            @if(session('error'))
                toastr.error("{{ session('error') }}");
            @endif

            // Show validation errors
            @if($errors->any())
                @foreach($errors->all() as $error)
                    toastr.error("{{ $error }}");
                @endforeach
            @endif
        });
    </script>
</body>

</html>
