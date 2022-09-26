<?php

require 'functions.php';

// ambil id dari URL
$id = $_GET['id'];

// query buku berdasarkan id
$m = query("SELECT * FROM buku WHERE id = $id");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Buku</title>
</head>

<body>

  <h3>Detail Buku</h3>
  <ul>
    <li><img src="img/<?= $m['gambar']; ?>"></li>
    <li>NRP : <?= $m['judul']; ?></li>
    <li>Nama : <?= $m['penulis']; ?></li>
    <li>Email : <?= $m['penerbit']; ?></li>
    <li>Jurusan : <?= $m['tahun']; ?></li>
    <li><a href="ubah.php?id=<?= $m['id']; ?>">Ubah</a> | <a href="hapus.php?id=<?= $m['id']; ?>" onclick="return confirm('apakah anda yakin?');">Hapus</a></li>
    <li><a href="index.php">Kembali ke daftar Buku</a></li>
  </ul>

</body>

</html>