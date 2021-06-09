<?php
include "layout/head.php";
include "layout/side.php";
?>

<style>
	.info-polindra {
		color: black;
		display: flex;
	}

	.info-polindra .box {
		/* margin-right: 10px; */
	}

    .info-polindra .visi, .info-polindra .misi {
        margin-right: 10px;
    }

	.info-polindra > div {
		width: 100%;
	}

	textarea {
		height: 10rem;
		margin-right: 0;
		margin-bottom: 1rem;
	}

	textarea:disabled {
		background-color: #eaecf4;
	}

	@media screen and (max-width: 584px) {
		.info-polindra {
			flex-direction: column;
		}

		.info-polindra .box {
			margin-bottom: 1rem;
			margin-left: 0;
		}
	}
</style>

<h1 style="margin-bottom: 1rem;">Info Polindra</h1>
<div class="box" style="margin-bottom: 1rem;">
    <h2 class="box-header">Tentang Polindra</h2>
    <div class="box-body">
        <textarea id="about" disabled></textarea>
        <button class="btn btn-orange" id="editAbout">Edit</button>
		<button class="btn btn-green" id="simpanAbout" onclick="editAbout()" style="display: none">Simpan</button>
    </div>
</div>
<div class="info-polindra">
	<div class="visi">
		<div class="box">
			<h2 class="box-header">Visi Polindra</h2>
			<div class="box-body">
				<textarea id="visi" disabled></textarea>
				<button class="btn btn-orange" id="editVisi">Edit</button>
				<button class="btn btn-green" id="simpanVisi" onclick="editVisi()" style="display: none">Simpan</button>
			</div>
		</div>
	</div>
	<div class="misi">
		<div class="box">
			<h2 class="box-header">Misi Polindra</h2>
			<div class="box-body">
				<textarea id="misi" disabled></textarea>
				<button class="btn btn-orange" id="editMisi">Edit</button>
				<button class="btn btn-green" id="simpanMisi" onclick="editMisi()" style="display: none">Simpan</button>
			</div>
		</div>
	</div>
	<div class="tujuan">
		<div class="box">
			<h2 class="box-header">Tujuan Polindra</h2>
			<div class="box-body">
				<textarea id="tujuan" disabled></textarea>
				<button class="btn btn-orange" id="editTujuan">Edit</button>
				<button class="btn btn-green" id="simpanTujuan" onclick="editTujuan()" style="display: none">Simpan</button>
			</div>
		</div>
	</div>
</div>

<?php include "layout/foot.php"; ?>

<script>
	visi = document.getElementById('visi');
	misi = document.getElementById('misi');
	tujuan = document.getElementById('tujuan');

	btnVisi = document.getElementById('editVisi');
	btnMisi = document.getElementById('editMisi');
	btnTujuan = document.getElementById('editTujuan');

	let xhttp = new XMLHttpRequest();
	let formData = new FormData();
	loadVMT();

	btnVisi.addEventListener("click", function () {
		btnVisi.style.display = "none";
		visi.disabled = false;
		document.getElementById('simpanVisi').style.display = '';
	});

	btnMisi.addEventListener("click", function () {
		btnMisi.style.display = "none";
		misi.disabled = false;
		document.getElementById('simpanMisi').style.display = '';
	});

	btnTujuan.addEventListener("click", function () {
		btnTujuan.style.display = "none";
		tujuan.disabled = false;
		document.getElementById('simpanTujuan').style.display = '';
	});

	function loadVMT() {
		xhttp.open("GET", "data/home.php", true);
		xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
		xhttp.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				let response = JSON.parse(this.responseText);

				for (let key in response) {
					if (response.hasOwnProperty(key)) {
						let val = response[key];

						visi.value = val['visi']; 
						misi.value = val['misi']; 
						tujuan.value = val['tujuan'];

					}
				}
			}
		}

		xhttp.send();
	}

	function editVisi() {
		if(visi.value != ''){
			formData.append("visi", visi.value);

			xhttp.open("POST", "data/home.php?page=edit-visi", true);

			xhttp.onreadystatechange = function () {
				if (this.readyState == 4 && this.status == 200) {
					let response = this.responseText;

					if (response == 1) {
						alert("Visi berhasil di ubah");
						btnVisi.style.display = "";
						visi.disabled = true;
						document.getElementById('simpanVisi').style.display = 'none';

                        loadVMT();
					} else {
						alert("Visi gagal di ubah");
					}

				}
			}

			xhttp.send(formData);
		}
	};

	function editMisi() {
		if(misi.value != ''){
			formData.append("misi", misi.value);

			xhttp.open("POST", "data/home.php?page=edit-misi", true);

			xhttp.onreadystatechange = function () {
				if (this.readyState == 4 && this.status == 200) {
					let response = this.responseText;

					if (response == 1) {
						alert("Misi berhasil di ubah");
						btnMisi.style.display = "";
						misi.disabled = true;
						document.getElementById('simpanMisi').style.display = 'none';

                        loadVMT();
					} else {
						alert("Misi gagal di ubah");
					}

				}
			}

			xhttp.send(formData);
		}
	};

	function editTujuan() {
		if(tujuan.value != ''){
			formData.append("tujuan", tujuan.value);

			xhttp.open("POST", "data/home.php?page=edit-tujuan", true);

			xhttp.onreadystatechange = function () {
				if (this.readyState == 4 && this.status == 200) {
					let response = this.responseText;

					if (response == 1) {
						alert("Tujuan berhasil di ubah");
						btnTujuan.style.display = "";
						tujuan.disabled = true;
						document.getElementById('simpanTujuan').style.display = 'none';

                        loadVMT();
					} else {
						alert("Tujuan gagal di ubah");
					}

				}
			}

			xhttp.send(formData);
		}
	};
</script>
