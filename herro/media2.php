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


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Herro NoteBook Palace</title>
</script>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">

<meta name="robots" content="index, follow">
<meta name="description" content="<?php include "dina_meta1.php"; ?>">
<meta name="keywords" content="<?php include "dina_meta2.php"; ?>">
<meta http-equiv="Copyright" content="cybertrain">
<meta name="author" content="cybertrain">
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
<link rel="stylesheet" type="text/css" href="style.css" />
<script type="text/javascript">
function transparent(im)
   {
   if (!im.transparented && (/\.png/.test(im.src)))
      {
      im.transparented = 1;
      var picture = im.src;
      var w = im.width;
      var h = im.height;
      im.src = "images/spacer.gif";
      im.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(enabled=true, sizingMethod='scale', src='" + picture + "');";
      im.width = w;
      im.height = h;
      }
   return "transparent";
   }
   
   $(document).ready(function(){
  $("#accordian .hassubmenu h3").click(function(){
    $("#accordian ul ul").slideUp();
    if(!$(this).next().is(":visible"))
    {
      $(this).next().slideDown();
    }
  });

  var currentpage = window.location.pathname;
  var index = currentpage.lastIndexOf("/") + 1;
  var filename = currentpage.substr(index);
  var namaparent = $('a[href="'+ filename +'"]').parent().parent().parent();
  if ($(namaparent).hasClass('hassubmenu') == true) {
   $(namaparent).addClass('active');
  }
});
</script>
</head>

<body>
	<div id="content">
		<div id="header">
			<ul class="top_menu">
				<li><a href="index.php" class="active">Home</a></li>
				<li><a href="profil-kami.html">Profil</a></li>
				<li><a href="cara-pembelian.html">Cara pembelian</a></li>
				<li><a href="semua-produk.html">Semua produk</a></li>
				<li><a href="hubungi-kami.html">Kontak kami</a></li>
				<li><a href="#"></a></li>
				<li><a href="#"></a></li>
				<li><a href="#"></a></li>
				<li><a href="#"></a></li>
				<li><a href="#"></a></li>
					<li><a href="#"></a></li>
				<li><a href="#"></a></li>
				<li><a href="#"></a></li>
			
			</ul>
			<ul class="top_menu">
				<li><a href="keranjang-belanja.html">Keranjang</a></li>
				<li><a href="selesai-belanja.html">Selesai</a></li>
				<li><a href="testimoni.html">Testimoni</a></li>
			</ul>
			<div id="search">
				Cari<br />																																																							<div class="inner_copy"><a href="http://www.greatdirectories.org/categories/fashion-directories/">fashion directories</a><a href="http://www.bestfreetemplates.org/categories/fashion/">fashion templates</a></div>
				<form action="hasil-pencarian.html" method="POST">
                  <input type="text" value="Search" name="keyword" id="keyword" title="keyword" onfocus="clearText(this)" onblur="clearText(this)" class="txt_field" />
                  <input type="submit" name="Search" value=" Search " alt="Search" id="searchbutton" title="Search" class="sub_btn"  />
                </form>
			</div>
		
		</div>
		<div id="wrapper">
			<div id="background">
			
			<!--awal kanan-->
				<div id="left">
				<?php include "kiri2.php" ?>
				</div>
				<!--akir kanan-->
				
				<!--awal tengah-->
				<div id="center">
					<?php include "tengah2.php" ?>
				</div>
				<!--akir tengah-->
				
				<!--awal kanan-->
				<div id="right">
				
				<?php include "kanan2.php" ?>
			</div>
			<!--akir kanan-->
		</div>
	</div>
	<div id="footer">
		<div>
			<ul>
				<li><a href="index.php">Home</a>|</li>
				<li><a href="semua-produk.html">Semua produk</a>|</li>
				<li><a href="hubungi-kami.html">Kontak kami</a>|</li>
				<li><a href="keranjang-belanja.html">Keranjang</a>|</li>
				<li><a href="selesai-belanja.html">Selesai</a></li>
			</ul>
			<ul>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Copyright &copy;. All rights reserved. Design by <a href="#">Herro NoteBook Palace</a></ul>
																																																																																				
		</div>
	</div>
</body>
</html>
