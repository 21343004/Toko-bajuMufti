<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['cart'][$_POST['id']])) {
    $product_id = $_POST['id'];
    $action = $_POST['action'];
    
    if ($action == 'increase') {
        $_SESSION['cart'][$id]['quantity']++;
    } elseif ($action == 'decrease') {
        if ($_SESSION['cart'][$id]['quantity'] > 1) {
            $_SESSION['cart'][$id]['quantity']--;
        }
    } elseif (isset($_POST['quantity']) && is_numeric($_POST['quantity']) && $_POST['quantity'] > 0) {
        $_SESSION['cart'][$id]['quantity'] = (int)$_POST['quantity'];
    }
}

header('Location: cart.php');
exit();
?>