
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Informasi Ormawa</title>
	<link rel="stylesheet" href="/assets/fontawesome-free/css/all.css" />
	<link rel="stylesheet" href="/assets/admin/style.css">
	<style>

	</style>
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
		<ul class="_sidebar" id="_sidebar">
			<li class="">
				<a href="./" title="Home">
					<i class="fas fa-fw fa-home"></i>
					<span>Home</span>
				</a>
			</li>
			<li class="">
				<a id="ukm" class="nav-menu" title="Data UKM">
					<i class="fas fa-fw fa-list"></i>
					<span>Data UKM</span>
				</a>
			</li>
			<li class="">
				<a id="orda" class="nav-menu" title="Data Orda">
					<i class="fas fa-fw fa-list"></i>
					<span>Data Orda</span>
				</a>
			</li>
		</ul>

		<div class="_content" id="content">
			<div class="container">
				<div id="konten"></div>
			</div>

		</div>

	</div>


	<script src="/assets/admin/script.js"></script>
	<script>
		let navMenu = document.getElementsByClassName('nav-menu');

		let xhr = new window.XMLHttpRequest();

		for (let i = 0; i < navMenu.length; i++) {
			navMenu[i].addEventListener("click", function () {
				let menu = navMenu[i].getAttribute("id");

				xhr.open("GET", menu+'.php', true);
				xhr.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						let response = this.responseText;

						document.getElementById('konten').innerHTML = response;
					}
				}

				xhr.send();
			});
		}
	</script>

</body>
</html>