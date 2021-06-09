<?php
session_start();
include "../koneksi.php";
if(!isset($_SESSION['login'])) {
	echo "<script>alert('Login dahulu');</script>";
	echo "<script>window.location.replace('../login.php');</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Informasi Ormawa</title>
	<link rel="stylesheet" href="/assets/fontawesome-free/css/all.css" />
	<link rel="stylesheet" href="/assets/admin/style.css">
	<link rel="icon" href="https://ti.polindra.ac.id/images/ti.polindra.ac.id-09032017120305-LOGO-POLINDRA-WEB.png">
</head>
<body>

	<nav class="navbar">
		<div class="navbar-name">
			<button id="btn-toggle" class="navbar-toggle"><i class="fas fa-fw fa-bars" style="font-size: 1.4em"></i></button>
			<a href="./">Administrator</a>
		</div>
		<div class="navbar-menu">
			<ul>
				<li>
					<a href="/logout.php" class="btn btn-red">Logout</a>
				</li>
			</ul>
		</div>


	</nav>

	<div class="wrapper">