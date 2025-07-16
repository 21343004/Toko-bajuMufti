<?php
session_start();
include "database.php";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            border-bottom: 2px solid #4CAF50;
            padding-bottom: 10px;
        }
        .cart-item {
            display: flex;
            border-bottom: 1px solid #ddd;
            padding: 15px 0;
            align-items: center;
        }
        .cart-item img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            margin-right: 20px;
        }
        .item-details {
            flex-grow: 1;
        }
        .item-name {
            font-weight: bold;
            margin-bottom: 5px;
        }
        .item-price {
            color: #4CAF50;
            margin-bottom: 5px;
        }
        .quantity-control {
            display: flex;
            align-items: center;
        }
        .quantity-control input {
            width: 50px;
            text-align: center;
            margin: 0 10px;
        }
        .remove-btn {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
        }
        .cart-summary {
            margin-top: 20px;
            text-align: right;
            padding-top: 20px;
            border-top: 2px solid #4CAF50;
        }
        .checkout-btn {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }
        .empty-cart {
            text-align: center;
            padding: 40px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Keranjang Belanja Anda</h1>
        
        <?php if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
            <?php 
            $total = 0;
            foreach($_SESSION['cart'] as $id => $item): 
                // Dapatkan info tambahan produk dari database jika diperlukan
                $query = "SELECT image FROM products WHERE id = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $result = $stmt->get_result();
                $product = $result->fetch_assoc();
                
                $subtotal = $item['price'] * $item['quantity'];
                $total += $subtotal;
            ?>
            <div class="cart-item">
                <img src="/DZAKY ARDIKA_23101152610063_PEMOGRAMAN WEB LANJUTAN_nex/assets/images/products<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>">
                
                <div class="item-details">
                    <div class="item-name"><?= htmlspecialchars($item['name']) ?></div>
                    <div class="item-price">Rp <?= number_format($item['price'], 0, ',', '.') ?></div>
                    
                    <form method="post" action="update_cart.php" class="quantity-control">
                        <input type="hidden" name="id" value="<?= $id ?>">
                        <button type="submit" name="action" value="decrease">-</button>
                        <input type="number" name="quantity" value="<?= $item['quantity'] ?>" min="1">
                        <button type="submit" name="action" value="increase">+</button>
                    </form>
                </div>
                
                <div style="margin-left: auto; text-align: right;">
                    <div style="font-weight: bold; margin-bottom: 10px;">
                        Rp <?= number_format($subtotal, 0, ',', '.') ?>
                    </div>
                    <form method="post" action="remove_from_cart.php">
                        <input type="hidden" name="id" value="<?= $id ?>">
                        <button type="submit" class="remove-btn">Hapus</button>
                    </form>
                </div>
            </div>
            <?php endforeach; ?>
            
            <div class="cart-summary">
                <h3>Total Belanja: Rp <?= number_format($total, 0, ',', '.') ?></h3>
                <button class="checkout-btn">Lanjut ke Pembayaran</button>
            </div>
            
        <?php else: ?>
            <div class="empty-cart">
                <h2>Keranjang Belanja Kosong</h2>
                <p>Anda belum menambahkan produk apapun ke keranjang belanja.</p>
                <a href="products.php">Kembali ke Produk</a>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>