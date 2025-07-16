<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    
    // Inisialisasi keranjang jika belum ada
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    
    // Tambahkan produk ke keranjang
    $_SESSION['cart'][$product_id] = array(
        'name' => $product_name,
        'price' => $product_price,
        'quantity' => isset($_SESSION['cart'][$product_id]['quantity']) ? $_SESSION['cart'][$id]['quantity'] + 1 : 1
    );
    
    // Redirect kembali ke halaman produk
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}
?>