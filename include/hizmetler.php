
<!-- bradcam_area  -->
<div class="bradcam_area bradcam_bg_2">
       <div class="container">
           <div class="row">
               <div class="col-xl-12">
                   <div class="bradcam_text text-center">
                       <h3>Hizmetlerimiz</h3>
                   </div>
               </div>
           </div>
       </div>
   </div>
   <!--/ bradcam_area  -->
   
<!-- about_mission  -->
<div class="explorer_europe">
    <div class="container" style="padding-top:7%;padding-bottom:7%;">
   <div class="row align-items-center">
       <?php
       $hizmetler=$VT->VeriGetir("hizmetler","WHERE durum=?",array(1),"ORDER BY sirano ASC");
       if($hizmetler!=false){
        for($i=0;$i<count($hizmetler);$i++){
            if(!empty($hizmetler[$i]["resim"])){$resim=$hizmetler[$i]["resim"];}else{$resim='varsayilan.png';}
            ?>
            
            <div class="col-xl-4 col-lg-4 col-md-6" style="max-width:380px; max-height:392px;" onclick="location.href='<?=SITE?>hizmet-detay/<?=$hizmetler[$i]['selflink']?>';">
                <div class="single_explorer" >
                    <div class="thumb">
                        <img src="<?=SITE?>images/hizmetler/<?=$resim?>" alt="<?=stripslashes($hizmetler[$i]["baslik"])?>" style="max-height:200px; max-width:350px">
                    </div>
                    <div class="explorer_bottom d-flex">
                        <div class="icon">
                            <i class="flaticon-beach"></i>
                        </div>
                        <div class="explorer_info">
                            <h3><a href="<?=SITE?>hizmet-detay/<?=$hizmetler[$i]["selflink"]?>"><?=stripslashes($hizmetler[$i]["baslik"])?></a></h3>
                            <p><?=mb_substr(strip_tags(stripslashes($hizmetler[$i]["metin"])),0,120,"UTF-8")?>...</p>
                            
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
 