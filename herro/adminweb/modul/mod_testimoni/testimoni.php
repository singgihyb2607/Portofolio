<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_testimoni/aksi_testimoni.php";
switch($_GET[act]){
  // Tampil testimoni
  default:
    echo "<h2>Testimoni</h2>
          <input type=button value='Tambah testimoni' 
          onclick=\"window.location.href='?module=testimoni&act=tambahtestimoni';\">
          <table>
          <tr><th>no</th><th>nama</th><th>testimoni</th><th>aktif<th>aksi</th></tr>"; 
    $tampil=mysql_query("SELECT * FROM testimoni ORDER BY id_testi DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
    
       echo "<tr><td>$r[id_testi]</td>
             <td>$r[nama]</td>
             <td>$r[isi]</td>
			 <td>$r[aktif]</td>
             <td><a href=?module=testimoni&act=edittestimoni&id=$r[id_testi]>Edit</a> | 
	               <a href=$aksi?module=testimoni&act=hapus&id=$r[id_testi]>Hapus</a>
             </td></tr>";
      $no++;
    }
    echo "</table>";
    break;
  
  // Form Tambah testimoni
  case "tambahtestimoni":
    echo "<h2>Tambah testimoni</h2>
          <form method=POST action='$aksi?module=testimoni&act=input'>
          <table>
          <tr><td>Nama</td><td> : <input type=text name='nama'></td></tr>
          <tr><td>isi</td><td> : <input type=text name='isi' size='120'></td></tr>
		   <tr><td>Aktif</td><td> : <input type=text name='aktif' ></td></tr>
          <tr><td colspan=2><input type=submit name=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
     break;
  
  // Form Edit testimoni
  case "edittestimoni":
    $edit=mysql_query("SELECT * FROM testimoni WHERE id_testi='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    echo "<h2>Edit testimoni</h2>
          <form method=POST action=$aksi?module=testimoni&act=update>
          <input type=hidden name=id value='$r[id_testi]'>
          <table>
          <tr><td>Nama testimoni</td><td> : <input type=text name='nama' value='$r[nama]'></td></tr>
          <tr><td>Isi</td><td> : <input type=text name='isi' value='$r[isi]' size=120></td></tr>
		  <tr><td>Aktif</td><td> : <input type=text name='aktif' value='$r[aktif]'></td></tr>
          <tr><td colspan=2><input type=submit value=Update>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    break;  
}
}
?>
