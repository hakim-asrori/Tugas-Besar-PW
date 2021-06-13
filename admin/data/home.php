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
	} elseif ($_GET['page'] == "lathi") {
		if (isset($_GET['id'])) {
			$sql = $sql_obj->query("SELECT * FROM lathi WHERE id = '$_GET[id]'");
		} else {
			$sql = $sql_obj->query("SELECT * FROM lathi");
		}

		$data = array();

		while ($ambil = $sql->fetch_assoc()) {
			$data[] = array(
				'id' => $ambil['id'],
				'nama' => $ambil['nama'],
				'akronim' => $ambil['akronim'],
				'ig' => $ambil['ig'],
				'logo' => $ambil['logo']
			);
		}

		echo json_encode($data);

		exit;
	} elseif ($_GET['page'] == "lathi-update") {
		$nama = $_POST['nama'];
		$akronim = $_POST['akronim'];
		$id = $_POST['id'];
		$ig = $_POST['ig'];


		$data = $sql_obj->query("SELECT * FROM lathi WHERE id = '$id'")->fetch_assoc();

		if (empty($_FILES['logo']['name'])) {
			$query = $sql_obj->query("UPDATE lathi SET nama = '$nama', akronim = '$akronim', ig = '$ig' WHERE id = '$id'");
			echo 2;
		} else {
			$namaFile = $_FILES['logo']['name'];
			$ext = array('png', 'jpg', 'jpeg');
			$type = pathinfo($namaFile, PATHINFO_EXTENSION);
			if (!in_array($type, $ext)) {
				echo 1;
			} else {
				$logo = md5(uniqid().$namaFile);
				$query = $sql_obj->query("UPDATE lathi SET nama = '$nama', akronim = '$akronim', ig = '$ig', logo = '$logo' WHERE id = '$id'");
				unlink('../../assets/img/'.$data['logo']);
				move_uploaded_file($_FILES['logo']['tmp_name'], "../../assets/img/".$logo);
				echo 2;
			}
		}

		exit;
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