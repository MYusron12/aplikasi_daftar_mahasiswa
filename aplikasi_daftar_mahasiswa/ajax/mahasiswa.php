<?php
usleep(5000);
require'../functions.php';

$keyword = $_GET["keyword"];

$query = "SELECT * FROM mahasiswa 
    WHERE 
    nrp LIKE '%$keyword%' OR
    nama LIKE '%$keyword%' OR
    email LIKE '%$keyword%' OR
    jurusan LIKE '%$keyword%'
    ";
$mahasiswa = query($query);

?>
<table class="table table-striped table-light">
            <thead>
                <tr>
                    <th scope="col">No .</th>
                    <th scope="col">NRP</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Jurusan</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Aksi</th>
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
                        <td>
                            <a class="btn btn-primary" href="ubah.php?id=<?= $row["id"]; ?>" role="button">Ubah</a> |
                            <a class="btn btn-primary" href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Yakin Mau Dihapus?');" role="button">Hapus</a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>