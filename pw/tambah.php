<?php

require 'functions.php';

// cek apakah tombol tambah sudah ditekan
if (isset($_POST['tambah'])) {
  if (tambah($_POST) > 0) {
    echo "<script>
            alert('data berhasil ditambahkan!');
            document.location.href = 'index.php';
         </script>";
  } else {
    echo "data gagal ditambahkan!";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Data Buku</title>
</head>

<body>

  <h3>Form Tambah Data Buku</h3>

  <form action="" method="POST">
    <ul>
      <li>
        <label>
          Judul :
          <input type="text" name="judul" autofocus required>
        </label>
      </li>
      <li>
        <label>
          Penulis :
          <input type="text" name="penulis" required>
        </label>
      </li>
      <li>
        <label>
          Penerbit :
          <input type="text" name="penerbit" required>
        </label>
      </li>
      <li>
        <label>
          Tahun :
          <input type="text" name="tahun" required>
        </label>
      </li>
      <li>
        <label>
          Gambar :
          <input type="text" name="gambar" required>
        </label>
      </li>
      <li>
        <button type="submit" name="tambah">Tambah Data!</button>
      </li>
    </ul>
  </form>

</body>

</html>