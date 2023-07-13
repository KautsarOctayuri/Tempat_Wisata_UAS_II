<?php
include "koneksi.php";
if (isset($_GET['id'])) 
{
     $id_wisata = $_GET['id'];
}
$query = "SELECT id_wisata, id_kategori, judul, headline, isi, pengirim, tanggal FROM wisata WHERE id_wisata = '$id_wisata'";
$sql = mysqli_query ($conn,$query);
$hasil = mysqli_fetch_array ($sql);
$id_wisata = $hasil['id_wisata'];
$id_kategori = $hasil['id_kategori'];
$judul = $hasil['judul'];
$headline = $hasil['headline'];
$isi = $hasil['isi'];
$pengirim = $hasil['pengirim'];
$tanggal = $hasil['tanggal'];

//proses edit berita
if (isset($_POST['Edit'])) {
    // $id_wisata = $_POST['nama_wisata'];
    $judul = $_POST['judul'];
    $kategori = $_POST ['kategori'];
    $headline = $_POST['headline'];
    $isi_berita = $_POST['isi'];
    $pengirim = $_POST['pengirim'];
    //update berita
    $query = "UPDATE wisata SET id_kategori = '$kategori', judul = '$judul', headline = '$headline', isi = '$isi_berita', pengirim = '$pengirim'WHERE id_berita = '$id_wisata'";
    $sql = mysqli_query ($conn,$query);
    if ($sql) {
         echo "<h2?><font color = blue> Berita telah berhasil diedit </font></h2>";
    } else {
        echo "<h2><font color = red> Berita gagal diedit</font></h2>"; 
    }
}
?>
<html>
  <head>
    <title>Edit Wisata</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <a href="index.php">Halaman Depan</a> |
    <a href="arsip_wisata.php">Arsip Wisata</a> |
    <a href="input_wisata.php">Input Wisata</a>
    <br /><br />
    <form action="" method="POST" name="input">
      <table cellpadding="0" cellspacing="0" border="0" width="700">
        <tr>
          <td colspan="2"><h2>Input Wisata</h2></td>
        </tr>
        <tr>
          <td width="200">Judul Wisata</td>
          <td>
            :
            <input
              type="text"
              name="judul"
              size="30"
              value="<?php echo $judul ?>"
            />
          </td>
        </tr>
        <tr>
          <td>Kategori</td>
          <td>:
            <select name="kategori_wisata">
            <?php
            $query = "SELECT id_kategori, nama_kategori FROM kategori ORDER BY nama_kategori";
            $sql = mysqli_query ($conn,$query);
            while ($hasil = mysqli_fetch_array($sql)) {
                $selected = ($hasil['id_kategori']==$id_kategori) ? "selected" : "";
                echo"<option value='$hasil[id_kategori]'$selected>$hasil[nama_kategori]</option>";
             }
            ?>
            </select>
          </td>
        </tr>
        <tr>
          <td>Headline Wisata</td>
          <td>
            :
            <textarea name="headline" cols="50" rows="4">
            <?=$headline?></textarea
            >
          </td>
        </tr>
        <tr>
          <td>Isi Wisata</td>
          <td>
            : <textarea name="isi" cols="50" rows="10"><?=$isi?></textarea>
          </td>
        </tr>
        <tr>
          <td>Pengirim</td>
          <td>
            :
            <input
              type="text"
              name="pengirim"
              size="20"
              value="<?=$pengirim?>"
            />
          </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>
            &nbsp;&nbsp;
            <input type="hidden" name="hidwisata" value="<?=$id_wisata?>" />
            <input
              type="submit"
              name="Edit"
              value="Edit Wisata"
            />&nbsp; <input type="reset" name="reset" value="Cancel" />
          </td>
        </tr>
      </table>
    </form>
 </body>
</html>