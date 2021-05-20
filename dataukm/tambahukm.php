<?php include "../koneksi.php";
session_start();
if(!isset($_SESSION['login'])) {
    echo "<script>alert('Login dahulu');</script>";
    echo "<script>window.location.replace('../');</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah UKM</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <a href="./" style="font-size: 1.2rem">Kembali</a>
    <form action="" method="POST">
        <table style="max-width: 50%"> 
            <tr>
                <td style="width: 50%">Nama UKM </td>
                <td>:</td>
                <td><input type="text" name="nama_ukm" id="nama_ukm" style="width: 100%" /></td>
            </tr>
            <tr>
                <td style="width: 50%">Akronim UKM </td>
                <td>:</td>
                <td><input type="text" name="akronim" id="akronim" style="width: 100%"  /></td>
            </tr>
        </table>
        <button type="submit" name="submit" id="submit">Tambah</button>
    </form>
    <script>
        let submit = document.querySelector("#submit");
        let input = document.getElementsByTagName("input");
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

    $sql = "INSERT INTO ukm (nama_ukm, akronim_ukm) VALUES('$nama_ukm', '$akronim_ukm')";
    $sql_pdo->exec($sql);

    echo '<script>alert("Data UKM berhasil ditambahkan")</script>';
    echo '<script>location="./"</script>';
}

$sql_pdo = null;
?>