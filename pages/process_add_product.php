<?php
include 'database.php'; // Include konfigurasi database

// Validasi dan sanitasi input
$name = $conn->real_escape_string($_POST['name']);
$description = $conn->real_escape_string($_POST['description']);
$stock = $_POST['stock'];
$price = floatval($_POST['price']);
$image = $_FILES['image']['name'];
$targetDir = "../assets/images/products/"; // Direktori tujuan
$target = $targetDir . basename($image);

// Membuat direktori jika belum ada
if (!is_dir($targetDir)) {
    mkdir($targetDir, 0777, true); // Perhatikan bahwa menggunakan 0777 bisa menjadi risiko keamanan
    // Sesuaikan izin direktori sesuai dengan kebijakan keamanan server Anda
}

// Query untuk menambah produk
$sql = "INSERT INTO products (name, description,stock, price, image) VALUES ('$name', '$description','$stock', '$price', '$image')";

// Memeriksa apakah file berhasil di-upload
if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
    if ($conn->query($sql) === TRUE) {
        header("location: add_product.php"); ;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Gagal meng-upload gambar.";
}


$conn->close();
?>
