<!DOCTYPE html>
<html>
<head>
    <title>Form Tambah HMJ</title>
</head>
<body>
    <form action="login.php" method="POST">
        <fieldset>
        <legend>Form Tambah HMJ</legend>
        <p>
            <label>Nama HMJ : </label>
            <input type="text" name="nama_hmj" placeholder="Nama HMJ" />
        </p>
        <p>
            <label>Akronim : </label>
            <input type="text" name="akronim_hmj" placeholder="Akronim" />
        </p>

        <p>
        <label>Tanggal Berdiri : </label>
            <input type="date" name="tgl_berdiri" placeholder="Tanggal Berdiri" />
        </p>

        <p>
        <label>Jurusan : </label>
            <input type="Jurusan" name="jurusan" placeholder="Jurusan" />
        </p>
        <p>
            <input type="submit" name="submit" value="Tambahkan" />
        </p>
        </fieldset>
    </form>
</body>
</html>