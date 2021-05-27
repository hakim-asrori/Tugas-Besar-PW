<?php

include "../../koneksi.php";

if (isset($_GET['page'])) {
	if ($_GET['page'] == 'add') {
		$data = json_decode(file_get_contents("php://input"));

		$nama = $data->nama;
		$akronim = $data->akronim;

		$sql = $sql_obj->query("INSERT INTO orda (nama_orda, akronim_orda) VALUES ('$nama', '$akronim')");

		if($sql){
			echo 1; 
		}else{
			echo 0;
		}

		exit;
	} elseif ($_GET['page'] == "delete") {
		$id = $_GET["id"];
		$sql = $sql_obj->query("DELETE FROM orda WHERE id = '$id'");

		if($sql){
			echo 1; 
		}else{
			echo 0;
		}

		exit;
	} elseif ($_GET['page'] == "update") {
		$data = json_decode(file_get_contents("php://input"));

		$nama = $data->nama;
		$akronim = $data->akronim;

		$id = $data->id;

		$sql = $sql_obj->query("UPDATE orda SET nama_orda = '$nama', akronim_orda = '$akronim' WHERE id = '$id'");

		if($sql){
			echo 1; 
		}else{
			echo 0;
		}

		exit;
	}
} else {
	if (isset($_GET['id'])) {
		$sql = $sql_obj->query("SELECT * FROM orda WHERE id = '$_GET[id]'");
	} else {
		$sql = $sql_obj->query("SELECT * FROM orda");
	}

	$data = array();
	$no = 1;
	while ($ambil = $sql->fetch_assoc()) {
		$data[] = array(
			'id' => $ambil['id'],
			'nama' => $ambil['nama_orda'],
			'akronim' => $ambil['akronim_orda']
		);
	}

	echo json_encode($data);

	exit;
}