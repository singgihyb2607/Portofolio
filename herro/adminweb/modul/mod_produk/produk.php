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

</head>



<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_produk/aksi_produk.php";
switch($_GET[act]){
  // Tampil Produk
  default:
    echo "<h2>Produk</h2>
          <input type=button value='Tambah Produk' onclick=\"window.location.href='?module=produk&act=tambahproduk';\">
          <table>
          <tr><th>no</th><th>nama produk</th><th>berat(kg)</th><th>harga</th><th>diskon(%)</th><th>stok</th><th>tgl. masuk</th><th>aksi</th></tr>";

    $p      = new Paging;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);

    $tampil = mysql_query("SELECT * FROM produk ORDER BY id_produk DESC LIMIT $posisi,$batas");
  
    $no = $posisi+1;
    while($r=mysql_fetch_array($tampil)){
      $tanggal=tgl_indo($r[tgl_masuk]);
      $harga=format_rupiah($r[harga]);
      echo "<tr><td>$no</td>
                <td>$r[nama_produk]</td>
                <td align=center>$r[berat]</td>
                <td>$harga</td>
                <td align=center>$r[diskon]</td>
                <td align=center>$r[stok]</td>
                <td>$tanggal</td>
		            <td><a href=?module=produk&act=editproduk&id=$r[id_produk]>Edit</a> | 
		                <a href='$aksi?module=produk&act=hapus&id=$r[id_produk]&namafile=$r[gambar]'>Hapus</a></td>
		        </tr>";
      $no++;
    }
    echo "</table>";

    $jmldata = mysql_num_rows(mysql_query("SELECT * FROM produk"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

    echo "<div id=paging>Hal: $linkHalaman</div><br>";
 
    break;
  
  case "tambahproduk":
    echo "<h2>Tambah Produk</h2>
          <form method=POST action='$aksi?module=produk&act=input' enctype='multipart/form-data'>
          <table>
          <tr><td width=100>Nama Produk</td>     <td> : <input type=text name='nama_produk' size=60></td></tr>
		  <tr><td> Sub Kategori</td>  <td> : 
          <select name='kategori'>
            <option value=0 selected>- Pilih Kategori -</option>";
            $tampil=mysql_query("SELECT * FROM subkategori ORDER BY nama_subkategori");
            while($r=mysql_fetch_array($tampil)){
              echo "<option value=$r[id_subkategori]>$r[nama_subkategori]</option>";
            }
    echo "</select></td></tr>
          <tr><td>Berat</td>     <td> : <input type=text name='berat' size=3> KG</td></tr>
          <tr><td>Harga</td>     <td> : <input type=text name='harga' size=10></td></tr>
          <tr><td>Diskon</td>     <td> : <input type=text name='diskon' size=2> %</td></tr>
          <tr><td>Stok</td>     <td> : <input type=text name='stok' size=3></td></tr>
          <tr><td>Deskripsi</td>  <td> <textarea name='deskripsi' style='width: 580px; height: 350px;'></textarea></td></tr>
          <tr><td>Gambar</td>      <td> : <input type=file name='fupload' size=40> 
                                          <br>Tipe gambar harus JPG/JPEG dan ukuran lebar maks: 400 px</td></tr>
          <tr><td colspan=2><input type=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
     break;
    
  case "editproduk":
    $edit = mysql_query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<h2>Edit Produk</h2>
          <form method=POST enctype='multipart/form-data' action=$aksi?module=produk&act=update>
          <input type=hidden name=id value=$r[id_produk]>
          <table>
          <tr><td width=70>Nama Produk</td>     <td> : <input type=text name='nama_produk' size=60 value='$r[nama_produk]'></td></tr>
          <tr><td>Kategori</td>  <td> : <select name='kategori'>";
 
          $tampil=mysql_query("SELECT * FROM subkategori ORDER BY nama_subkategori");
          if ($r[id_kategori]==0){
            echo "<option value=0 selected>- Pilih Kategori -</option>";
          }   

          while($w=mysql_fetch_array($tampil)){
            if ($r[id_kategori]==$w[id_kategori]){
              echo "<option value=$w[id_subkategori] selected>$w[nama_subkategori]</option>";
            }
            else{
              echo "<option value=$w[id_subkategori]>$w[nama_subkategori]</option>";
            }
          }
    echo "</select></td></tr>
          <tr><td>Berat</td>     <td> : <input type=text name='berat' value=$r[berat] size=3></td></tr>
          <tr><td>Harga</td>     <td> : <input type=text name='harga' value=$r[harga] size=10></td></tr>
          <tr><td>Diskon</td>     <td> : <input type=text name='diskon' value=$r[diskon] size=2></td></tr>
          <tr><td>Stok</td>     <td> : <input type=text name='stok' value=$r[stok] size=3></td></tr>
          <tr><td>Deskripsi</td>   <td> <textarea name='deskripsi' style='width: 600px; height: 350px;'>$r[deskripsi]</textarea></td></tr>
          <tr><td>Gambar</td>       <td> :  
          <img src='../foto_produk/small_$r[gambar]'></td></tr>
          <tr><td>Ganti Gbr</td>    <td> : <input type=file name='fupload' size=30> *)</td></tr>
          <tr><td colspan=2>*) Apabila gambar tidak diubah, dikosongkan saja.</td></tr>
          <tr><td colspan=2><input type=submit value=Update>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
         </table></form>";
    break;  
}
}
?>
