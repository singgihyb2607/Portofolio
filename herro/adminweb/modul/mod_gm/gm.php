<?php
$aksi="modul/mod_gm/aksi_gm.php";
switch($_GET[act]){
  // Tampil gm
  default:
    echo "<h2>Modul Lokasi </h2>
          <input type=button value='Tambah gm' 
          onclick=\"window.location.href='?module=gm&act=tambahgm';\">
          <table width='300'>"; 
    $tampil=mysql_query("SELECT * FROM mod_gm ORDER BY id DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr>
    <td bgcolor='#FFFF99'><div align='center'><strong>IFRAME</strong></div></td>
    <td rowspan='4' bgcolor='#FFFF99'><div align='center'><strong><br/><br/><br/><br/><a href=?module=gm&act=editgm&id=$r[id]>Edit</a> <br/><br/>atau 
	<br/><br/><a href=$aksi?module=gm&act=hapus&id=$r[id]>Hapus</a></strong></div></td>
  </tr>
  <tr>
    <td>$r[iframe]</td>
  </tr>
  <tr>
    <td bgcolor='#FFFF99'><div align='center'><strong>DETAIL</strong></div></td>
  </tr>
  <tr>
    <td>$r[detail]</td>
  </tr>
	  ";
      $no++;
    }
    echo "</table>";
	
    break;
  // Form Tambah gm
  case "tambahgm":
    echo "<h2>Tambah gm</h2>
          <form method=POST action='$aksi?module=gm&act=input'>
          <table>
          <tr><td>iframe</td><td> : <input type=text name='iframe'></td></tr>
		  <tr><td>detail</td><td> : <input type=text name='detail'></td></tr>
          <tr><td colspan=2><input type=submit name=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
     break;  
  // Form Edit gm  
  case "editgm":
    $edit=mysql_query("SELECT * FROM mod_gm WHERE id='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    echo "<h2>Edit gm</h2>
          <form method=POST action=$aksi?module=gm&act=update>
          <input type=hidden name=id value='$r[id]'>
          <table>
          <tr><td>iframe</td><td> : <input type=text name='iframe' value='$r[iframe]'></td></tr>
		  <tr><td>detail</td><td> : <input type=text name='detail' value='$r[detail]'></td></tr>
          <tr><td colspan=2><input type=submit value=Update>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    break;  
}
?>
