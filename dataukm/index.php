<?php
session_start();
include "../koneksi.php";
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
    <title>List UKM</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <div>
        <a href="../logout.php" style="font-size: 1.2rem">Logout</a>
            <table style="max-width: 50%"> 
            <input type="hidden" id="id">
                <tr>
                    <td style="width: 50%">Nama UKM </td>
                    <td>:</td>
                    <td><input type="text" id="nama" style="width: 100%" /></td>
                </tr>
                <tr>
                    <td style="width: 50%">Akronim UKM </td>
                    <td>:</td>
                    <td><input type="text" id="akronim" style="width: 100%"  /></td>
                </tr>
            </table>
            <button type="submit" onclick="add()" id="tambah">Tambah</button>
            <button type="submit" style="background-color: green" hidden onclick="update()" id="edit">Simpan</button>
            <hr>
        <table border="1" width="100%" cellspacing="0" style="margin-top: 1rem;" id="dataTable">
            <thead>
                <tr>
                    <th>Nama UKM</th>
                    <th>Akronim</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>

    <script src="script.js"></script>
</body>
</html>