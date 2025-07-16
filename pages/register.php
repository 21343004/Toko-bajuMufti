<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - Toko Baju Mufti</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* General Reset & Body Styles - Consistent with login.php */
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

        /* Register Container Styles - Consistent with login.php */
        .container {
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

        .container::before {
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

        /* Form Group & Input Styles - Consistent with login.php */
        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 8px;
            font-weight: 500;
            color: #555;
            font-size: 15px;
            text-align: left; /* Rata kiri untuk label */
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            padding: 14px 18px; /* Padding lebih nyaman */
            margin-bottom: 25px; /* Jarak antar input lebih besar */
            border: 1px solid #e0e0e0; /* Border lebih terang */
            border-radius: 8px; /* Border-radius lebih lembut */
            font-size: 16px;
            transition: all 0.3s ease; /* Transisi lebih halus */
            background-color: #f8f8f8; /* Background input */
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #6a11cb; /* Warna border fokus yang lebih modern */
            outline: none;
            box-shadow: 0 0 0 4px rgba(106, 17, 203, 0.15); /* Shadow fokus yang lebih tebal dan transparan */
            background-color: #ffffff;
        }

        /* Submit Button Styles - Consistent with login.php */
        input[type="submit"] {
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

        input[type="submit"]:hover {
            background: linear-gradient(90deg, #2575fc, #6a11cb); /* Balik gradient saat hover */
            transform: translateY(-3px); /* Efek angkat saat hover lebih terasa */
            box-shadow: 0 8px 20px rgba(37, 117, 252, 0.3); /* Shadow lebih kuat saat hover */
        }

        /* Error and Success Messages - Consistent with login.php's error styling */
        .error-message {
            color: #e74c3c;
            font-size: 13px; /* Ukuran font error lebih kecil */
            margin-top: -15px; /* Sesuaikan margin untuk pesan error */
            margin-bottom: 20px; /* Jarak setelah error message */
            display: none;
            text-align: left; /* Pastikan rata kiri */
        }
        
        .success-message {
            background-color: #e6ffee; /* Latar belakang hijau muda */
            color: #28a745; /* Warna teks hijau gelap */
            padding: 15px;
            border-radius: 8px;
            text-align: center;
            margin-top: 25px; /* Jarak dari form */
            font-weight: 600;
            font-size: 16px;
            border: 1px solid #28a745; /* Border hijau */
            display: none;
            animation: fadeIn 0.8s ease-out; /* Animasi fade-in */
        }

        /* Responsive Adjustments - Consistent with login.php */
        @media (max-width: 480px) {
            .container {
                padding: 35px 25px;
                margin: 0 20px;
                border-radius: 10px;
            }

            h2 {
                font-size: 26px;
            }

            input[type="submit"] {
                padding: 13px;
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Daftar Akun Baru</h2>
        <form id="registerForm" action="process_register.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required placeholder="Buat username Anda">
            <div id="usernameError" class="error-message"></div>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required placeholder="Masukkan alamat email Anda">
            <div id="emailError" class="error-message"></div>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required placeholder="Buat password (min. 8 karakter)">
            <div id="passwordError" class="error-message">Password harus minimal 8 karakter</div>
            
            <input type="submit" value="Daftar">
        </form>
        <div id="successMessage" class="success-message">Pendaftaran berhasil! Anda akan segera diarahkan.</div>
    </div>

    <script>
        // JavaScript untuk validasi form
        document.getElementById('registerForm').addEventListener('submit', function(event) {
            // Reset pesan error sebelumnya
            document.querySelectorAll('.error-message').forEach(el => {
                el.style.display = 'none';
            });
            
            let isValid = true;
            
            // Validasi username
            const usernameInput = document.getElementById('username');
            const username = usernameInput.value.trim();
            const usernameError = document.getElementById('usernameError');

            if (username.length < 4) {
                usernameError.textContent = 'Username harus minimal 4 karakter';
                usernameError.style.display = 'block';
                isValid = false;
            } else if (!/^[a-zA-Z0-9_]+$/.test(username)) {
                usernameError.textContent = 'Username hanya boleh mengandung huruf, angka, dan underscore';
                usernameError.style.display = 'block';
                isValid = false;
            }
            
            // Validasi email
            const emailInput = document.getElementById('email');
            const email = emailInput.value.trim();
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            const emailError = document.getElementById('emailError');
            if (!emailRegex.test(email)) {
                emailError.textContent = 'Masukkan alamat email yang valid';
                emailError.style.display = 'block';
                isValid = false;
            }
            
            // Validasi password
            const passwordInput = document.getElementById('password');
            const password = passwordInput.value;
            const passwordError = document.getElementById('passwordError');
            if (password.length < 8) {
                passwordError.textContent = 'Password harus minimal 8 karakter';
                passwordError.style.display = 'block';
                isValid = false;
            }
            
            // Jika validasi gagal, hentikan pengiriman form
            if (!isValid) {
                event.preventDefault();
            } else {
                // Jika validasi sukses, lakukan simulasi pengiriman (Anda perlu mengganti ini dengan pengiriman ke server)
                event.preventDefault(); // Mencegah refresh halaman untuk simulasi
                
                // Tampilkan pesan sukses dan sembunyikan form
                document.getElementById('registerForm').style.display = 'none';
                document.getElementById('successMessage').style.display = 'block';

                // Opsional: Redirect setelah beberapa detik
                setTimeout(() => {
                    window.location.href = 'login.php'; // Ganti dengan halaman tujuan setelah registrasi
                }, 3000); // Redirect setelah 3 detik
            }
        });

        // Validasi real-time untuk input
        document.getElementById('username').addEventListener('input', function() {
            const username = this.value.trim();
            const usernameError = document.getElementById('usernameError');
            if (username.length >= 4 && /^[a-zA-Z0-9_]+$/.test(username)) {
                usernameError.style.display = 'none';
            } else if (username.length < 4) {
                usernameError.textContent = 'Username harus minimal 4 karakter';
                usernameError.style.display = 'block';
            } else {
                usernameError.textContent = 'Username hanya boleh mengandung huruf, angka, dan underscore';
                usernameError.style.display = 'block';
            }
        });

        document.getElementById('email').addEventListener('input', function() {
            const email = this.value.trim();
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            const emailError = document.getElementById('emailError');
            if (emailRegex.test(email)) {
                emailError.style.display = 'none';
            } else {
                emailError.textContent = 'Masukkan alamat email yang valid';
                emailError.style.display = 'block';
            }
        });

        document.getElementById('password').addEventListener('input', function() {
            const password = this.value;
            const passwordError = document.getElementById('passwordError');
            if (password.length >= 8) {
                passwordError.style.display = 'none';
            } else {
                passwordError.textContent = 'Password harus minimal 8 karakter';
                passwordError.style.display = 'block';
            }
        });
    </script>
</body>
</html>