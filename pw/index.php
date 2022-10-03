<?php
//koneksi
require './php/functions.php';

//isi tabel
$buku = query('SELECT * FROM buku');

//ketika tombol cari di klik
if (isset($_POST['cari'])) {
  $buku = cari($_POST['keyword']);
}
?>

<!DOCTYPE html>
<html>

<head>
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- CSS -->
  <link rel="stylesheet" href="css/style.css">
  <title>Buku Best Seller!</title>
</head>

<body>

  <div class="container">

    <h2 class="center">Daftar Buku Best Seller</h2>
    <form action="" method="POST">
      <input type="text" name="keyword" size="30" placeholder="Masukkan Keywoard Pencarian.." autocomplete="off" autofocus>
      <button type="submit" name="cari" class="btn grey darken-1">Cari!</button>
    </form>
    <br>

    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Cover</th>
          <th>Judul</th>
          <th>Penulis</th>
          <th>Penerbit</th>
          <th>Tanggal Rilis</th>
          <th class="center">Opsi</th>
        </tr>
      </thead>
      <?php foreach ($buku as $book) : ?>
        <tbody>
          <tr>
            <td><?= $book["id_buku"]  ?></td>
            <td> <img src="assets/img/<?= $book["gambar"] ?>" alt="" width="100px"></td>
            <td><?= $book["judul"]  ?></td>
            <td><?= $book["penulis"]  ?></td>
            <td><?= $book["penerbit"]  ?></td>
            <td><?= $book["tahun"]  ?></td>
            <td>
              <a href="php/ubah.php?id=<?= $book['id_buku'] ?>" class="waves-effect waves-light btn green lighten-1 center"><i class="material-icons left">create</i>Ubah</a>
              <a href="php/hapus.php?id=<?= $book['id_buku'] ?>" onclick="return confirm('Delete the data?')" class="waves-effect waves-light btn red darker-2"><i class="material-icons left">delete</i>Hapus</a>


            </td>
          </tr>

        </tbody>
      <?php endforeach; ?>
    </table>
    
    <br>
    <div class="button center">
      <a href="php/tambah.php" class="waves-effect waves-light btn pink lighten-3 "><i class="material-icons left">add</i>Tambah Buku</a>
    </div>
    <br>

  </div>



  <!--JavaScript at end of body for optimized loading-->
  <script type="text/javascript" src="js/materialize.min.js"></script>
</body>

</html>