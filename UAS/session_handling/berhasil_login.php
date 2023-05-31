<?php 
 
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
 
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/dashboard.css">
    <title>Berhasil Login</title>
</head>
<body>
    <div class="container-logout">
        <form action="" method="POST" class="login-email">
            <?php echo "<h1>Selamat Datang di Penitipan Barang, " . $_SESSION['username'] ."!". "</h1>"; ?>
        </form>
        <img src="../CSS/icon1.png" alt="Image Description">

        <div class="links">
        <a href="logout.php" class="btn">Logout</a>
        <a href="../crud_handling/add.php" class="btn">Tambah Data</a>
        <a href="../crud_handling/index.php" class="btn">Lihat Data</a>
        </div>
    </div>
</body>
</html>