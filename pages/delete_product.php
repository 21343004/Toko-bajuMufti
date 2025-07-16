<?php

include "database.php";


$id = $_GET['id'];


$query = "SELECT * FROM products WHERE id='".$id."'";
$sql = mysqli_query($conn, $query); 
$data = mysqli_fetch_array($sql); 


if(is_file("/muptiii/assets/images/products".$data['foto'])) 
    unlink("/muptiii/assets/images/products".$data['foto']); 


$query2 = "DELETE FROM products WHERE id='".$id."'";
$sql2 = mysqli_query($conn, $query2); 

if($sql2){ 
    
    header("location: /muptiii/index.php"); 
}else{
    
    echo "Data gagal dihapus. <a href='forminput.php'>Kembali</a>";
}
?>
