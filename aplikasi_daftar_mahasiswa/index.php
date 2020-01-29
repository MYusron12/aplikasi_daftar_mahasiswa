<?php
session_start();
if(!isset($_SESSION["login"])){
	header("Location: login.php");
	exit;
}

require 'functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");

//tombol cari ditekan
if (isset($_POST["cari"])) {
    $mahasiswa = cari($_POST["keyword"]);
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
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/all.css">

    <title>Halaman Daftar Mahasiswa</title>
	<style>
	.loader{
		width: 100px;
		display: none;
	}
	
	@media print {
		.logout, .tambah, .form-cari, .aksi {
			display: none;
		}
	}
	</style>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link" href="#"><strong>Home</strong></a>
                    <a class="nav-item nav-link" href="#"><strong>Features</strong></a>
                    <a class="nav-item nav-link" href="#"><strong>Pricing</strong></a>
                </div>
            </div>
			<a class="btn btn-primary my-2 my-sm-0 my-lg-0 logout" href="logout.php">Logout</a>
        </div>
    </nav>
    <!-- akhir navbar -->

    <!-- table bootstrap -->
    <div class="container">
        <h1>Daftar Mahasiswa</h1>
        <a class="btn btn-primary tambah" href="tambah.php" role="button">Tambah Data Mahasiswa</a>
		<a class="btn btn-primary tambah" href="cetak.php" role="button" target="_blank">Cetak</a>
        <form class="form-inline mt-1 form-cari" action="" method="post">
            <input class="form-control mr-sm-2" id="keyword" type="text" placeholder="Cari Data ..." aria-label="Search" autofocus name="keyword" autocomplete="off">
            <button class="btn btn-outline-primary my-2 my-sm-0" id="tombol-cari" type="submit" name="cari">Cari</button>
        <img src="img/loader.gif" class="loader">
		</form>
		<div class="container" id="container">
        <table class="table table-striped table-light">
            <thead>
                <tr>
                    <th scope="col">No .</th>
                    <th scope="col">NRP</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Jurusan</th>
                    <th scope="col">Gambar</th>
                    <th scope="col" class="aksi">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($mahasiswa as $row) : ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $row["nrp"]; ?></td>
                        <td><?= $row["nama"]; ?></td>
                        <td><?= $row["email"]; ?></td>
                        <td><?= $row["jurusan"]; ?></td>
                        <td><img src="img/<?= $row["gambar"]; ?>" alt=""></td>
                        <td class="aksi">
                            <a class="btn btn-primary" href="ubah.php?id=<?= $row["id"]; ?>" role="button">Ubah</a> |
                            <a class="btn btn-primary" href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Yakin Mau Dihapus?');" role="button">Hapus</a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
		</div>
    </div>
    <!-- end tables bootstrap -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/script.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/all.js"></script>
</body>

</html>