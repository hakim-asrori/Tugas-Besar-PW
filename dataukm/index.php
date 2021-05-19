<?php
include "../koneksi.php";
$stmt = $sql_pdo->prepare("SELECT * FROM ukm");
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

$sql_pdo = null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List UKM</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<div>
    <a href="tambahukm.php" style="font-size: 1.2rem">Tambah UKM</a>
    <table border="1" width="100%" cellspacing="0" style="margin-top: 1rem;">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama UKM</th>
                <th>Akronim</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <body>
        <?php
            foreach($stmt->fetchAll() as $row) {
            // var_dump($row); die;
                ?>
            <tr>
                <th>1</th>
                <td><?= $row["nama_ukm"]?></td>
                <td><?= $row["akronim_ukm"]?></td>
                <td>
                    <a href="editukm.php?id=<?= $row["id"]?>">Edit</a>
                    <span>|</span>
                    <a href="hapusukm.php?id=<?= $row["id"]?>">Hapus</a>
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