
					<h4 class="title2"><img src="images/cart.gif" alt="" width="18" height="19" class="cart" />Keranjang belanja</h4>
					<div class="bag">
						 <?php require_once "item.php";?>
					</div><br/>
					
					<div class="news">
						<span>CS</span><b
	                    <?php 
      //ym
      $ym=mysql_query("select * from mod_ym order by id desc");
      while($t=mysql_fetch_array($ym)){
        echo "<br /><p>&bull; $t[nama] </br>
              <a href='ymsgr:sendIM?$t[username]'>
              <img src='http://opi.yahoo.com/online?u=$t[username]&amp;m=g&amp;t=2' border='0' height='16' width='64'></a>
              </p>";
      }
	  $kontak=mysql_query("select * from modul where id_modul='43' order by id_modul ASC");
	  while($k=mysql_fetch_array($kontak)){
	  echo"<p><div class='bank'>No Tlp: $k[nomor_hp]</div></br>
			<div class='bank'>Email: $k[email_pengelola]</div></br> 
	        <div class='bank'>Pin BB: $k[pin_bb]</div></br> 
	  </p>";
	  }         
      ?>
					</div>
					
					<div class="news">
						<span>Akun BANK</span>
	                                       <?php
      $bank=mysql_query("SELECT * FROM mod_bank ORDER BY id_bank ASC");
      while($b=mysql_fetch_array($bank)){
		    echo "<p>$a[nama_bank]</a>
         
             <img src='foto_banner/$b[gambar]' border='0' >
             
       
          <br/>No. Rek : $b[no_rekening]
         <br/>an. $b[pemilik]</p>";
      }

        ?>
					</div>
				<div class="news">
										
						<span>FB Page</span>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/id_ID/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<?php
$banner=mysql_query("SELECT * FROM mod_fb ORDER BY id DESC");
while($f=mysql_fetch_array($banner)){

echo"<div class=\"fb-like-box\" data-href=\"$f[frame]\" data-width=\"150\" data-height=\"250\" data-colorscheme=\"dark\" data-show-faces=\"true\" data-header=\"true\" data-stream=\"false\" data-show-border=\"true\"></div>";
}
?>
					
					
			</div>
					
					<div class="news">
						<span>User</span>
	                      			
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
					
					
					
					<h4 class="title3">Partner</h4>
					<?php
$banner=mysql_query("SELECT * FROM banner ORDER BY id_banner DESC LIMIT 4");
while($b=mysql_fetch_array($banner)){
  echo "<p align='center'><a href='$b[url]'' target='_blank' title='$b[judul]'><img src='foto_banner/$b[gambar]' border=0></a></p>";
}

?>
				</div>