<?php
    // diskon  
    $harga     = format_rupiah($r[harga]);
    $disc      = ($r[diskon]/100)*$r[harga];
    $hargadisc = number_format(($r[harga]-$disc),0,",",".");

    $d=$r['diskon'];
    $hargatetap  = "<p><span class='news1'> Rp.$hargadisc,-</span></p>";
                    
    $hargadiskon = "<p><span style='text-decoration:line-through;' class='news2'>Rp.$harga </span><span class='news3'>diskon$d% </span>
                    <span class='news1'> Rp.$hargadisc,-</span></p>";
    if ($d!=0){
      $divharga=$hargadiskon;
    }else{
      $divharga=$hargatetap;
    } 

    // tombol stok habis kalau stoknya 0
    $stok        = $r['stok'];
    $tombolbeli  = "<a class='prod_cart' href=\"aksi.php?module=keranjang&act=tambah&id=$r[id_produk]\"><img src='images/buy.jpg' alt=''  /></a>";
    $tombolhabis = "<span class='prod_cart_habis'><img src='images/cart_hbs.png' alt='Image 01' /></span>";
    if ($stok!=0){
      $tombol=$tombolbeli;
    }else{
      $tombol=$tombolhabis;
    } 
?>
