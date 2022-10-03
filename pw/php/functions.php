 <?php
function koneksi()
{

    return mysqli_connect("localhost", "root", "", "prakweb_c_203040118_pw");
}

function query($sql)
{
    $conn = koneksi();
    $result = mysqli_query($conn, "$sql");
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function upload()
{
    $nama_file = $_FILES['cover']['name'];
    $tipe_file = $_FILES['cover']['type'];
    $ukuran_file = $_FILES['cover']['size'];
    $error = $_FILES['cover']['error'];
    $tmp_file = $_FILES['cover']['tmp_name'];

    //ketika tidak ada cover
    if ($error == 4) {

        return 'nophoto.png';
    }

    //cek ekstensi file 
    $daftar_cover = ['jpg', 'jpeg', 'png'];
    $ekstensi_file = explode('.', $nama_file);
    $ekstensi_file = strtolower(end($ekstensi_file));
    if (!in_array($ekstensi_file, $daftar_cover)) {
        echo "<script>
     alert('wrong file upload, please try again!');
  </script>";
        return false;
    }

    //cek tipe file
    if ($tipe_file != '../image/jpeg' && $tipe_file != '../image/png') {
        echo "<script>
     alert('wrong file upload, please try again!');
  </script>";
        return false;
    }

    //cek ukuran file
    if ($ukuran_file > 10000000) {
        echo "<script>
     alert('File size too big, please upload another file');
  </script>";
        return false;
    }

    //upload file
    $nama_file_baru = uniqid();
    $nama_file_baru .= '.';
    $nama_file_baru .= $ekstensi_file;
    move_uploaded_file($tmp_file, '../assets/img' . $nama_file_baru);

    return $nama_file_baru;
}



function tambah($buku)
{
    $conn = koneksi();

    $judul = htmlspecialchars($buku['judul']);
    $pengarang = htmlspecialchars($buku['penulis']);
    $penerbit = htmlspecialchars($buku['penerbit']);
    // $pict = htmlspecialchars($buku['pict']);

    //upload
    $cover = upload();
    if (!$cover) {
        return false;
    }

    $query = "INSERT INTO buku
                VALUES
                ('','$judul','$penerbit','$penulis','$cover')";


    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    $conn = koneksi();
    //menghapus cover di folder
    $buku = query("SELECT * FROM buku WHERE id_buku =$id");
    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
    if ($buku['cover'] != 'nophoto.png') {
        unlink('../assets/img/' . $buku['gambar']);
    }


    mysqli_query($conn, "DELETE FROM buku WHERE id_buku =$id");

    return mysqli_affected_rows($conn);
}


function ubah($buku)
{
    $conn = koneksi();

    $id_buku = htmlspecialchars($buku['id_buku']);
    $Judul = htmlspecialchars($buku['judul']);
    $Penerbit = htmlspecialchars($buku['penerbit']);
    $Pengarang = htmlspecialchars($buku['penulis']);
    $cover_lama = htmlspecialchars($buku['gambar']);

    $cover = upload();
    if (!$cover) {
        return false;
    }

    if ($cover == 'nophoto.png') {
        $cover = $cover_lama;
    }

    $query = "UPDATE buku SET
            judul ='$Judul',
            penerbit ='$Penerbit',
            penulis = '$Pengarang',
            gambar = '$cover'
            WHERE id_buku = '$id_buku'
    ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword)
{
    $conn = koneksi();

    $query = "SELECT * FROM buku
            WHERE 
            judul LIKE '%$keyword%' OR
            penulis LIKE '%$keyword%' OR
            penerbit LIKE '%$keyword%' OR
            tahun LIKE '%$keyword%' 
           ";

    $result = mysqli_query($conn, $query);

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}


?>