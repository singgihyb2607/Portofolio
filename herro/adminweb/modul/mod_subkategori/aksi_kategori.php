<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../../config/koneksi.php";
include "../../../config/fungsi_seo.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus Kategori
if ($module=='subkategori' AND $act=='hapus'){
  mysql_query("DELETE FROM subkategori WHERE id_subkategori='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input kategori
elseif ($module=='subkategori' AND $act=='input'){
  $kategori_seo = seo_title($_POST['nama_kategori']);
  mysql_query("INSERT INTO subkategori(id_kategori,nama_subkategori,kategori_seo) VALUES('$_POST[kategori]','$_POST[nama_kategori]','$kategori_seo')");
  header('location:../../media.php?module='.$module);
}

// Update kategori
elseif ($module=='subkategori' AND $act=='update'){
  $kategori_seo = seo_title($_POST['nama_kategori']);
  mysql_query("UPDATE subkategori SET id_kategori='$_POST[kategori]', nama_subkategori = '$_POST[nama_kategori]', kategori_seo='$kategori_seo' WHERE id_subkategori = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
}
}
?>
