<?php

include "../koneksi.php";

if (isset($_GET['page'])) {
    if ($_GET['page'] == 'add') {
        $data = json_decode(file_get_contents("php://input"));

        $nama = $data->nama;
        $akronim = $data->akronim;

        $sql = $sql_obj->query("INSERT INTO ukm (nama_ukm, akronim_ukm) VALUES ('$nama', '$akronim')");

        if($sql){
            echo 1; 
        }else{
            echo 0;
        }

        exit;
    } elseif ($_GET['page'] == "delete") {
        $id = $_GET["id"];
        $sql = $sql_obj->query("DELETE FROM ukm WHERE id = '$id'");

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

        $sql = $sql_obj->query("UPDATE ukm SET nama_ukm = '$nama', akronim_ukm = '$akronim' WHERE id = '$id'");

        if($sql){
            echo 1; 
        }else{
            echo 0;
        }

        exit;
    }
} else {
    if (isset($_GET['id'])) {
        $sql = $sql_obj->query("SELECT * FROM ukm WHERE id = '$_GET[id]'");
    } else {
        $sql = $sql_obj->query("SELECT * FROM ukm");
    }

    $data = array();
    $no = 1;
    while ($ambil = $sql->fetch_assoc()) {
        $data[] = array(
            'id' => $ambil['id'],
            'nama' => $ambil['nama_ukm'],
            'akronim' => $ambil['akronim_ukm']
        );
    }

    echo json_encode($data);

    exit;
}