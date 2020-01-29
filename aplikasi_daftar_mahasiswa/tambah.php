<?php
session_start();
if(!isset($_SESSION["login"])){
	header("Location: login.php");
	exit;
}

require 'functions.php';

//cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {

    //cek apakah data berhasil ditambahkan atau tidak
    if (tambah($_POST) > 0) {
        echo "
        <script>
        alert('Data Berhasil Ditambahkan');
        document.location.href='index.php';
        </script>
        ";
    } else {
        echo "
         <script>
        alert('Data Gagal Ditambahkan');
        document.location.href='index.php';
        </script>
         ";
    }
}


?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/all.css">

    <title>Tambah Data Mahasiswa</title>
</head>

<body>
    <div class="container">
        <h1>Form Tambah Data</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group row">
                <label for="nrp" class="col-sm-2 col-form-label">NRP :</label>
                <div class="col-sm-10">
                    <input type="text" name="nrp" class="form-control" id="nrp" placeholder="Masukkan NRP" required>
                </div>
                <label for="nama" class="col-sm-2 col-form-label">Nama :</label>
                <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan Nama" required>
                </div>
                <label for="email" class="col-sm-2 col-form-label">Email :</label>
                <div class="col-sm-10">
                    <input type="text" name="email" class="form-control" id="email" placeholder="Masukkan Email" required>
                </div>
                <label for="jurusan" class="col-sm-2 col-form-label">Jurusan :</label>
                <div class="col-sm-10">
                    <input type="text" name="jurusan" class="form-control" id="jurusan" placeholder="Masukkan Jurusan" required>
                </div>
                <label for="gambar" class="col-sm-2 col-form-label">Gambar :</label>
                <div class="col-sm-10">
                    <!-- <input type="file" name="gambar" class="form-control" id="gambar" placeholder="Masukkan Gambar" required> -->
                    <div class="form-group">
                        <input type="file" name="gambar" class="form-control-file" id="gambar" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mx-auto mt-5" name="submit">Tambah</button>
            </div>
        </form>
        <a type="submit" class="btn btn-primary" href="index.php">Halaman Utama</a>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/all.js"></script>
</body>

</html>