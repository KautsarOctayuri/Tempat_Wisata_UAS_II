<?php
include "koneksi.php";

if (isset($_GET['id'])) {
    $id_wisata = $_GET['id'];
} else {
    die ("Error. No Id Selected! ");
}
?>
<html>
    <head>
        <title>
            Wisata Lengkap
        </title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <a href="index.php">Halaman Depan</a> |
        <a href="arsip_wisata.php">Arsip Wisata</a> |
        <a href="input_wisata.php">Input Wisata</a> 
        <br><br>
        <h2>Wisata Lengkap</h2>
        <?php
        $query = "SELECT B. id_wisata, K. nama_kategori,B. judul, B.isi, B.pengirim, B.tanggal FROM wisata B, kategori_wisata K WHERE B. id_kategori = K. id_kategori && B. id_wisata = '$id_wisata'";
            $sql = mysqli_query ($conn,$query) ;
            $hasil = mysqli_fetch_array ($sql);
            $id_wisata = $hasil ['id_wisata'];
            $kategori =$hasil['nama_kategori'];
            $judul =$hasil['judul'];
            $isi =$hasil['isi'];
            $pengirim =$hasil['pengirim'];
            $tanggal =$hasil['tanggal'];
            //
            //tampilkan berita
            echo "<font size=5 color=blue>$judul</font><br>";
            echo "<small>Berita dikirim oleh <b>$pengirim</b> pada tanggal <b>$tanggal</b> dalam kategori <b>$kategori</b></small>";
            echo "<p>$isi</p>";
        ?>
    </body>
</html>


