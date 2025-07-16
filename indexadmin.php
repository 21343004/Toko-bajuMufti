<?php
session_start();
include 'includes/config.php';
include 'includes/headeradmin.php';

?>

<link rel="stylesheet" type="text/css" href="assets/css/stylee.css">
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<script src="assets/js/script.js"></script>
<!-- Hero Section -->
<section class="hero bg-primary text-white py-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6">
        <h1 class="display-4 fw-bold">Selamat Datang di Toko Kami</h1>
        <p class="lead">Temukan produk terbaik dengan harga spesial!</p>
        <a href="pages/products.php" class="btn btn-light btn-lg">Belanja Sekarang</a>
      </div>
      <div class="col-lg-6">
        <img src="assets/images/heroo.png" class="img-fluid" alt="Hero Image">
      </div>
    </div>
  </div>
</section>

<!-- Featured Products -->
<section class="featured-products py-5">
  <div class="container">
    <h2 class="text-center mb-5">Produk Unggulan</h2>
    <div class="row">
     <?php
                // Query untuk mendapatkan produk unggulan
                $query = "SELECT * FROM products LIMIT 10";
                $result = $conn->query($query);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<div class='product'>";
                        echo "<img src='/muptiii/assets/images/products/" . htmlspecialchars($row["image"]) . "' alt='" . htmlspecialchars($row["name"]) . "'>";
                        echo "<h3>" . htmlspecialchars($row["name"]) . "</h3>";
                        echo "<p>" . htmlspecialchars($row["description"]) . "</p>";
                      echo "<p>Rp." . htmlspecialchars(number_format($row["price"], 0, ',', '.')) . "</p>";

                       echo "<form method='post' action='pages/add_to_cart.php'>";
        echo "<input type='hidden' name='product_id' value='" . htmlspecialchars($row["id"]) . "'>";
        echo "<input type='hidden' name='product_name' value='" . htmlspecialchars($row["name"]) . "'>";
        echo "<input type='hidden' name='product_price' value='" . htmlspecialchars($row["price"]) . "'>";
        echo "<button type='submit' class='add-to-cart-btn'>Tambahkan ke Keranjang</button>";
        echo "</form>";
        
        
    
                        echo "</div>";
                    }
                } else {
                    echo "<p>Tidak ada produk unggulan saat ini.</p>";
                }


                ?>
      
            
           
          
          </div>
        </div>
      </div>
      <?php  ?>
    </div>
  </div>
</section>

<!-- Categories Section -->
<section class="categories py-5 bg-light">
  <div class="container">
    <h2 class="text-center mb-5">Kategori Populer</h2>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="card category-card">
          <img src="assets/images/categories/electronics.jpg" class="card-img" alt="Elektronik">
          <div class="card-img-overlay d-flex align-items-center">
            <h3 class="text-white bg-dark p-2 rounded">Elektronik</h3>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card category-card">
          <img src="assets/images/categories/fashion.jpg" class="card-img" alt="Fashion">
          <div class="card-img-overlay d-flex align-items-center">
            <h3 class="text-white bg-dark p-2 rounded">Fashion</h3>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card category-card">
          <img src="assets/images/categories/home.jpg" class="card-img" alt="Rumah Tangga">
          <div class="card-img-overlay d-flex align-items-center">
            <h3 class="text-white bg-dark p-2 rounded">Rumah Tangga</h3>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>

<style>.hero {
  background: linear-gradient(45deg, #2c3e50, #3498db);
  min-height: 600px;
  display: flex;
  align-items: center;
}

.product-card {
  transition: transform 0.3s;
}

.product-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 10px 20px rgba(0,0,0,0.1);
}

.category-card {
  height: 250px;
  overflow: hidden;
  position: relative;
}

.category-card img {
  height: 100%;
  object-fit: cover;
}
</style>



<style>
.add-to-cart-btn {
    background-color: #4CAF50;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 14px;
    margin-top: 10px;
    transition: background-color 0.3s;
}

.add-to-cart-btn:hover {
    background-color: #45a049;
}

.product {
    border: 1px solid #ddd;
    padding: 15px;
    margin: 10px;
    border-radius: 5px;
    text-align: center;
    max-width: 250px;

</style>