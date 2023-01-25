<?php
require 'function.php';

$produk = mysqli_query($koneksi, "SELECT * FROM produk");

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>pijarcamp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <h1>Data Produk</h1>
    <br>
    <a href="tambah.php">Tambah Data Produk</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Harga</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php $i = 1 ?>
                <?php foreach ($produk as $row) { ?>
                    <td><?= $i ?></td>
                    <td><?= $row['nama_produk']; ?></td>
                    <td><?= $row['keterangan']; ?></td>
                    <td><?= $row['harga']; ?></td>
                    <td><?= $row['jumlah']; ?></td>
                    <td>
                        <a href="edit.php?id=<?= $row['id']; ?>">Edit</a>
                        <a href="hapus.php?id=<?= $row['id']; ?>">Hapus</a>
                    </td>
            </tr>
            <?php $i++ ?>
        <?php } ?>
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>