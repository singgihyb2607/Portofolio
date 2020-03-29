<?php 
  error_reporting(0);
  session_start();	
  include "config/koneksi.php";
	include "config/fungsi_indotgl.php";
	include "config/class_paging.php";
	include "config/fungsi_combobox.php";
	include "config/library.php";
  include "config/fungsi_autolink.php";
  include "config/fungsi_rupiah.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php include "dina_titel.php"; ?></title>
</script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="index, follow">
<meta name="description" content="<?php include "dina_meta1.php"; ?>">
<meta name="keywords" content="<?php include "dina_meta2.php"; ?>">
<meta http-equiv="Copyright" content="lokomedia">
<meta name="author" content="Lukmanul Hakim">
<meta http-equiv="imagetoolbar" content="no">
<meta name="language" content="Indonesia">
<meta name="revisit-after" content="7">
<meta name="webcrawlers" content="all">
<meta name="rating" content="general">
<meta name="spiders" content="all">

<link rel="shortcut icon" href="favicon.ico" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://localhost/tokohp/rss.xml" />

<link href="style.css" rel="stylesheet" type="text/css" />

<link href="lightbox/themes/default/jquery.lightbox.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="jquery-1.4.js"></script>
<script type="text/javascript" src="lightbox/jquery.lightbox.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function() {
		    $('.lightbox').lightbox();		    
		});
  </script>

</head>

<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div id="main_container">
	<div class="top_bar">
    	<div class="top_search">
        	<div class="search_text">Cari Produk</div>
        	<form method="POST" action="hasil-pencarian.html">
            <input class="search_input" name="kata" type="text">
            <input src="images/search.gif" class="search_bt" type="image">
          </form>
      </div>            
  </div>
  
		<div id="header">
	         <?php
$header=mysql_query("SELECT * FROM header ORDER BY id_header");
while($b=mysql_fetch_array($header)){
  echo "<li><img src='foto_header/$b[gambar]'></li>";
  }
  ?>
  
	</div>

  <div id="main_content"> 
       <div id="menu_tab">
            
              <ul class="menu">
		            <li><a href="index.php" class="nav1">Home</a></li>
                <li class="divider"></li>
		            <li><a href="profil-kami.html" class="nav2">Profil</a></li>
                <li class="divider"></li>
		            <li><a href="cara-pembelian.html" class="nav3">Cara Pembelian</a></li>
                <li class="divider"></li>
		            <li><a href="semua-produk.html" class="nav4">Semua Produk</a></li>
                <li class="divider"></li>
		            <li><a href="keranjang-belanja.html" class="nav5">Keranjang Belanja</a></li>
                <li class="divider"></li>
		            <li><a href="hubungi-kami.html" class="nav6">Hubungi Kami</a></li>        
                <li class="divider"></li>
				 <li class="divider"></li>
		            <li><a href="lokasi-kami.html" class="nav6">Lokasi Kami</a></li>        
                <li class="divider"></li>
              </ul>
            
          </div><!-- end of menu tab -->

  <div class="crumb_navigation">
    Anda sedang berada di: <?php include "breadcrumb.php";?>
  </div>        
        
  <div class="left_content"> 
      <?php include "kiri.php";?>         
  </div>
   
   <div class="center_content">
      <?php include "tengah.php";?>           
   </div>
   
   <div class="right_content">
      <?php include "kanan.php";?>                
   </div><!-- end of right content -->   
            
   </div><!-- end of main content -->
   
   <div class="footer">
        <div class="left_footer">
        <img src="images/banner2.jpg" alt="" title="" width="100" height="49">
        </div>
        
        <div class="center_footer">
        Copyright &copy; 2012. All Rights Reserved.<br />
        <a href="#" target="blank" title="webmaster">Heroo</a><br />
	
        
        </div>
        
        <div class="right_footer">
        <a href="index.php">home</a>
        <a href="profil-kami.html">about</a>
        <a href="cara-pembelian.html">cara pembelian</a>
        <a href="semua-produk.html">semua produk</a>
        <a href="hubungi-kami.html">hubungi kami</a>
        </div>   
   </div>                 

</div>
<!-- end of main_container -->
<div style="visibility: hidden; position: absolute;"><div></div></div>
</body>
</html>
