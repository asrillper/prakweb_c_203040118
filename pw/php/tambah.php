<?php

require './functions.php';

if (isset($_POST['tambah'])) {
    if (tambah($_POST) > 0) {
        echo "<script>
            alert('Data Upload Success');
            document.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
                alert('Data Upload Fail');
                document.location.href = 'tambah.php';
            </script>";
    }
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
</head>

<body>



    <h3 class="center">Tambah data</h3>

    <div class="container">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="input-field">
                <input type="text" name="Judul" id="Judul" class="validate" required>
                <label for="nama">Judul</label>
            </div>
            <div class="input-field">
                <input type="text" name="Pengarang" id="Pengarang" class="validate" required>
                <label for="harga">Penulis</label>
            </div>
            <div class="input-field">
                <input type="text" name="Penerbit" id="Penerbit" class="validate" required>
                <label for="stock">Penerbit</label>
            </div>
            <div class="file-field input-field">
                <div class="btn">
                    <span>Choose Picture</span>
                    <br>
                    <input type="file" name="Gambar" id="Gambar" class="gambar" onchange="previewImage()">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" name="Gambar" id="Gambar" onchange="previewImage()">
                </div>
                <img src="img/nophoto.png" style="display: block;" width="120px" class="img-preview">
            </div>
            <button type="submit" name="tambah" class="waves-effect waves-light btn blue lighten-3">Submit Data</button>
            <a href="index.php" class="waves-effect waves-light btn blue lighten-3"><i class="material-icons left">arrow_back</i>Back</a>


        </form>



    </div>

    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>

</html>