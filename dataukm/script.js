load();

function load() {
    let xhttp = new XMLHttpRequest();
    xhttp.open("GET", "data.php", true);

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
                    aksi_cell.innerHTML = '<button onclick="edit('+ val['id'] +')" id="btn_edit" style="background-color: orange;">Edit</button> | <button onclick="hapus('+ val['id'] +')" style="background-color: red;">Hapus</button>'; 
                    
                }
            }


        }
    };

    xhttp.send();

}

function add() {
    let nama = document.getElementById('nama').value;
    let akronim = document.getElementById('akronim').value;

    if(nama != '' && akronim !=''){

        let data = {nama: nama, akronim: akronim};
        let xhttp = new XMLHttpRequest();
        xhttp.open("POST", "data.php?page=add", true);

        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

                let response = this.responseText;
                if(response == 1){
                    alert("Data berhasil ditambah.");

                    load();

                    document.getElementById('nama').value = '';
                    document.getElementById('akronim').value = '';
                }
            }
        };

    xhttp.setRequestHeader("Content-Type", "application/json");

    xhttp.send(JSON.stringify(data));
    }
}

function edit(id) {
    let nama = document.getElementById('nama');
    let akronim = document.getElementById('akronim');

    let edit = document.getElementById('edit');
    let tambah = document.getElementById('tambah');
    
    tambah.hidden = true;
    edit.hidden = false;

    let xhttp = new XMLHttpRequest();
    xhttp.open("GET", "data.php?id="+id, true);

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

function hapus(id) {
    let xhttp = new XMLHttpRequest();

    xhttp.open("GET", "data.php?page=delete&id="+id, true);

    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            let response = this.responseText;
            if(response == 1){
                alert("Data berhasil dihapus.");

                load();
            }

        }
    };

    xhttp.send();
}

function update() {
    let nama = document.getElementById('nama').value;
    let akronim = document.getElementById('akronim').value;
    let id = document.getElementById("id").value;

    let edit = document.getElementById('edit');
    let tambah = document.getElementById('tambah');
    
    tambah.hidden = false;
    edit.hidden = true;
    
    if(nama != '' && akronim !=''){
        
        let data = {nama: nama, akronim: akronim, id: id};
        let xhttp = new XMLHttpRequest();
        xhttp.open("POST", "data.php?page=update", true);
        
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                
                let response = this.responseText;
                if(response == 1){
                    alert("Update successfully.");
                    
                    load();

                    document.getElementById('nama').value = '';
                    document.getElementById('akronim').value = '';
                    document.getElementById("id").value = '';
                }
                
            }
        };
        
        xhttp.setRequestHeader("Content-Type", "application/json");
        
        xhttp.send(JSON.stringify(data));
    }
}