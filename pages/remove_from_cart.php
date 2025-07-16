<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['cart'][$_POST['id']])) {
    unset($_SESSION['cart'][$_POST['id']]);
    
    // Jika keranjang kosong, hapus session cart
    if (count($_SESSION['cart']) == 0) {
        unset($_SESSION['cart']);
    }
}

header('Location: cart.php');
exit();
?>