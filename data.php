<?php 
session_start();

include "./koneksi.php";

if(isset($_GET["page"])){
    if ($_GET['page'] == "login") {
        $data = json_decode(file_get_contents("php://input"));

        $email = $data->email;
        $password = $data->password;

        $ambil = $sql_obj->query("SELECT * FROM users WHERE email ='$email' AND password = '$password'");

        if ($ambil->num_rows === 1) {
            $row = $ambil->fetch_assoc();

            $_SESSION['login'] = true;
            $_SESSION['email'] = $row['email'];

            if ($row) {
                echo 1;
            } else {
                echo 2;
            }
        }
    }
}
?>