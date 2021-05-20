<?php 
session_start();

if (isset($_SESSION['login'])) {
    echo "<script>alert('Logout Dahulu');</script>";
    echo "<script>window.location.replace('dataukm/');</script>";
}
include "./koneksi.php";

if(isset($_POST["login"])){
    $email = $_POST['email'];
    $password= $_POST['password'];

    if (empty($email)) {
        echo '<script>alert("Email tidak boleh kosong")</script>';
    } elseif (empty($password)) {
        echo '<script>alert("Password tidak boleh kosong")</script>';
    } else {
        $ambil = $sql_obj->query("SELECT * FROM users WHERE email ='$email' AND password = '$password'");

        if ($ambil->num_rows === 1) {
            $row = $ambil->fetch_assoc();

            $_SESSION['login'] = true;
            $_SESSION['email'] = $row['email'];
            echo "<script>alert('Berhasil Login');</script>";
            echo "<script>window.location.replace('dataukm/');</script>";
        } else {
            echo "<script>alert('Gagal Login');</script>";
            echo "<script>window.location.replace('index.php');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: gray;
            overflow-x: scroll;
        }

        .kotak {
            padding: 100px 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .kotak-body {
            max-width: 400px;
            padding: 10px 20px;
            box-shadow: 3px 3px 5px rgba(0, 0, 0, .5);
            background-color: #bbb;
        }

        .kotak-body h1 {
            text-align: center;
            margin-top: 10px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            font-size: 1.2rem;
            margin-top: 1rem;
        }

        .row {
            display: flex;
            margin-bottom: 1rem;
        }

        .row .form-group input[name="password1"] {
            margin-right: 10px;
        }

        input {
            padding: 10px 0 10px 10px;
            border: 0;
            border-radius: 5px;
            outline: none;
            box-shadow: 2px 2px 4px rgba(0, 0, 0, .5);
        }

        input:focus {
            border: .5px solid blue;
        }

        button {
            cursor: pointer;
            background-color: blue;
            border: none;
            outline: none;
            color: white;
            padding: 10px 0;
            font-size: 1rem;
            text-transform: uppercase;
            border-radius: 5px;
            margin-bottom: 1rem;
            transition: .5s all;
        }

        button:hover {
            background-color: #1313B0;
        }

        a {
            text-align: center;
            color: blue;
            text-decoration: none;
            margin-bottom: 1rem;
        }

        a:hover {
            text-decoration: underline;
        }

        @media (max-width: 500px) {
            .row {
                flex-direction: column;
            }

            .row .form-group input[name="password1"] {
                margin-right: 0;
            }

            .form-group label {
                margin-bottom: 10px;
            }
        }
    </style>
</head>

<body>
   <div class="kotak">
    <div class="kotak-body">
        <h1>Login</h1>
        <form action="" method="post">
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>
            <div class="form-group" style="margin: 1rem 0;">
                <button type="submit" name="login">Log in</button>
                <a href="./register.php">Belum punya akun? silahkan login.</a>
            </div>
        </form>
    </div>     
</div>
</body>
</html>