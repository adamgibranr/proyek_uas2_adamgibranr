<?php
session_start();
// Create database connection using config file
include_once("config.php");
 
// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM tb_barang ORDER BY id DESC");
?>
 
<html>
<head>    
<link rel="stylesheet" href="../CSS/dataview.css">
    <title>Daftar Data Barang</title>
</head>
 
<body>
<div class="links">
<a href="add.php">Tambah Barang</a>
<a href="../session_handling/logout.php" class="btn">Logout</a>
<a href="../session_handling/berhasil_login.php" class="btn">Dashboard</a>
</div>
<br/><br/>
    <div class="data">
    <table width='80%' border=1>
 
    <tr>
        <th>Nama</th> <th>Harga</th> <th>Tenggat</th> <th>Status</th> <th>Update</th>
    </tr>
    <?php  
    while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$user_data['nama']."</td>";
        echo "<td>".$user_data['harga']."</td>";
        echo "<td>".$user_data['tenggat']."</td>";    
        echo "<td>".$user_data['status']."</td>";    

        echo "<td><a href='edit.php?id=$user_data[id]'>Edit</a> | <a href='delete.php?id=$user_data[id]'>Delete</a></td></tr>";        
    }
    ?>
    </table></div>
    <br/><br/>
    <b>Keterangan</b><br/>
    <p>Untuk informasi "Status", A berarti data "Ada", S berarti "Sudah diambil"</p>
</body>
</html>