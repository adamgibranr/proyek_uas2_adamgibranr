<html>
<head>
    <title>Tambah Barang</title>
    <link rel="stylesheet" href="../CSS/dataview.css">
</head>
 
<body>
    <div class="links">
    <a href="index.php">Ke Data Barang</a>
    <a href="../session_handling/logout.php" class="btn">Logout</a>
    <a href="../session_handling/berhasil_login.php" class="btn">Dashboard</a>
    </div>
    <br/><br/>
 
    <form action="add.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>Nama Barang</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr> 
                <td>Harga</td>
                <td><input type="number" name="harga"></td>
            </tr>
            <tr> 
                <td>Tenggat</td>
                <td><input type="date" name="tenggat"></td>
            </tr>
            <tr> 
                <td>Status</td>
                <td><input type="text" name="status"></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>

    <br/><br/>
    <b>Keterangan</b><br/>
    <p>Untuk informasi "Status", A berarti data "Ada", S berarti "Sudah diambil"</p>
    
    <?php
    session_start();
 
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $nama = $_POST['nama'];
        $harga = $_POST['harga'];
        $tenggat = $_POST['tenggat'];
        $status = $_POST['status'];

        
        // include database connection file
        include_once("config.php");
                
        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO tb_barang(nama,harga,tenggat,status) VALUES('$nama','$harga','$tenggat','$status')");
        
        // Show message when user added
        echo "Item added successfully.";
    }
    ?>
</body>
</html>