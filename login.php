<?php 
session_start();

include "./koneksi.php";

if (isset($_SESSION['login'])) {
  header("location: dataukm");
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
      overflow-x: hidden;
    }
    .kotak {
      padding: 100px 0;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .kotak-body {
      width: 350px;
      border-radius: 5px;
      background-color: #bbb;
      padding: 10px 20px;
      box-shadow: 3px 3px 5px rgba(0, 0, 0, .5);
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
      <div class="form-group">
        <label>Email</label>
        <input type="text" id="email" required>
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" id="password" required>
      </div>
      <div class="form-group" style="margin: 1rem 0;">
        <button type="submit" onclick="login()">Log in</button>
        <a href="./register.php">Belum punya akun? silahkan login.</a>
      </div>
    </div>     
  </div>

  <script>
    function login() {
      let email = document.getElementById('email').value;
      let password = document.getElementById('password').value;

      if(password !='' && email != ''){

        let data = {password: password, email: email};
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "data.php?page=login", true);

        xhr.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {

            let response = this.responseText;
            console.log(response);
            if(response == 1){
              alert("Login Berhasil.");

              location='admin/';
            } else {
              alert("Login Gagal.");
            }
          }
        };

        xhr.setRequestHeader("Content-Type", "application/json");

        xhr.send(JSON.stringify(data));
      }
    }
  </script>
</body>
</html>