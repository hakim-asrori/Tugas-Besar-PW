<?php
$servername = "localhost";
$username = "root";
$password = "";

$database = "db_informasi";

//create connetion
// $sql_pro = mysqli_connect($servername, $username, $password, $database);

//checck connection
// if(!$sql_pro) {
//     die("Connection gagal: " . mysqli_connect_error());
// }
// echo "Connection sukses!";


//create connection
$sql_obj = new mysqli($servername, $username, $password, $database);
// check connection
if ($sql_obj->connect_error) { 
    die("Connection gagal: " . $sql_obj->connect_error);
}
// echo "Connection sukses!";


try{
    $sql_pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $sql_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $_e)
{
    echo "Connection gagal: " . $e->getMassage();
}

?>