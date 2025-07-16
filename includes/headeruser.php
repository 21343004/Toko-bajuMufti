<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Toko Serba ada</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">Toko Serba Ada</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/products.php">Produk</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/cart.php">
              <i class="fas fa-shopping-cart"></i>
              <span id="cart-count" class="badge bg-danger">
                <?= $_SESSION['cart_count'] ?? 0 ?>
              </span>
            </a>
          </li>
          <?php if(isset($_SESSION['user'])): ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                <?= $_SESSION['user']['name'] ?>
              </a>
              <ul class="dropdown-menu">
                <?php if($_SESSION['user']['role'] === 'admin'): ?>
                  <li><a class="dropdown-item" href="admin/dashboard.php">Dashboard Admin</a></li>
                <?php endif; ?>
                <li><a class="dropdown-item" href="profile.php">Profil</a></li>
                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
              </ul>
            </li>
          <?php else: ?>
            <li class="nav-item">
              <a class="nav-link" href="pages/login.php">Logout</a>
            </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Toast Notification -->
  <div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="cart-toast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-body">
        Produk berhasil ditambahkan ke keranjang!
      </div>
    </div>
  </div>
