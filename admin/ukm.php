<?php
include "layout/head.php";
include "layout/side.php";
?>

<h1 style="margin-bottom: 1rem;" id="title">Data UKM</h1>

<label class="modal-open modal-label btn-blue" for="modal-open" id="tambah">Tambah</label>
<input type="radio" name="modal" value="open" id="modal-open" class="modal-radio">

<div class="modal">
    <label class="modal-label overlay">
        <input type="radio" name="modal" value="close" class="modal-radio" />
    </label>
    <div class="content">
        <div class="top">
            <h2>Tambah Data UKM</h2>
            <label class="modal-label close-btn">
                <input type="radio" name="modal" value="close" class="modal-radio" />
            </label>
        </div>
        
        <div id="form">
            <div class="form-group">
                <label for="nama">Nama UKM</label>
                <input type="text" id="nama">
            </div>
            <div class="form-group">
                <label for="akronim">Nama UKM</label>
                <input type="text" id="akronim">
            </div>
        </div>

        <div class="bottom">
            <button class="btn btn-blue" onclick="tambah()">Tambah</button>
        </div>
    </div>
</div>

<div id="form-edit" hidden>
    <h1>Edit Data UKM</h1>
    <div class="form-group">
        <label for="nama">Nama UKM</label>
        <input type="text" id="nama">
        <input type="hidden" id="id">
    </div>
    <div class="form-group">
        <label for="akronim">Nama UKM</label>
        <input type="text" id="akronim">
    </div>
    <div class="form-group">
        <button class="btn btn-green" onclick="update()">Simpan</button>
    </div>
</div>

<table class="table" id="dataTable">
    <thead>
        <tr>
            <th>Nama UKM</th>
            <th>Akronim UKM</th>
            <th>Opsi</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>

<?php include "layout/foot.php"; ?>

<script>
    load();

    function load() {
        let xhttp = new XMLHttpRequest();
        xhttp.open("GET", "dataukm/data.php", true);

        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

                let response = JSON.parse(this.responseText);
                let empTable = document.getElementById("dataTable").getElementsByTagName("tbody")[0];


                empTable.innerHTML = "";

                for (let key in response) {
                    if (response.hasOwnProperty(key)) {
                        let val = response[key];

                        let NewRow = empTable.insertRow(0); 
                        let nama_cell = NewRow.insertCell(0); 
                        let akronim_cell = NewRow.insertCell(1); 
                        let aksi_cell = NewRow.insertCell(2);

                        nama_cell.innerHTML = val['nama']; 
                        akronim_cell.innerHTML = val['akronim']; 
                        aksi_cell.innerHTML = '<button onclick="edit('+ val['id'] +')" class="btn btn-orange">Edit</button> | <button onclick="hapus('+ val['id'] +')" class="btn btn-red">Hapus</button>'; 

                    }
                }


            }
        };

        xhttp.send();

    }

    function tambah() {
        let nama = document.getElementById('nama').value;
        let akronim = document.getElementById('akronim').value;

        if(nama != '' && akronim !=''){

            let data = {nama: nama, akronim: akronim};
            let xhttp = new XMLHttpRequest();
            xhttp.open("POST", "dataukm/data.php?page=add", true);

            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {

                    let response = this.responseText;
                    if(response == 1){
                        alert("Data berhasil ditambah.");

                        load();

                        nama.value = '';
                        akronim.value = '';

                        document.getElementById("modal-open").checked = false;
                    } else {
                        alert("Update gagal.");
                    }
                }
            };

            xhttp.setRequestHeader("Content-Type", "application/json");

            xhttp.send(JSON.stringify(data));
        }
    }

    function edit(id) {

        document.getElementById("form-edit").hidden = false;
        let nama = document.querySelector('#form-edit #nama');
        let akronim = document.querySelector('#form-edit #akronim');

        document.getElementById("tambah").style.display = "none";
        document.getElementById("title").style.display = "none";

        let xhttp = new XMLHttpRequest();
        xhttp.open("GET", "dataukm/data.php?id="+id, true);

        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

                let response = JSON.parse(this.responseText);

                for (let key in response) {
                    if (response.hasOwnProperty(key)) {
                        let val = response[key];

                        nama.value = val['nama']; 
                        akronim.value = val['akronim']; 
                        document.getElementById("id").value = val['id'];

                    }
                } 

            }
        };

        xhttp.send();
    }

    function update() {
        let nama = document.querySelector('#form-edit #nama').value;
        let akronim = document.querySelector('#form-edit #akronim').value;
        let id = document.querySelector('#form-edit #id').value;

        if(nama != '' && akronim !=''){

            let data = {nama: nama, akronim: akronim, id: id};
            let xhttp = new XMLHttpRequest();
            xhttp.open("POST", "dataukm/data.php?page=update", true);

            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {

                    let response = this.responseText;
                    console.log(response);
                    if(response == 1){
                        alert("Update successfully.");

                        load();

                        nama.value = '';
                        akronim.value = '';
                        id.value = '';

                        document.getElementById("form-edit").hidden = true;
                        document.getElementById("tambah").style.display = "";
                        document.getElementById("title").style.display = "";
                    } else {
                        alert("Update gagal.");
                    }

                }
            };

            xhttp.setRequestHeader("Content-Type", "application/json");

            xhttp.send(JSON.stringify(data));
        }
    }

    function hapus(id) {
        let xhttp = new XMLHttpRequest();

        xhttp.open("GET", "dataukm/data.php?page=delete&id="+id, true);

        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

                let response = this.responseText;
                if(response == 1){
                    alert("Data berhasil dihapus.");

                    load();
                } else {
                    alert("Hapus gagal.");
                }

            }
        };

        xhttp.send();
    }
</script>