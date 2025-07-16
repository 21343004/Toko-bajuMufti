<?php
session_start();
require 'database.php'; // Pastikan file database.php terhubung dengan benar

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST['name']);
    $password = $_POST['password'];

    // Lakukan query untuk mencari user dengan username yang diberikan
    $result = $conn->query("SELECT * FROM users WHERE name = '$username'");
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            // Jika password benar, set session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            
            // Redirect ke halaman utama
            header("Location: /DZAKY ARDIKA_23101152610063_PEMOGRAMAN WEB LANJUTAN_nex/indexuser.php");
        } else {
            // Jika password salah
            echo "<script>alert('Password salah!'); window.history.back();</script>";
        }
    } else {
        // Jika username tidak ditemukan
        echo "<script>alert('Username tidak ditemukan!'); window.history.back();</script>";
    }
    $conn->close();
}
?>
