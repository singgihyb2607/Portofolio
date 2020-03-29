<?php
session_start();
include "../../../config/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];
$id=$_POST[id];

// Hapus gm
if ($module=='gm' AND $act=='hapus'){
  mysql_query("DELETE FROM mod_gm WHERE id='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input gm
elseif ($module=='gm' AND $act=='input'){
  mysql_query("INSERT INTO mod_gm(iframe,detail) VALUES('$_POST[iframe]','$_POST[detail]')");
  header('location:../../media.php?module='.$module);
}

// Update gm
elseif ($module=='gm' AND $act=='update'){
  mysql_query("UPDATE mod_gm SET iframe='$_POST[iframe]',detail='$_POST[detail]' WHERE id = '$id'");
  header('location:../../media.php?module='.$module);
}
?>
