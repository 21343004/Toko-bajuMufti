
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk Baru</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
            color: #333;
        }
        form {
            max-width: 600px;
            margin: 20px auto;
            background: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            font-weight: bold;
        }
        input[type="text"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 8px;
            margin: 10px 0 20px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box; /* Makes sure the padding does not affect the total width of the inputs */
        }
        input[type="submit"] {
            background-color: #0275d8;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #01447e;
        }
        form br {
            display: none;
        }
    </style>
</head>
<body>
    <h1>Tambah Produk Baru</h1>
    <form action="process_add_product.php" method="POST" enctype="multipart/form-data">
        <td><label for="name">Nama Produk:</label>
        <input type="text" id="name" name="name" required></td>
        
        <td><label for="description">Deskripsi:</label>
        <textarea id="description" name="description" required></textarea></td>

        <td><label for="stock">Stock:</label>
        <input type="number" id="stock" name="stock" required></td>
        
        <td><label for="price">Harga:</label>
        <input type="text" id="price" name="price" required></td>
        
        <td><label for="image">Gambar Produk:</label>
        <input type="file" id="image" name="image" required></td>
        
        <input type="submit" value="Tambah Produk">
    </form>
</body>
</html>

<html>
<head>
    <title></title>
</head>
<body>
    <h1>Data Product</h1>
    
    <table border="1" width="100%">
    <tr>
        
        <th>ID</th>
        <th>NAMA </th>
        <th>Harga</th>
        <th>Deskripsi</th>
        <th>STOCK</th>
        <th>FOTO</th>
        <th colspan="2">Aksi</th>
    </tr>
    <?php
    
    include "database.php";
    
    $query = "SELECT * FROM products"; 
    $sql = mysqli_query($conn , $query); 
    
    while($data = mysqli_fetch_array($sql)){ 
        echo "<tr>";
        
        echo "<td>".$data['id']."</td>";
        echo "<td>".$data['name']."</td>";
        echo "<td>Rp ".number_format($data['price'], 0, ',', '.')."</td>";
        echo "<td>".$data['description']."</td>";
        echo "<td>".$data['stock']."</td>";
        echo "<td><img src='/muptiii/assets/images/products/".$data['image']."' width='100' height='100'></td>";
        echo "<td><a href='edit_product.php?id=".$data['id']."'>Ubah</a></td>";
        echo "<td><a href='delete_product.php?id=".$data['id']."'>Hapus</a></td>";
        echo "</tr>";

    
    }
    ?>
    </table>
</body>
</html>
