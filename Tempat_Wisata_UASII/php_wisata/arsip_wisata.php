<?php
include "koneksi.php";
?>
<html>
    <head>
        <title>
            Arsip Wisata
        </title>
        <link rel="stylesheet" href="style.css">
        <script language="javascript">
            function tanya() {
                if (confirm("Apakah Anda yakin akan menghapus berita ini?")) {
                    return true;
                } 
                else {
                    return false;
                }
            }
        </script>
    </head>
    <body>
        <a href="index.php">Halaman Depan</a> |
        <a href="arsip_wisata.php">Arsip Wisata</a> |
        <a href="input_wisata.php">Input Wisata</a> 
        <br><br>
        <h2>Arsip Wisata</h2>
        <ol>
            <?php
            $query = "SELECT B.id_wisata, K.nama_kategori,
            B.judul, B.pengirim, B.tanggal, B.headline
            FROM berita B, kategori_wisata K WHERE
            B.id_kategori = K.id_kategori
            ORDER BY B.id_wisata DESC";
                $sql = mysqli_query($conn, $query);
                while ($hasil = mysqli_fetch_array($sql)) {
                    $id_wisata = $hasil['id_wisata'];
                    $kategori = $hasil['nama_kategori'];
                    $judul = $hasil['judul'];
                    $headline = $hasil['headline'];
                    $pengirim = $hasil['pengirim'];
                    $tanggal = $hasil['tanggal'];
                    //
                    //tampilkan arsip berita
                    echo "<li><a href = 'wisata_lengkap.php?id= $id_wisata'>$judul</a><br>";
                    echo "<small>Berita dikirimkan oleh <b>$pengirim</b>pada tanggal <b>$tanggal</b> dalam kategori<b>$kategori</b><br>";
                    echo "<b>Action : </b><a href='edit_berita.php?id=$id_wisata'>Edit</a> | ";
                    echo "<a href='delete_berita.php?id=$id_wisata' onClik='return tanya()'>Delete</a>";
                    echo "</small></li><br><br>"; 
                       
                }
            ?>
        </ol>
    </body>
</html>