<?php

include "../../koneksi.php";

if (isset($_GET['page'])) {
	if ($_GET['page'] == 'add') {

		$nama = $_POST['nama'];
		$akronim = $_POST['akronim'];
		$ig = $_POST['ig'];
		$namaFile = $_FILES['logo']['name'];

		$ext = array('png', 'jpg', 'jpeg');
		$type = pathinfo($namaFile, PATHINFO_EXTENSION);

		if (!in_array($type, $ext)) {
			echo 1;
		} else {
			$logo = md5(uniqid().$namaFile);
			$query = $sql_obj->query("INSERT INTO orda (nama_orda, akronim_orda, ig_orda, logo_orda) VALUES ('$nama', '$akronim', '$ig', '$logo')");

			if ($query) {
				move_uploaded_file($_FILES['logo']['tmp_name'], "../../assets/img/".$logo);
				echo 2;
			}
		}

		exit;

	} elseif ($_GET['page'] == "delete") {
		
		$id = $_GET["id"];

		$sql = $sql_obj->query("SELECT * FROM orda WHERE id = '$id'")->fetch_assoc();

		if ($sql) {
			unlink('../../assets/img/'.$sql['logo_orda']);
			$query = $sql_obj->query("DELETE FROM orda WHERE id = '$id'");

			if($query){
				echo 2; 
			}else{
				echo 0;
			}
		} else {
			echo 1;
		}

		exit;

	} elseif ($_GET['page'] == "update") {

		$nama = $_POST['nama'];
		$akronim = $_POST['akronim'];
		$id = $_POST['id'];
		$ig = $_POST['ig'];


		$data = $sql_obj->query("SELECT * FROM orda WHERE id = '$id'")->fetch_assoc();

		if (empty($_FILES['logo']['name'])) {
			$query = $sql_obj->query("UPDATE orda SET nama_orda = '$nama', akronim_orda = '$akronim', ig_orda = '$ig' WHERE id = '$id'");
			echo 2;
		} else {
			$namaFile = $_FILES['logo']['name'];
			$ext = array('png', 'jpg', 'jpeg');
			$type = pathinfo($namaFile, PATHINFO_EXTENSION);
			if (!in_array($type, $ext)) {
				echo 1;
			} else {
				$logo = md5(uniqid().$namaFile);
				$query = $sql_obj->query("UPDATE orda SET nama_orda = '$nama', akronim_orda = '$akronim', ig_orda = '$ig', logo_orda = '$logo' WHERE id = '$id'");
				unlink('../../assets/img/'.$data['logo_orda']);
				move_uploaded_file($_FILES['logo']['tmp_name'], "../../assets/img/".$logo);
				echo 2;
			}
		}

		exit;

	}
} else {
	if (isset($_GET['id'])) {
		$sql = $sql_obj->query("SELECT * FROM orda WHERE id = '$_GET[id]'");
	} else {
		$sql = $sql_obj->query("SELECT * FROM orda ORDER BY nama_orda DESC");
	}

	$data = array();
	$no = 1;
	while ($ambil = $sql->fetch_assoc()) {
		$data[] = array(
			'id' => $ambil['id'],
			'nama' => $ambil['nama_orda'],
			'akronim' => $ambil['akronim_orda'],
			'ig' => $ambil['ig_orda'],
			'logo' => $ambil['logo_orda']
		);
	}

	echo json_encode($data);

	exit;
}