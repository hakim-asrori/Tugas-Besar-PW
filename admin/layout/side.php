<?php
$url = explode('/', $_SERVER['REQUEST_URI'])[2];
?>

<ul class="_sidebar" id="_sidebar">
	<li class="<?= ($url == '') ? 'active' : '' ?>">
		<a href="./" title="Home">
			<i class="fas fa-fw fa-home"></i>
			<span>Home</span>
		</a>
	</li>
	<li class="<?= ($url == 'hmj.php') ? 'active' : '' ?>">
		<a href="./hmj.php" title="Data HMJ">
			<i class="fas fa-fw fa-list"></i>
			<span>Data HMJ</span>
		</a>
	</li>
	<li class="<?= ($url == 'ukm.php') ? 'active' : '' ?>">
		<a href="./ukm.php" title="Data UKM">
			<i class="fas fa-fw fa-list"></i>
			<span>Data UKM</span>
		</a>
	</li>
	<li class="<?= ($url == 'orda.php') ? 'active' : '' ?>">
		<a href="./orda.php" title="Data Orda">
			<i class="fas fa-fw fa-list"></i>
			<span>Data Orda</span>
		</a>
	</li>
</ul>

<div class="_content" id="content">
	<div class="container">