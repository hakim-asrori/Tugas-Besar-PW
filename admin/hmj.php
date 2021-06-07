<?php
include "layout/head.php";
include "layout/side.php";
?>

<h1 style="margin-bottom: 1rem;" id="title">Data Himpunan Mahasiswa Jurusan</h1>

<label class="modal-open modal-label btn-blue" for="modal-open" id="tambah">Tambah</label>
<input type="radio" name="modal" value="open" id="modal-open" class="modal-radio">

<div class="modal">
    <label class="modal-label overlay">
        <input type="radio" name="modal" value="close" class="modal-radio" />
    </label>
    <div class="content">
        <div class="top">
            <h2>Formulir Data HMJ</h2>
            <label class="modal-label close-btn">
                <input type="radio" name="modal" value="close" class="modal-radio" />
            </label>
        </div>
        
        <div id="form">
            <div class="form-group">
                <label for="nama">Nama HMJ</label>
                <input type="text" id="nama">
            </div>
            <div class="form-group">
                <label for="akronim">Nama HMJ</label>
                <input type="text" id="akronim">
            </div>
            <div class="form-group">
                <label for="logo">Upload Logo</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" id="logo" name="logo">
                        <label for="logo" class="custom-file-label">Pilih File</label>
                    </div>
                </div>
            </div>
            <div class="form-group" id="img">
                <div class="form-group">
                    <img src="" alt="" height="100" width="100">
                </div>
            </div>
            <input type="hidden" id="id">
        </div>

        <div class="bottom">
            <button class="btn btn-blue" id="tambah" onclick="tambah()">Tambah</button>
            <button class="btn btn-green" id="ubah" onclick="update()">Ubah</button>
        </div>
    </div>
</div>

<table class="table" id="dataTable">
    <thead>
        <tr>
            <th>Nama HMJ</th>
            <th>Akronim HMJ</th>
            <th>Logo HMJ</th>
            <th>Opsi</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>

<?php include "layout/foot.php"; ?>

<script>
    let logo = document.getElementById("logo");
    let nama = document.getElementById('nama');
    let akronim = document.getElementById('akronim');
    let idUkm = document.getElementById('id');
    let img = document.querySelector("img");

    let xhttp = new XMLHttpRequest();

    load();

    function load() {
        xhttp.open("GET", "data/hmj.php", true);

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
                        let logo_cell = NewRow.insertCell(2);
                        let aksi_cell = NewRow.insertCell(3);

                        nama_cell.innerHTML = val['nama']; 
                        akronim_cell.innerHTML = val['akronim']; 
                        logo_cell.innerHTML = '<a href="../assets/img/'+ val['logo']+'" target="blank"><img width="100" height="100" src="../assets/img/'+ val['logo']+'"></a>'; 
                        aksi_cell.innerHTML = '<button onclick="edit('+ val['id'] +')" class="btn btn-orange">Edit</button> | <button onclick="hapus('+ val['id'] +')" class="btn btn-red">Hapus</button>'; 

                    }
                }


            }
        };

        xhttp.send();

    }

    function tambah() {

        if (nama.value != '' && akronim.value != '') {
            if (logo.files.length > 0) {
                let formData = new FormData();

                formData.append("logo", logo.files[0]);
                formData.append("nama", nama.value);
                formData.append("akronim", akronim.value);

                xhttp.open("POST", "data/hmj.php?page=add", true);

                xhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        let response = this.responseText;

                        if (response == 1) {
                            alert("Type Gambar yang diperbolehkan .jpg, .png, .jpeg");
                        } else if (response == 2) {
                            clear();
                            document.querySelector(".custom-file-label").innerHTML = 'Pilih File';
                            document.getElementById("modal-open").checked = false;
                            alert("Data Berhasil Di tambah");
                            load();
                        } else {
                            alert("Data Gagal Di Tambah!");
                        }
                    }
                };

                xhttp.send(formData);
            } else {
                alert("Pilih Gambar!");
            }
        } else {
            alert("Nama atau akronim harus di isi!");
        }
    }

    function edit(id) {
        document.querySelector(".bottom #tambah").style.display = 'none';
        document.querySelector(".bottom #ubah").style.display = '';
        document.getElementById("img").style.display = '';
        idUkm.style.display = '';
        document.getElementById("modal-open").checked = true;

        xhttp.open("GET", "data/hmj.php?id="+id, true);

        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

                let response = JSON.parse(this.responseText);

                for (let key in response) {
                    if (response.hasOwnProperty(key)) {
                        let val = response[key];

                        nama.value = val['nama']; 
                        akronim.value = val['akronim']; 
                        img.src = '../assets/img/'+val['logo'];
                        
                        idUkm.value = val['id'];

                    }
                } 

            }
        };

        xhttp.send();
    }

    function update() {

        if(nama.value != '' && akronim.value != '' && id.value != ''){

            let formData = new FormData();

            formData.append("logo", logo.files[0]);
            formData.append("nama", nama.value);
            formData.append("akronim", akronim.value);
            formData.append("id", id.value);

            xhttp.open("POST", "data/hmj.php?page=update", true);

            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    let response = this.responseText;
                    
                    if (response == 1) {
                        alert("Type Gambar yang diperbolehkan .jpg, .png, .jpeg");
                    } else if (response == 2) {
                        clear();
                        idUkm.value = '';
                        document.querySelector(".custom-file-label").innerHTML = 'Pilih File';
                        document.getElementById("modal-open").checked = false;
                        alert("Data Berhasil Di Ubah");
                        load();
                    } else {
                        alert("Data Gagal Di Ubah!");
                    }
                }
            };

            xhttp.send(formData);
        } else {
            alert("Nama atau akronim harus di isi!");
        }
    }

    function hapus(id) {
        xhttp.open("GET", "data/hmj.php?page=delete&id="+id, true);

        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

                let response = this.responseText;
                
                if(response == 2){
                    alert("Data berhasil dihapus.");

                    load();
                } else {
                    alert("Hapus gagal.");
                }

            }
        };

        xhttp.send();
    }

    function clear() {
        logo.value = '';
        nama.value = '';
        akronim.value = '';
    }

    document.querySelector("#tambah").addEventListener("click", function () {
        clear();
        idUkm.style.display = 'none';
        document.getElementById("img").style.display = 'none';
        document.querySelector(".bottom #ubah").style.display = 'none';
        document.querySelector(".bottom #tambah").style.display = '';
    })

    logo.addEventListener('change', function () {
        let fileName = logo.value.split('\\').pop();
        document.querySelector(".custom-file-label").innerHTML = fileName;
    })
</script>