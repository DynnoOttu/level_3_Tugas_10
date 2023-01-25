<?php require 'function.php';

mysqli_query($koneksi, "DELETE FROM produk WHERE id = '$_GET[id]'") or die(mysqli_error($koneksi));
echo "<script>window.location='index.php'</script>";
