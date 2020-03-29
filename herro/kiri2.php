	
	
	<h4 class="title1">Kategori</h4>
				<div id="accordian">
    <?php
        $sql = mysql_query("SELECT id_kategori, nama_kategori FROM kategori ORDER by id_kategori desc");
 
        while($r=mysql_fetch_array($sql)) {
			$nm = $r['nama_kategori'];
			$id = $r['id_kategori'];
                  
   echo"<ul>";
      echo"<li class=\"hassubmenu\">";
         echo"<h3><span class=\"icon-tasks\"></span>$nm</h3>";
         echo"<ul>";
		 
            $kategori=mysql_query("SELECT * FROM  subkategori WHERE id_kategori = '$id'");
            $no=1;
            while($k=mysql_fetch_array($kategori)){
              if(($no % 2)==0){
                echo "<li><a href='kategori-$k[id_subkategori]-$k[kategori_seo].html'> $k[nama_subkategori]</a></li>";
              }
              else{
                echo "<li><a href='kategori-$k[id_subkategori]-$k[kategori_seo].html'> $k[nama_subkategori]</a></li>";              
              }
              $no++;
            }
         echo"</ul>";
      echo"</li>";
   echo"</ul>";
		}
		?>
</div>
	
				  <br/>
				  <div class="news">
					<span>Best Seller</span>
					<MARQUEE onmouseover=this.stop() style="CURSOR:default" 
                       onmouseout=this.start() scrollAmount=1 direction=up loop=true height=180>
						  <?php
      $best=mysql_query("SELECT * FROM produk ORDER BY dibeli DESC LIMIT 3");
      while($a=mysql_fetch_array($best)){
        $harga = format_rupiah($a[harga]);
		    echo "<h4><a href='produk-$a[id_produk]-$a[produk_seo].html'>$a[nama_produk]</a></h4>
         <div class='product_img'>
             <a href='produk-$a[id_produk]-$a[produk_seo].html'>
                <img src='foto_produk/small_$a[gambar]' border='0' height='110'>
             </a>
         </div>";
      }

        ?>
		</MARQUEE>
					</div>
					
					
					
					<div class="news">
						<span>Twitter Stream</span><br/>
						<script charset="utf-8" src="http://widgets.twimg.com/j/2/widget.js"></script>
<script>
new TWTR.Widget({
  version: 2,
  type: 'profile',
  rpp: 4,
  interval: 30000,
  width: '180',
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
					
					
						<div class="news">
						<span>Testimoni</span>
	                      			
          <MARQUEE onmouseover=this.stop() style="CURSOR:default" 
                       onmouseout=this.start() scrollAmount=1 direction=up loop=true height=180>
      <?php
              $hubungi=mysql_query("SELECT * FROM testimoni where aktif='Y' ORDER BY id_testi DESC LIMIT 5");
              while($s=mysql_fetch_array($hubungi)){
                echo "<li><b><i>*$s[nama]</i></b></br>
                      $s[isi]
					 </li><br />
					 ";
					  
              }
            ?> </MARQUEE> </br>
	</br><a href="testimoni.html"><b><i><u>Tambah testimoni</u></b></i></a>
					</div>
					
					
					<h4 class="title3">Lacak pengiriman</h4>
					<div class="currencies">
						 <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><div align="center">
					<form method="post" action="http://www.jne.co.id/index.php?mib=tracking&lang=IN" target="_blank">
 <br/><h4>Nomor Resi JNE</h4> 
<input name="awbnum" type="text" class="rightsearch" id="awbnum"/></br>
<input type="submit" name="submittracking" class="btlogin" value="Track" id="trksubmit" />
</form>
<form method="get" action="http://www.posindonesia.co.id/home/modules/mod_search/tmpl/libs/lacakk1121m4np05.php" name="input" target="_blank">
<input type="hidden" name="lacak" value="Lacak" />
 <br/><h4>Nomor Resi POS</h4> 
<input name="barcode" type="text" /></br>
<input type="submit" value="Track"  /></form>
                   </span></div> </center></td>
                  </tr>
            </table>
					</div>
					