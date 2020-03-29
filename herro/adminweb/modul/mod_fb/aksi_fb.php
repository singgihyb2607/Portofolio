<?php
session_start();
include "../../../config/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];
$id=$_POST[id];

// Hapus fb
if ($module=='fb' AND $act=='hapus'){
  mysql_query("DELETE FROM mod_fb WHERE id='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input fanpage
elseif ($module=='fb' AND $act=='input'){
  mysql_query("INSERT INTO mod_fb(frame) VALUES('$_POST[iframe]')");
  header('location:../../media.php?module='.$module);
}

// Update fb
elseif ($module=='fb' AND $act=='update'){
  mysql_query("UPDATE mod_fb SET frame='$_POST[iframe]' WHERE id = '$id'");
  header('location:../../media.php?module='.$module);
}
?>