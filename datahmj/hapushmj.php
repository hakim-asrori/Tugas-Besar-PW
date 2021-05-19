<?php
include "../koneksi.php";

$id = $_GET['id'];

$sql = "DELETE FROM hmj WHERE id = '$id'";
// kode sebelumnya $sql_pdo->exec($sql);

// diubah menjadi 
$sql_obj->query($sql);

echo '<script>alert("Data HMJ berhasil dihapus")</script>';
echo '<script>location="./"</script>';
