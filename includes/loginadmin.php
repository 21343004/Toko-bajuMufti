<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sepatu Online</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-image: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        }

        .login-container {
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .login-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, #ff7e5f, #feb47b);
        }

        h2 {
            margin-bottom: 25px;
            color: #333;
            font-size: 28px;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
            position: relative;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #555;
        }

        input {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            transition: all 0.3s;
        }

        input:focus {
            border-color: #ff7e5f;
            box-shadow: 0 0 0 3px rgba(255, 126, 95, 0.2);
            outline: none;
        }

        .password-container {
            position: relative;
        }

        .toggle-password {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #777;
        }

        .submit-btn {
            background: linear-gradient(90deg, #ff7e5f, #feb47b);
            color: white;
            border: none;
            padding: 12px;
            width: 100%;
            border-radius: 5px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 10px;
        }

        .submit-btn:hover {
            background: linear-gradient(90deg, #feb47b, #ff7e5f);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(254, 180, 123, 0.4);
        }

        .register-link {
            margin-top: 20px;
            display: block;
            color: #666;
        }

        .register-link a {
            color: #ff7e5f;
            text-decoration: none;
            font-weight: 600;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        .error-message {
            color: #e74c3c;
            font-size: 14px;
            margin-top: 5px;
            display: none;
        }

        .input-error {
            border-color: #e74c3c;
        }

        .admin-login {
            margin-top: 15px;
            display: block;
        }

        .admin-login-btn {
            background: linear-gradient(90deg, #4b6cb7, #182848);
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 5px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        .admin-login-btn:hover {
            background: linear-gradient(90deg, #182848, #4b6cb7);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(75, 108, 183, 0.4);
        }

        @media (max-width: 480px) {
            .login-container {
                padding: 30px 20px;
                margin: 0 15px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form id="loginForm" action="/muptiii/pages/process_login_admin.php" method="post">
            <div class="form-group">
                <label for="name">Username:</label>
                <input type="text" id="username" name="username" required placeholder="Masukkan username Anda">
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