<?php
require 'function.php';

$produk = mysqli_query($koneksi, "SELECT * FROM produk");

if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $nama_produk = trim(mysqli_real_escape_string($koneksi, $_POST['nama_produk']));
    $keterangan = trim(mysqli_real_escape_string($koneksi, $_POST['keterangan']));
    $harga = trim(mysqli_real_escape_string($koneksi, $_POST['harga']));
    $jumlah = trim(mysqli_real_escape_string($koneksi, $_POST['jumlah']));
    $update = mysqli_query($koneksi, "UPDATE produk SET nama_produk = '$nama_produk', keterangan = '$keterangan', harga = '$harga', jumlah = '$jumlah' WHERE id = '$id'");
    if ($update) { ?>
        <script type="text/javascript">
            alert('Data Berhasil Diubah');
            window.location = 'index.php'
        </script>;
    <?php
    } else {
    ?>
        <script type="text/javascript">
            alert('Data Gagal Diubah')
        </script>
<?php
    }
}
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

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card">


                <?php

                $id = @$_GET['id'];
                $sql_produk = mysqli_query($koneksi, "SELECT * FROM produk WHERE id = '$id'") or die(mysqli_error($koneksi));
                $data = mysqli_fetch_array($sql_produk);


                ?>



                <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                    <div class="card-body">
                        <h4 class="card-title">Edit Data Produk</h4>
                        <div class="tabel">
                            <div class="form-group row">
                                <label for="fname" class="col-sm-2 text-start control-label col-form-label">Nama Produk</label>
                                <div class="col-sm-9">
                                    <input type="hidden" name="id" value="<?= $data['id']; ?>">
                                    <input type="text" name="nama_produk" value="<?= $data['nama_produk']; ?>" class="form-control" id="fname" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cono1" class="col-sm-2 text-start control-label col-form-label">Keterangan</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="keterangan" required><?= $data['keterangan']; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-2 text-start control-label col-form-label">Harga</label>
                                <div class="col-sm-9">
                                    <input type="text" name="harga" value="<?= $data['harga']; ?>" class="form-control" id="fname" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-2 text-start control-label col-form-label">Jumlah</label>
                                <div class="col-sm-9">
                                    <input type="text" name="jumlah" value="<?= $data['jumlah']; ?>" class="form-control" id="fname" required>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="border-top">
                        <div class="card-body">
                            <a href="index.php"><button type="button" class="btn btn-warning">Kembali</button></a>
                            <button type="submit" name="edit" class="btn btn-primary">Edit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>