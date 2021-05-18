<?php
include "../koneksi.php";

$id = $_GET['id'];

$sql = "DELETE FROM ukm WHERE id = '$id'";
$sql_pdo->exec($sql);

echo '<script>alert("Data UKM berhasil dihapus")</script>';
echo '<script>location="./"</script>';