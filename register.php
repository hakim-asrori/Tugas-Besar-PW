<?php
include "./koneksi.php";

if (isset($_POST['register'])) {
	$email = $_POST['email'];
	$password1 = $_POST['password1'];
	$password2 = $_POST['password2'];

	if (empty($email)) {
		echo '<script>alert("Email tidak boleh kosong")</script>';
	} elseif (empty($password1)) {
		echo '<script>alert("Password tidak boleh kosong")</script>';
	} elseif (empty($password2)) {
		echo '<script>alert("Konfirmasi password tidak boleh kosong")</script>';
	} else {
		$adaEmail = $sql_obj->query("SELECT email FROM users WHERE email = '$email'")->fetch_assoc();
		if ($adaEmail) {
			echo '<script>alert("Email sudah terdaftar")</script>';
		} else {
			if ($password1 != $password2) {
				echo '<script>alert("Password tidak sama")</script>';
			} else {
				$query = $sql_obj->query("INSERT INTO users VALUES('$email', '$password1')");

				if ($query) {
					echo '<script>alert("Selamat! akun anda sudah terdaftar, silahkan login")</script>';

					echo '<script>location="./"</script>';
				}
			}
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registrasi</title>
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
			<h1>Silahkan Daftar</h1>
			<form action="" method="post">
				<div class="form-group">
					<label>Email</label>
					<input type="email" name="email" autocomplete autofocus required value="<?= isset($email) ? $email : "" ?>">
				</div>
				<div class="row">
					<div class="form-group">
						<label>Password</label>
						<input type="password" name="password1" required>
					</div>
					<div class="form-group">
						<label>Konfirmasi Password</label>
						<input type="password" name="password2" required>
					</div>
				</div>
				<div class="form-group">
					<button type="submit" name="register">Register</button>
					<a href="./">Jika sudah punya akun silakan Login</a>
				</div>
			</form>
		</div>
	</div>
</body>
</html>