
    <div class="title_box">Kategori</div>    
      <ul class="left_menu">
            <?php
            $kategori=mysql_query("select nama_kategori, kategori.id_kategori, kategori_seo,  
                                  count(produk.id_produk) as jml 
                                  from kategori left join produk 
                                  on produk.id_kategori=kategori.id_kategori 
                                  group by nama_kategori");
            $no=1;
            while($k=mysql_fetch_array($kategori)){
              if(($no % 2)==0){
                echo "<li class='genap'><a href='kategori-$k[id_kategori]-$k[kategori_seo].html'> $k[nama_kategori] ($k[jml])</a></li>";
              }
              else{
                echo "<li class='ganjil'><a href='kategori-$k[id_kategori]-$k[kategori_seo].html'> $k[nama_kategori] ($k[jml])</a></li>";              
              }
              $no++;
            }
            ?>
      </ul>
       
    <div class="title_box">Produk Best Seller</div>  
     <div class="border_box">
	 <div class="left_border_box">
	 <MARQUEE onmouseover=this.stop() style="CURSOR:default" 
                       onmouseout=this.start() scrollAmount=1 direction=up loop=true height=180>
      <?php
      $best=mysql_query("SELECT * FROM produk ORDER BY dibeli DESC LIMIT 3");
      while($a=mysql_fetch_array($best)){
        $harga = format_rupiah($a[harga]);
		    echo "<div class='product_title'><a href='produk-$a[id_produk]-$a[produk_seo].html'>$a[nama_produk]</a></div>
         <div class='product_img'>
             <a href='produk-$a[id_produk]-$a[produk_seo].html'>
                <img src='foto_produk/small_$a[gambar]' border='0' height='110'>
             </a>
         </div>";
      }

        ?>
		</MARQUEE>
		</div>
       </div>
	   
	    <div class="title_box">Lacak Pengiriman</div>  
     <div class="border_box">
	 <div class="left_border_box">
	       <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><div align="center">
					<form method="post" action="http://www.jne.co.id/index.php?mib=tracking&lang=IN" target="_blank">
 <span class='pengunjung'>Nomor Resi JNE <br />
<input name="awbnum" type="text" class="rightsearch" id="awbnum"  /></br>
<input type="submit" name="submittracking" class="btlogin" value="Track" id="trksubmit" />
</form>  </br></br>
<form method="get" action="http://www.posindonesia.co.id/home/modules/mod_search/tmpl/libs/lacakk1121m4np05.php" name="input" target="_blank">
<input type="hidden" name="lacak" value="Lacak" />
No Resi POS <br/>
<input name="barcode" type="text" /></br>
<input type="submit" value="Track"  /></form>
                   </span></div> </center></td>
                  </tr>
            </table>
		</div>
       </div>
	   
<div class="title_box">Twitter Streaming</div>  
     <div class="border_box">
	 <div class="left_border_box">
						<script charset="utf-8" src="http://widgets.twimg.com/j/2/widget.js"></script>
<script>
new TWTR.Widget({
  version: 2,
  type: 'profile',
  rpp: 4,
  interval: 30000,
  width: '194',
  height: 200,
  theme: {
    shell: {
      background: '#A7A743',
      color: '#ffffff'
    },
    tweets: {
      background: '#000000',
      color: '#ffffff',
      links: '#4aed05'
    }
  },
  features: {
    scrollbar: false,
    loop: false,
    live: false,
    behavior: 'all'
  }
}).render().setUser('lapakcybertrain').start();
</script>  
   </div>
       </div>
	   
	   
	   
<div class="title_box">FB Fans Page</div>  
<div class="border_box">
<div class="left_border_box">
<?php
$fb=mysql_query("select * from mod_fb order by id desc");
      while($f=mysql_fetch_array($fb)){
     
	 
	echo "<iframe width='194' height='300' frameborder='0' scrolling='no' marginheight='0' marginwidth='0' src='$f[frame]'></iframe>";
		
}
?>	   
</div>
       </div> 	   

     <div class="banner_adds">
	</div>    
