<?php
include "koneksi.php";
if (isset($_GET['id'])){
    $id_wisata = $_GET['id'];
} else {
    die ("Error. No id Selected! ");
}
?>
<html>
  <head>
    <title>Delete Wisata</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <a href="index.php">Halaman Depan</a> |
    <a href="arsip_wisata.php">Arsip Wisata</a> |
    <a href="input_wisata.php">Input Wisata</a>
    <br /><br />
  <?php
    //proses delete berita 
    if (!empty($id_wisata) && $id_wisata != "") { 
        $query = "DELETE FROM wisata WHERE id_wisata='$id_wisata'"; 
        $sql = mysqli_query($conn,$query); 
        if ($sql) { 
            echo "<h2><font color=blue> Wisata telah berhasil dihapus </font></h2>"; 
        } else { 
            echo "<h2><font color=red> WIsata gagal dihapus </font></h2>"; 
        } 
            echo "Klik <a href='arsip_wisata.php'>di sini</a>untuk kembali ke halaman arsip berita"; 
    } else { 
        die ("Access Denied"); 
    }
 ?>
  </body>
</html>
