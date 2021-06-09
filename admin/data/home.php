<?php
include "../../koneksi.php";

if (isset($_GET['page'])) {
	if ($_GET['page']=="edit-visi") {
		$query = $sql_obj->query("UPDATE vmt SET visi = '$_POST[visi]' WHERE id = 1");

		if ($query) {
			echo 1;
		} else {
			echo 2;
		}

		exit();
	} elseif ($_GET['page']=="edit-misi") {
		$query = $sql_obj->query("UPDATE vmt SET misi = '$_POST[misi]' WHERE id = 1");

		if ($query) {
			echo 1;
		} else {
			echo 2;
		}

		exit();
	} elseif ($_GET['page']=="edit-tujuan") {
		$query = $sql_obj->query("UPDATE vmt SET tujuan = '$_POST[tujuan]' WHERE id = 1");

		if ($query) {
			echo 1;
		} else {
			echo 2;
		}

		exit();
	} elseif ($_GET['page']=="edit-about") {
		$query = $sql_obj->query("UPDATE vmt SET about = '$_POST[about]' WHERE id = 1");

		if ($query) {
			echo 1;
		} else {
			echo 2;
		}

		exit();
	}
} else {
	$sql = $sql_obj->query("SELECT * FROM vmt");

	$data = array();

	while ($ambil = $sql->fetch_assoc()) {
		$data[] = array(
			'id' => $ambil['id'],
			'visi' => $ambil['visi'],
			'misi' => $ambil['misi'],
			'tujuan' => $ambil['tujuan'],
			'about' => $ambil['about'],
		);
	}

	echo json_encode($data);

	exit;
}
?>