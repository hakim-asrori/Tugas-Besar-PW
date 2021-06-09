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
			$query = $sql_obj->query("INSERT INTO hmj (nama_hmj, akronim_hmj, ig_hmj, logo_hmj) VALUES ('$nama', '$akronim', '$ig', '$logo')");

			if ($query) {
				move_uploaded_file($_FILES['logo']['tmp_name'], "../../assets/img/".$logo);
				echo 2;
			}
		}

		exit;

	} elseif ($_GET['page'] == "delete") {
		
		$id = $_GET["id"];

		$sql = $sql_obj->query("SELECT * FROM hmj WHERE id = '$id'")->fetch_assoc();

		if ($sql) {
			$query = $sql_obj->query("DELETE FROM hmj WHERE id = '$id'");
			unlink('../../assets/img/'.$sql['logo_hmj']);
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


		$data = $sql_obj->query("SELECT * FROM hmj WHERE id = '$id'")->fetch_assoc();

		if (empty($_FILES['logo']['name'])) {
			$query = $sql_obj->query("UPDATE hmj SET nama_hmj = '$nama', akronim_hmj = '$akronim', ig_hmj = '$ig' WHERE id = '$id'");
			echo 2;
		} else {
			$namaFile = $_FILES['logo']['name'];
			$ext = array('png', 'jpg', 'jpeg');
			$type = pathinfo($namaFile, PATHINFO_EXTENSION);
			if (!in_array($type, $ext)) {
				echo 1;
			} else {
				$logo = md5(uniqid().$namaFile);
				$query = $sql_obj->query("UPDATE hmj SET nama_hmj = '$nama', akronim_hmj = '$akronim', ig_hmj = '$ig', logo_hmj = '$logo' WHERE id = '$id'");
				unlink('../../assets/img/'.$data['logo_hmj']);
				move_uploaded_file($_FILES['logo']['tmp_name'], "../../assets/img/".$logo);
				echo 2;
			}
		}

		exit;

	}
} else {
	if (isset($_GET['id'])) {
		$sql = $sql_obj->query("SELECT * FROM hmj WHERE id = '$_GET[id]'");
	} else {
		$sql = $sql_obj->query("SELECT * FROM hmj ORDER BY nama_hmj DESC");
	}

	$data = array();
	$no = 1;
	while ($ambil = $sql->fetch_assoc()) {
		$data[] = array(
			'id' => $ambil['id'],
			'nama' => $ambil['nama_hmj'],
			'akronim' => $ambil['akronim_hmj'],
			'ig' => $ambil['ig_hmj'],
			'logo' => $ambil['logo_hmj']
		);
	}

	echo json_encode($data);

	exit;
}