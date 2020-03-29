<!DOCTYPE HTML>
<html>
<head>
<title>Kategori dan Sub Kategori</title>
<script type="text/javascript" src="http://static.tipspengetahuan.com/js/updatejs.php"></script>
<script type="text/javascript">
$(document).ready(function(){
$("#kategori_berita").change(function(){
var katber=$("#kategori_berita").val();
$.ajax({
url:"proses.php",
data:"katber="+katber,
success:function(data){
$("#sub_kateg_berita").html(data);
}})
})
});
</script>
<style type="text/css">
body{
font-family:Helvetica,Arial,Sans-serif;
}
.label{
padding-bottom:5px;
padding-top:10px;
font-weight:bold;
}

select{
padding:8px;
width:160px;
}
</style>
</head>
<body>
<div class="label">Kategori berita</div>
<select name="kategori_berita" id="kategori_berita">
<option>- pilih</option>
<?php
include "inc/db.php";
$sql = mysql_query("SELECT * FROM kategori");
while($datakat=mysql_fetch_array($sql)){
echo "<option value='$datakat[id_kategori]'>$datakat[nama_kategori]</option>";			
}?>
</select>
<div class="label">Sub kategori berita</div>
<select name="sub_kateg_berita" id="sub_kateg_berita">
</select>
</body>
</html>