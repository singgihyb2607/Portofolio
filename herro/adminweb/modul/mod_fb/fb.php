<?php
$aksi="modul/mod_fb/aksi_fb.php";
switch($_GET[act]){
  // Tampil fb
  default:
    echo "<h2>Modul fb fanpage</h2>
          <input type=button value='Tambah fanpage' 
          onclick=\"window.location.href='?module=fb&act=tambahfb';\">
          <table width='300'>"; 
    $tampil=mysql_query("SELECT * FROM mod_fb ORDER BY id DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr>
    <td bgcolor='#FFFF99'><div align='center'><strong>FRAME</strong></div></td>
    <td rowspan='4' bgcolor='#FFFF99'><div align='center'><strong><br/><br/><br/><br/><a href=?module=fb&act=editfb&id=$r[id]>Edit</a> <br/><br/>atau 
	<br/><br/><a href=$aksi?module=fb&act=hapus&id=$r[id]>Hapus</a></strong></div></td>
  </tr>
  <tr>
    <td>$r[frame]</td>
  </tr>
  
	  ";
      $no++;
    }
    echo "</table>";
	
    break;
  // Form Tambah fanpage
  case "tambahfb":
    echo "<h2>Tambah fanpage</h2>
          <form method=POST action='$aksi?module=fb&act=input'>
          <table>
          <tr><td>iframe</td><td> : <input type=text name='iframe'></td></tr>
          <tr><td colspan=2><input type=submit name=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
     break;  
  // Form Edit gm  
  case "editfb":
    $edit=mysql_query("SELECT * FROM mod_fb WHERE id='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    echo "<h2>Edit fb</h2>
          <form method=POST action=$aksi?module=fb&act=update>
          <input type=hidden name=id value='$r[id]'>
          <table>
          <tr><td>iframe</td><td> : <input type=text name='iframe' value='$r[frame]'></td></tr>
          <tr><td colspan=2><input type=submit value=Update>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    break;  
}
?>
