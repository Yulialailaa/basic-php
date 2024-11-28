<?php
require './config/db.php';

// Mendapatkan ID produk dari parameter URL
$id = $_GET['id'];

// Ambil data produk berdasarkan ID
$product = mysqli_query($db_connect, "SELECT * FROM products WHERE id = $id");
$row = mysqli_fetch_assoc($product);

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_POST['image']; // Jika ingin mengubah gambar juga

    // Update data produk
    mysqli_query($db_connect, "UPDATE products SET name='$name', price='$price', image='$image' WHERE id=$id");

    // Redirect ke halaman data produk
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Produk</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/cosmo/bootstrap.min.css"
        integrity="sha384-5QFXyVb+lrCzdN228VS3HmzpiE7ZVwLQtkt+0d9W43LQMzz4HBnnqvVxKg6O+04d" crossorigin="anonymous">
        <style>
    a {
      color: azure !important;
      /* Memastikan semua link memiliki warna dark */
    }

    .carousel-caption h5 {
      background-color: rgba(255, 255, 255, 0.7);
      /* Putih dengan transparansi 70% */
      border-radius: 20px;
      padding: 10px 20px;
      display: inline-block;
      /* Agar ukuran sesuai dengan konten */
    }

    .card {
      border-radius: 20px;
    }

    h5 {
      color: black;
    }
  </style>
</head>
<body>
    <h1>Edit Produk</h1>
    <form method="post">
        <label>Nama Produk:</label>
        <input type="text" name="name" value="<?= $row['name']; ?>" required><br><br>

        <label>Harga:</label>
        <input type="text" name="price" value="<?= $row['price']; ?>" required><br><br>

        <label>Gambar URL:</label>
        <input type="text" name="image" value="<?= $row['image']; ?>"><br><br>

        <button type="submit" name="update">Update</button>
    </form>
    <a href="index.php">Kembali ke Data Produk</a>
</body>
</html>
