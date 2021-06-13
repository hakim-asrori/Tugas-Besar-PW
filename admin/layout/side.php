<?php
$url = explode('/', $_SERVER['REQUEST_URI'])[2];
?>

<ul class="_sidebar" id="_sidebar">
	<li title="Home" class="<?= ($url == '') ? 'active' : '' ?>">
		<a href="./" >
			<i class="fas fa-fw fa-home"></i>
			<span>Home</span>
		</a>
	</li>
	<li title="Data Lathi" class="<?= ($url == 'lathi.php') ? 'active' : '' ?>">
		<a href="./lathi.php">
			<i class="fas fa-fw fa-list-ol"></i>
			<span>Data Lathi</span>
		</a>
	</li>
	<li title="Data HMJ" class="<?= ($url == 'hmj.php') ? 'active' : '' ?>">
		<a href="./hmj.php">
			<i class="fas fa-fw fa-list"></i>
			<span>Data HMJ</span>
		</a>
	</li>
	<li title="Data UKM" class="<?= ($url == 'ukm.php') ? 'active' : '' ?>">
		<a href="./ukm.php">
			<i class="fas fa-fw fa-list"></i>
			<span>Data UKM</span>
		</a>
	</li>
	<li title="Data Orda" class="<?= ($url == 'orda.php') ? 'active' : '' ?>">
		<a href="./orda.php">
			<i class="fas fa-fw fa-list-ol"></i>
			<span>Data Orda</span>
		</a>
	</li>
</ul>

<div class="_content" id="content">
	<div class="container">