<?php

include "../../koneksi.php";

if (isset($_GET['page'])) {
	if ($_GET['page'] == 'add') {

		$nama = $_POST['nama'];
		$akronim = $_POST['akronim'];
		$namaFile = $_FILES['logo']['name'];

		$ext = array('png', 'jpg', 'jpeg');
		$type = pathinfo($namaFile, PATHINFO_EXTENSION);

		if (!in_array($type, $ext)) {
			echo 1;
		} else {
			$logo = md5(uniqid().$namaFile);
			$query = $sql_obj->query("INSERT INTO ukm (nama_ukm, akronim_ukm, logo_ukm) VALUES ('$nama', '$akronim', '$logo')");

			if ($query) {
				move_uploaded_file($_FILES['logo']['tmp_name'], "../../assets/img/".$logo);
				echo 2;
			}
		}

		exit;

	} elseif ($_GET['page'] == "delete") {
		
		$id = $_GET["id"];

		$sql = $sql_obj->query("SELECT * FROM ukm WHERE id = '$id'")->fetch_assoc();

		if (unlink('../../assets/img/'.$sql['logo_ukm'])) {
			$query = $sql_obj->query("DELETE FROM ukm WHERE id = '$id'");

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


		$data = $sql_obj->query("SELECT * FROM ukm WHERE id = '$id'")->fetch_assoc();

		if (empty($_FILES['logo']['name'])) {
			$query = $sql_obj->query("UPDATE ukm SET nama_ukm = '$nama', akronim_ukm = '$akronim' WHERE id = '$id'");
			echo 2;
		} else {
			$namaFile = $_FILES['logo']['name'];
			$ext = array('png', 'jpg', 'jpeg');
			$type = pathinfo($namaFile, PATHINFO_EXTENSION);
			if (!in_array($type, $ext)) {
				echo 1;
			} else {
				$logo = md5(uniqid().$namaFile);
				$query = $sql_obj->query("UPDATE ukm SET nama_ukm = '$nama', akronim_ukm = '$akronim', logo_ukm = '$logo' WHERE id = '$id'");
				unlink('../../assets/img/'.$data['logo_ukm']);
				move_uploaded_file($_FILES['logo']['tmp_name'], "../../assets/img/".$logo);
				echo 2;
			}
		}

		exit;

	}
} else {
	if (isset($_GET['id'])) {
		$sql = $sql_obj->query("SELECT * FROM ukm WHERE id = '$_GET[id]'");
	} else {
		$sql = $sql_obj->query("SELECT * FROM ukm ORDER BY nama_ukm DESC");
	}

	$data = array();
	$no = 1;
	while ($ambil = $sql->fetch_assoc()) {
		$data[] = array(
			'id' => $ambil['id'],
			'nama' => $ambil['nama_ukm'],
			'akronim' => $ambil['akronim_ukm'],
			'logo' => $ambil['logo_ukm']
		);
	}

	echo json_encode($data);

	exit;
}