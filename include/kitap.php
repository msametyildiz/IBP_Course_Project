<div class="bradcam_area bradcam_bg_2">
       <div class="container">
           <div class="row">
               <div class="col-xl-12">
                   <div class="bradcam_text text-center">
                       <h3>kitaplar</h3>
                   </div>
               </div>
           </div>
       </div>
   </div>
   <!--/ bradcam_area  -->
   
<div class="explorer_europe">
    <div class="container" style="margin-top:7%;padding-bottom:7%">
   <div class="row align-items-center">
       <?php
       $kitaplar=$VT->VeriGetir("kitaplar","WHERE durum=? ",array(1),"ORDER BY sirano ASC");
       if($kitaplar!=false){
        for($i=0;$i<count($kitaplar);$i++){
            if(!empty($kitaplar[$i]["resim"])){$resim=$kitaplar[$i]["resim"];}else{$resim='varsayilan.png';}
            ?>
            
            <div class="col-xl-4 col-lg-4 col-md-6" style="max-width:380px; max-height:500px;" onclick="location.href='<?=SITE?>kitap-detay/<?=$kitaplar[$i]['selflink']?>';">
                <div class="single_explorer" >
                    <div class="thumb">
                        <img src="<?=SITE?>images/kitaplar/<?=$resim?>" alt="<?=stripslashes($kitaplar[$i]["baslik"])?>" style="max-height:300px; max-width:480px">
                    </div>
                    <div class="explorer_bottom d-flex">
                        <div class="icon">
                            <i class="flaticon-beach"></i>
                        </div>
                        <div class="explorer_info">
                            <h3><a href="<?=SITE?>kitap-detay/<?=$kitaplar[$i]["selflink"]?>"><?=stripslashes($kitaplar [$i]["baslik"])?></a></h3>
                            <p><?=mb_substr(strip_tags(stripslashes($kitaplar[$i]["yazar"])),0,120,"UTF-8")?> <span class="fiyat"><?=$kitaplar[$i]["fiyat"]?> TL</span></p>
                            
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
       }
       ?>

        </div>
    </div>
</div>
<!--/ about_mission -->
<style>
    .fiyat {
        font-weight: bold;
        color: #000000; /* Koyu renk kodunu buraya yazabilirsiniz */
        text-align: right;
    }
</style>