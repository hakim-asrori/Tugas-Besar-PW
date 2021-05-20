<?php
include "../koneksi.php";
$sql = "SELECT * FROM hmj";
$result = $sql_obj->query($sql);

$sql_obj->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar HMJ</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
<div>
    <a href="tambahhmj.php">Tambah HMJ</a>
    <table border="1" style="width: 100%">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama HMJ</th>
                <th>Akronim</th>
                <th>Tanggal Berdiri</th>
                <th>Jurusan</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <body>
        <?php
            while($row = $result->fetch_assoc()) {
            
                ?>
            <tr>
                <th>1</th>
                <td><?php echo $row["nama_hmj"]?></td>
                <td><?php echo $row["akronim_hmj"]?></td>
                <td><?php echo $row["tgl_berdiri"]?></td>
                <td><?php echo $row["nama_hmj"]?></td>
                <td>
                    <a href="edithmj.php">Edit</a>
                    <!-- Ini html sebelumnya diubah menjadi dibawah ini <a href="#">Hapus</a> -->
                    <span>|</span>
                    <a href="hapushmj.php?id=<?= $row["id"]?>">Hapus</a>
                </td>
            </tr>
            <?php
                }
            ?>
        </body>
    </table>
</div>
</body>
</html>