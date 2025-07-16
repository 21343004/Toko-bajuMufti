<?php
session_start();
require 'database.php'; // Pastikan file database.php terhubung dengan benar

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $_POST['password'];
   

            
       if ($username === 'admin' && $password === 'admin123') {
    $_SESSION['admin'] = true;
    header("Location: /muptiii/indexadmin.php");
    exit();
} else {
            // Jika username admin tidak ditemukan
            echo "<script>alert('Username admin tidak ditemukan!'); window.history.back();</script>";
            exit();
        }
    }
 