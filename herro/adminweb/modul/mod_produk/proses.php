<?php
include "../../../config/koneksi.php";

$id_kateg =mysql_real_escape_string($_GET['katber']);
$subk = mysql_query("SELECT * FROM subkategori WHERE id_kategori='$id_kateg'");
while($data = mysql_fetch_array($subk)){
    echo "<option value='$data[id_subk]'>$data[sub_k]</option>";
}
?>
