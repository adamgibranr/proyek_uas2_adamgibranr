<?php
session_start();
// include database connection file
include_once("config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
    $id = $_POST['id'];
    
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $tenggat = $_POST['tenggat'];
    $status = $_POST['status'];
        
    // update user data
    $result = mysqli_query($mysqli, "UPDATE tb_barang SET nama='$nama', harga='$harga',tenggat='$tenggat',status='$status' WHERE id=$id");
    
    // Redirect to homepage to display updated user in list
    header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
 
// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM tb_barang WHERE id=$id");
 
while($user_data = mysqli_fetch_array($result))
{
    $nama = $user_data['nama'];
    $harga = $user_data['harga'];
    $tenggat = $user_data['tenggat'];
    $status = $user_data['status'];
}
?>
<html>
<head>	
    <title>Edit Data Barang</title>
    <link rel="stylesheet" href="../CSS/dataview.css">
</head>
 
<body>
    <div class="links">
    <a href="index.php">Ke Data Barang</a>
    <a href="../session_handling/logout.php" class="btn">Logout</a>
    <a href="../session_handling/berhasil_login.php" class="btn">Dashboard</a>
    </div>
    <br/><br/>
    
    <form name="update_user" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>Nama Barang</td>
                <td><input type="text" name="nama" value=<?php echo $nama;?>></td>
            </tr>
            <tr> 
                <td>Harga</td>
                <td><input type="number" name="harga" value=<?php echo $harga;?>></td>
            </tr>
            <tr> 
                <td>Tenggat</td>
                <td><input type="date" name="tenggat" value=<?php echo $tenggat;?>></td>
            </tr>
            <tr> 
                <td>Status</td>
                <td><input type="text" name="status" value=<?php echo $status;?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>

    <br/><br/>
    <b>Keterangan</b><br/>
    <p>Untuk informasi "Status", A berarti data "Ada", S berarti "Sudah diambil"</p>

</body>
</html>