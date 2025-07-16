
<?php
session_start();
include '../includes/config.php';
include '../includes/header.php';

// Ambil ID produk dari parameter URL
if (isset($_GET['id'])) {
    $product_id = intval($_GET['id']);

    // Query data produk berdasarkan ID
    $query = mysqli_query($conn, "SELECT * FROM products WHERE id = $product_id");
    $product = mysqli_fetch_assoc($query);

    if ($product) {
        ?>
        <div class="container py-5">
            <div class="row">
                <div class="col-md-6">
                    <img src="../assets/images/<?php echo $product['image']; ?>" class="img-fluid rounded shadow-sm" alt="<?php echo $product['name']; ?>">
                </div>
                <div class="col-md-6">
                    <h2><?php echo $product['name']; ?></h2>
                    <h4 class="text-primary">Rp <?php echo number_format($product['price'], 0, ',', '.'); ?></h4>
                    <p><?php echo $product['description']; ?></p>
                    <a href="checkout.php?id=<?php echo $product['id']; ?>" class="btn btn-success">Beli Sekarang</a>
                </div>
            </div>
        </div>
        <?php
    } else {
        echo "<div class='container py-5'><h3>Produk tidak ditemukan.</h3></div>";
    }
} else {
    echo "<div class='container py-5'><h3>Permintaan tidak valid.</h3></div>";
}

include '../includes/footer.php';
?>
