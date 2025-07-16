<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Toko Baju Mufti</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* General Reset & Body Styles */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif; /* Menggunakan font Poppins */
        }

        body {
            background: linear-gradient(135deg, #a1c4fd, #c2e9fb); /* Gradient background yang lebih cerah dan modern */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            color: #333;
        }

        /* Login Container Styles */
        .login-container {
            background-color: rgba(255, 255, 255, 0.95); /* Sedikit transparansi */
            padding: 45px; /* Padding lebih besar */
            border-radius: 15px; /* Border-radius lebih besar */
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15); /* Shadow lebih lembut dan menyebar */
            width: 100%;
            max-width: 420px; /* Lebar maksimum sedikit lebih besar */
            text-align: center;
            position: relative;
            overflow: hidden;
            backdrop-filter: blur(5px); /* Efek blur pada background di belakang container */
            animation: fadeIn 0.8s ease-out; /* Animasi fade-in saat dimuat */
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .login-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 6px; /* Garis atas lebih tebal */
            background: linear-gradient(90deg, #6a11cb, #2575fc); /* Gradient yang lebih berani */
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        h2 {
            margin-bottom: 30px; /* Jarak lebih besar */
            color: #333;
            font-size: 32px; /* Ukuran font judul lebih besar */
            font-weight: 700; /* Lebih tebal */
        }

        /* Form Group & Input Styles */
        .form-group {
            margin-bottom: 25px; /* Jarak antar grup form lebih besar */
            text-align: left;
            position: relative;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #555;
            font-size: 15px;
        }

        input {
            width: 100%;
            padding: 14px 18px; /* Padding lebih nyaman */
            border: 1px solid #e0e0e0; /* Border lebih terang */
            border-radius: 8px; /* Border-radius lebih lembut */
            font-size: 16px;
            transition: all 0.3s ease; /* Transisi lebih halus */
            background-color: #f8f8f8; /* Background input */
        }

        input:focus {
            border-color: #6a11cb; /* Warna border fokus yang lebih modern */
            box-shadow: 0 0 0 4px rgba(106, 17, 203, 0.15); /* Shadow fokus yang lebih tebal dan transparan */
            background-color: #ffffff;
            outline: none;
        }

        /* Password Toggle Styles */
        .password-container {
            position: relative;
        }

        .toggle-password {
            position: absolute;
            right: 15px; /* Posisi ikon lebih masuk */
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #999; /* Warna ikon lebih kalem */
            font-size: 18px;
            transition: color 0.2s ease;
        }

        .toggle-password:hover {
            color: #6a11cb; /* Warna ikon saat hover */
        }

        /* Submit Button Styles */
        .submit-btn {
            background: linear-gradient(90deg, #6a11cb, #2575fc); /* Gradient yang sama dengan garis atas */
            color: white;
            border: none;
            padding: 15px; /* Padding tombol lebih besar */
            width: 100%;
            border-radius: 8px; /* Border-radius sama dengan input */
            font-size: 18px; /* Ukuran font tombol lebih besar */
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease; /* Transisi halus */
            margin-top: 15px; /* Jarak dari form group */
            letter-spacing: 0.5px; /* Sedikit spasi antar huruf */
        }

        .submit-btn:hover {
            background: linear-gradient(90deg, #2575fc, #6a11cb); /* Balik gradient saat hover */
            transform: translateY(-3px); /* Efek angkat saat hover lebih terasa */
            box-shadow: 0 8px 20px rgba(37, 117, 252, 0.3); /* Shadow lebih kuat saat hover */
        }

        /* Register & Admin Link Styles */
        .register-link {
            margin-top: 25px; /* Jarak lebih besar */
            display: block;
            color: #666;
            font-size: 15px;
        }

        .register-link a {
            color: #6a11cb; /* Warna link yang lebih harmonis */
            text-decoration: none;
            font-weight: 600;
            transition: color 0.2s ease;
        }

        .register-link a:hover {
            text-decoration: underline;
            color: #2575fc; /* Warna link saat hover */
        }

        .error-message {
            color: #e74c3c;
            font-size: 13px; /* Ukuran font error lebih kecil */
            margin-top: 6px; /* Jarak lebih kecil */
            display: none;
            text-align: left;
        }

        .input-error {
            border-color: #e74c3c !important; /* Penting agar override fokus */
            box-shadow: 0 0 0 3px rgba(231, 76, 60, 0.1);
        }

        .admin-login {
            margin-top: 20px; /* Jarak lebih besar */
            display: block;
        }

        .admin-login-btn {
            background: linear-gradient(90deg, #00c6ff, #0072ff); /* Gradient baru untuk admin */
            color: white;
            border: none;
            padding: 12px; /* Padding lebih kecil dari tombol login utama */
            width: 100%;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            margin-top: 10px; /* Jarak dari tombol login jika perlu */
        }

        .admin-login-btn:hover {
            background: linear-gradient(90deg, #0072ff, #00c6ff);
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(0, 114, 255, 0.3);
        }

        /* Responsive Adjustments */
        @media (max-width: 480px) {
            .login-container {
                padding: 35px 25px;
                margin: 0 20px;
                border-radius: 10px;
            }

            h2 {
                font-size: 26px;
            }

            .submit-btn, .admin-login-btn {
                padding: 13px;
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form id="loginForm" action="process_login.php" method="post">
            <div class="form-group">
                <label for="name">Username:</label>
                <input type="text" id="name" name="name" required placeholder="Masukkan username Anda">
                <div id="nameError" class="error-message">Username harus diisi</div>
            </div>
            
            <div class="form-group">
                <label for="password">Password:</label>
                <div class="password-container">
                    <input type="password" id="password" name="password" required placeholder="Masukkan password Anda">
                    <i class="toggle-password fas fa-eye" onclick="togglePassword()"></i>
                </div>
                <div id="passwordError" class="error-message">Password harus diisi</div>
            </div>
            
            <button type="submit" class="submit-btn">Login</button>
        </form>

        <div class="register-link">
            Belum punya akun? <a href="register.php">Daftar sekarang</a>
        </div>

        <div class="admin-login">
            <a href="/muptiii/includes/loginadmin.php" class="admin-login-btn">Login sebagai Admin</a>
        </div>
    </div>

    <script>
        // Toggle password visibility
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.querySelector('.toggle-password');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }

        // Form validation
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            let isValid = true;
            
            // Validate username
            const username = document.getElementById('name');
            const usernameError = document.getElementById('nameError');
            if (username.value.trim() === '') {
                username.classList.add('input-error');
                usernameError.style.display = 'block';
                isValid = false;
            } else {
                username.classList.remove('input-error');
                usernameError.style.display = 'none';
            }
            
            // Validate password
            const password = document.getElementById('password');
            const passwordError = document.getElementById('passwordError');
            if (password.value.trim() === '') {
                password.classList.add('input-error');
                passwordError.style.display = 'block';
                isValid = false;
            } else {
                password.classList.remove('input-error');
                passwordError.style.display = 'none';
            }
            
            if (!isValid) {
                e.preventDefault();
            }
        });

        // Add input event listeners to clear errors when typing
        document.getElementById('name').addEventListener('input', function() {
            if (this.value.trim() !== '') {
                this.classList.remove('input-error');
                document.getElementById('nameError').style.display = 'none';
            }
        });

        document.getElementById('password').addEventListener('input', function() {
            if (this.value.trim() !== '') {
                this.classList.remove('input-error');
                document.getElementById('passwordError').style.display = 'none';
            }
        });
    </script>
</body>
</html>