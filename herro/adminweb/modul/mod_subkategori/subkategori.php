<?php
$aksi="modul/mod_subkategori/aksi_kategori.php";
switch($_GET[act]){
  // Tampil Kategori
  default:
    echo "<h2>Sub Kategori</h2>
          <input type=button value='Tambah Sub Kategori' 
          onclick=\"window.location.href='?module=subkategori&act=tambahkategori';\">
          <table>
          <tr><th>no</th><th>nama Sub kategori</th><th>aksi</th></tr>"; 
    $tampil=mysql_query("SELECT * FROM subkategori ORDER BY id_subkategori DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr><td>$no</td>
             <td>$r[nama_subkategori]</td>
             <td><a href=?module=subkategori&act=editkategori&id=$r[id_subkategori]>Edit</a> | 
	               <a href=$aksi?module=subkategori&act=hapus&id=$r[id_subkategori]>Hapus</a>
             </td></tr>";
      $no++;
    }
    echo "</table>";
    break;
  
  // Form Tambah Kategori
  case "tambahkategori":
    echo "<h2>Tambah Sub Kategori</h2>
          <form method=POST action='$aksi?module=subkategori&act=input'>
          <table>
          <tr><td>Nama Sub Kategori</td><td> : <input type=text name='nama_kategori'></td></tr>
		   <tr><td>Pilih Kategori</td>  <td> : 
          <select name='kategori'>
            <option value=0 selected>- Pilih Kategori -</option>";
            $tampil=mysql_query("SELECT * FROM kategori ORDER BY nama_kategori");
            while($r=mysql_fetch_array($tampil)){
              echo "<option value=$r[id_kategori]>$r[nama_kategori]</option>";
            }
    echo "</select></td></tr>
          <tr><td colspan=2><input type=submit name=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
     break;
  
  // Form Edit Kategori  
  case "editkategori":
    $edit=mysql_query("SELECT * FROM subkategori WHERE id_subkategori='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    echo "<h2>Edit Sub Kategori</h2>
          <form method=POST action=$aksi?module=subkategori&act=update>
          <input type=hidden name=id value='$r[id_subkategori]'>
          <table>
          <tr><td>Nama Kategori</td><td> : <input type=text name='nama_kategori' value='$r[nama_subkategori]'></td></tr>
		   <tr><td>Kategori</td>  <td> : 
          <select name='kategori'>
            <option value=0 selected>- Pilih Kategori -</option>";
            $tampil=mysql_query("SELECT * FROM kategori ORDER BY nama_kategori");
            while($r=mysql_fetch_array($tampil)){
              echo "<option value=$r[id_kategori]>$r[nama_kategori]</option>";
            }
    echo "</select></td></tr>
		  
          <tr><td colspan=2><input type=submit value=Update>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    break;  
}
?>
