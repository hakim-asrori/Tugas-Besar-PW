<?php
include "../koneksi.php";
session_start();
if(!isset($_SESSION['login'])) {
    echo "<script>alert('Login dahulu');</script>";
    echo "<script>window.location.replace('../');</script>";
}
$id = $_GET['id'];

$stmt = $sql_pdo->prepare("SELECT * FROM ukm WHERE id = '$id'");
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Edit UKM</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <a href="./" style="font-size: 1.2rem">Kembali</a>
    <form action="" method="POST">
        <table>
            <?php foreach ($stmt->fetchAll() as $row) { ?>
                <tr>
                    <td>Nama UKM </td>
                    <td>:</td>
                    <td><input type="text" name="nama_ukm" value="<?= $row["nama_ukm"]?>" /></td>
                </tr>
                <tr>
                    <td>Akronim UKM </td>
                    <td>:</td>
                    <td><input type="text" name="akronim" value="<?= $row["akronim_ukm"]?>" /></td>
                </tr>
            <?php } ?>
        </table>
        <button type="submit" name="submit" id="submit">Edit</button>
    </form>
    <script>
        let submit = document.querySelector("#submit");
        let input = document.getElementsByTagName("input");
        console.log(input);
        for (let i = 0; i < input.length; i++) {
            submit.addEventListener("click", function () {
                input[i].required = true;
            })
        }
    </script>
</body>
</html>
<?php

if (isset($_POST['submit'])) {
    $nama_ukm = $_POST['nama_ukm'];
    $akronim_ukm = $_POST['akronim'];

    $sql = "UPDATE ukm SET nama_ukm = '$nama_ukm', akronim_ukm = '$akronim_ukm' WHERE id = '$id'";
    $sql_pdo->exec($sql);

    echo '<script>alert("Data UKM berhasil diubah")</script>';
    echo '<script>location="./"</script>';
}

$sql_pdo = null;

?>