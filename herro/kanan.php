	   <div class="shopping_cart">
        <div class="cart_title">Keranjang belanja</div>
        <div class="cart_details">
           <?php require_once "item.php";?>
        </div>    
        <div class="cart_icon"><img src="images/shoppingcart.png" alt="" title="" width="48" border="0" height="48">
        </div>        
      </div>	

      <div class="title_box">Customer Service</div>  
      <div class="border_box">

      <?php 
      //ym
      $ym=mysql_query("select * from mod_ym order by id desc");
      while($t=mysql_fetch_array($ym)){
        echo "<br /><p>&bull; $t[nama] </br>
              <a href='ymsgr:sendIM?$t[username]'>
              <img src='http://opi.yahoo.com/online?u=$t[username]&amp;m=g&amp;t=2' border='0' height='16' width='64'></a>
              </p><br />";
      }
	  $kontak=mysql_query("select * from modul where id_modul='43' order by id_modul ASC");
	  while($k=mysql_fetch_array($kontak)){
	  echo"<p><span class='bank'>No Tlp: $k[nomor_hp]</span></br>
			<div class='bank'>Email: $k[email_pengelola]</div></br> 
	        <div class='bank'>Pin BB: $k[pin_bb]</div></br> 
	  </p>";
	  }         
      ?>
      </div>  	 
	 
	 
<!--bank pembayaran-->
    <div class="title_box">Bank Pembayaran</div>  
      <div class="border_box">
       <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><div align="center">
                      <?php
      $bank=mysql_query("SELECT * FROM mod_bank ORDER BY id_bank ASC");
      while($b=mysql_fetch_array($bank)){
		    echo "<span class='bank'>$a[nama_bank]</a></div>
         <div class='bank'>
             <img src='foto_banner/$b[gambar]' border='0' >
             </a>
         </div>
         <div class='bank'><span class='bank'>No. Rek : $b[no_rekening]
<div class='bank'><span class='bank'>an. $b[pemilik]</span></div></br>";
      }

        ?>
                    </span></td>
                  </tr>
                </table>
      </div>  	 
<!--testimonial-->
  <div class="title_box">Testimoni</div>  
      <div class="border_box">
       <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td>  
					
          <MARQUEE onmouseover=this.stop() style="CURSOR:default" 
                       onmouseout=this.start() scrollAmount=1 direction=up loop=true height=180>
      <?php
              $hubungi=mysql_query("SELECT * FROM testimoni where aktif='Y' ORDER BY id_testi DESC LIMIT 5");
              while($s=mysql_fetch_array($hubungi)){
                echo "<li><span class='news-nama'><b>$s[nama]</b></span></br>
                      <span class='news-testimoni'>$s[isi]</span>
					 </li><br />";
					  
              }
            ?> </MARQUEE>
          			
	</br>
	</br><a href="testimoni.html"><b><i><u>Tambah testimoni</u></b></i></a>
	</td>
                  </tr>
            </table></br>
      </div>  

<!--statistik user--> 
	  <div class="title_box">Statistik User</div>  
     <div class="border_box">
<?php
// Statistik user
  $ip      = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
  $tanggal = date("Ymd"); // Mendapatkan tanggal sekarang
  $waktu   = time(); // 

  // Mencek berdasarkan IPnya, apakah user sudah pernah mengakses hari ini 
  $s = mysql_query("SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal'");
  // Kalau belum ada, simpan data user tersebut ke database
  if(mysql_num_rows($s) == 0){
    mysql_query("INSERT INTO statistik(ip, tanggal, hits, online) VALUES('$ip','$tanggal','1','$waktu')");
  } 
  else{
    mysql_query("UPDATE statistik SET hits=hits+1, online='$waktu' WHERE ip='$ip' AND tanggal='$tanggal'");
  }

  $pengunjung       = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE tanggal='$tanggal' GROUP BY ip"));
  $totalpengunjung  = mysql_result(mysql_query("SELECT COUNT(hits) FROM statistik"), 0); 
  $hits             = mysql_fetch_assoc(mysql_query("SELECT SUM(hits) as hitstoday FROM statistik WHERE tanggal='$tanggal' GROUP BY tanggal")); 
  $totalhits        = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0); 
  $tothitsgbr       = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0); 
  $bataswaktu       = time() - 300;
  $pengunjungonline = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE online > '$bataswaktu'"));

  $path = "counter/";
  $ext = ".png";

  $tothitsgbr = sprintf("%06d", $tothitsgbr);
  for ( $i = 0; $i <= 9; $i++ ){
	   $tothitsgbr = str_replace($i, "<img src='$path$i$ext' alt='$i'>", $tothitsgbr);
  }

  echo "<br /><p align='left'>
      <img src='counter/hariini.png'> Pengunjung hari ini : $pengunjung <br />
      <img src='counter/total.png'> Total pengunjung    : $totalpengunjung <br />
      <img src='counter/online.png'> Pengunjung Online: $pengunjungonline<br /><br /></p>
      <p align='center'>$tothitsgbr </p><br />";
?>


	 </div> 	 





	 
     
     <div class="banner_adds">

<?php
$banner=mysql_query("SELECT * FROM banner ORDER BY id_banner DESC LIMIT 4");
while($b=mysql_fetch_array($banner)){
  echo "<p align='center'><a href='$b[url]'' target='_blank' title='$b[judul]'><img src='foto_banner/$b[gambar]' border=0></a></p>";
}

?>

     </div>        
